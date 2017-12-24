<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportRoutes Controller
 *
 * @property TransportRoute $TransportRoute
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportRoutesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Imageresizer','Seotext');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('ajaxtransport','existingroutes','admin_add','admin_edit','ajaxdelete');
		if ($this->action == 'ajaxtransport') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'existingroutes') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_add') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_edit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'ajaxdelete') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TransportRoute->recursive = 0;
		$this->set('transportRoutes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportRoute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		$options = array('conditions' => array('TransportRoute.' . $this->TransportRoute->primaryKey => $id));
		$this->set('transportRoute', $this->TransportRoute->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportRoute->create();
			if ($this->TransportRoute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportRoute->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route')), 'default', array('class' => 'error'));
			}
		}
		$transportServices = $this->TransportRoute->TransportService->find('list');
		$transportClasses = $this->TransportRoute->TransportClass->find('list');
		$this->set(compact('transportServices', 'transportClasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportRoute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportRoute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportRoute.' . $this->TransportRoute->primaryKey => $id));
			$this->request->data = $this->TransportRoute->find('first', $options);
		}
		$transportServices = $this->TransportRoute->TransportService->find('list');
		$transportClasses = $this->TransportRoute->TransportClass->find('list');
		$this->set(compact('transportServices', 'transportClasses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TransportRoute->id = $id;
		if (!$this->TransportRoute->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportRoute->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport route')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport route')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportRoute->recursive = 0;
		//debug($this->paginate());
		$this->set('transportRoutes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportRoute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		$options = array('conditions' => array('TransportRoute.' . $this->TransportRoute->primaryKey => $id));
		$this->set('transportRoute', $this->TransportRoute->find('first', $options));
	}
	
	public function ajaxtransport($id = null) {
		//debug($this->params->query);exit;
		$this->layout = 'ajax';
		$this->loadModel('TransportService');
		$id = $this->params->query['countryid'];
		$type = $this->params->query['typeId'];
		//$conditions = array('Point.country_id' => $id,'Point.place_type_id' => 146);
		//$this->TransportService->contain("Point.country_id = $id","Point.place_type_id = 146");
		
		$this->TransportService->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = TransportService.point_id")
						),
					),
					));
		
		$transportServices = $this->TransportService->find('list',array('conditions' => array("Point.country_id" => $id,"Point.place_type_id" =>146),'conditions' => array("TransportService.transport_type_id" =>$type)));
		//debug($transportServices);exit;
		$this->set('transportServices', $transportServices);
		
	}
	public function existingroutes($id = null) {
		//debug($this->params->query);exit;
		$this->layout = 'ajax';
		
		//$conditions = array('Point.country_id' => $id,'Point.place_type_id' => 146);
		//$this->TransportService->contain("Point.country_id = $id","Point.place_type_id = 146");
		$transportRoutes = '';
		if(isset($this->params->query['transportID']) && isset($this->params->query['transportClassID']) && isset($this->params->query['fromStationID']) && isset($this->params->query['toStationID'])){
			$tr_service_id = $this->params->query['transportID'];
			$tr_class_id = $this->params->query['transportClassID'];
			$tr_from_id = $this->params->query['fromStationID'];
			$tr_to_id = $this->params->query['toStationID'];
			$transportRoutes = $this->TransportRoute->find('list',array('conditions' => array("TransportRoute.transport_service_id" =>$tr_service_id,"TransportRoute.transport_class_id" =>$tr_class_id,"TransportRoute.route_fromid" =>$tr_from_id,"TransportRoute.route_toid" =>$tr_to_id)));
		}
		//debug($transportRoutes);exit;
		$this->set('transportRoutes', $transportRoutes);
		
	}
	
	public function ajaxsave() {
		//debug($this->params->query);exit;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->request->data['TransportRoute']['transport_service_id'] = $this->params->query['transportServiceId'];
		$this->request->data['TransportRoute']['transport_class_id'] = $this->params->query['transportClassId'];
		$this->request->data['TransportRoute']['country_id'] = $this->params->query['countryId'];
		$this->request->data['TransportRoute']['name'] = $this->params->query['routeNameEn'];
		$this->request->data['TransportRoute']['bn_name'] = $this->params->query['routeNameBn'];
		$this->request->data['TransportRoute']['route_fromcountryid'] = $this->params->query['fromcountryId'];
		$this->request->data['TransportRoute']['route_fromid'] = $this->params->query['RouteFromId'];
		$this->request->data['TransportRoute']['route_tocountryid'] = $this->params->query['tocountryId'];
		$this->request->data['TransportRoute']['route_toid'] = $this->params->query['RouteToId'];
		$this->request->data['TransportRoute']['route_details'] = $this->params->query['TransportRouteRouteDetails'];
		$this->request->data['TransportRoute']['fare'] = $this->params->query['TransportRouteFare'];
		$this->request->data['TransportRoute']['departure_time'] = $this->params->query['TransportRouteDepartureTime'];
		$this->request->data['TransportRoute']['estimated_reach_time'] = $this->params->query['TransportRouteEstimatedReachTime'];
		$this->request->data['TransportRoute']['isactive'] = 1;
		$this->TransportRoute->create();
		if ($this->TransportRoute->save($this->request->data['TransportRoute'])) {
			
		}else {
		
		}
		
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'adminpoint';
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$accomodation = $this->request->data['accomodation']['trclassname' ];
			$string = $this->request->data['TransportRoute']['name'];
			$seo_name = $this->Seotext->formaturi($string,'_');
			$TransportRouteData = $this->request->data['TransportRoute'];
			unset($this->request->data['TransportRoute']);
			$this->request->data['TransportRoute']['transport_service_id'] 		= $TransportRouteData['transport_service_id'];
			$this->request->data['TransportRoute']['transport_class_id'] 		= $TransportRouteData['transport_service_id'];
			$this->request->data['TransportRoute']['country_id'] 				= $this->request->data['Location']['country_id'];
			$this->request->data['TransportRoute']['name'] 						= $TransportRouteData['name'];
			$this->request->data['TransportRoute']['bn_name'] 					= $TransportRouteData['bn_name'];
			$this->request->data['TransportRoute']['route_fromcountryid'] 		= $TransportRouteData['FromCountryId'];
			$this->request->data['TransportRoute']['route_fromid'] 				= $TransportRouteData['RouteFromId'];
			$this->request->data['TransportRoute']['route_tocountryid'] 		= $TransportRouteData['ToCountryId'];
			$this->request->data['TransportRoute']['route_toid'] 				= $TransportRouteData['RouteToId'];
			$this->request->data['TransportRoute']['route_details'] 			= $TransportRouteData['route_details'];
			$this->request->data['TransportRoute']['seo_name'] 					= $seo_name;
			$this->request->data['TransportRoute']['departure_time'] 			= $TransportRouteData['departure_time'];
			$this->request->data['TransportRoute']['estimated_reach_time'] 		= $TransportRouteData['estimated_reach_time'];
			$this->request->data['TransportRoute']['isactive'] 					= 1;
			
			foreach($accomodation as $key => $val){
				if(!empty($val)){
					$fare = $this->request->data['accomodation']['trfare' ][$key];
					$imagefile = $this->request->data['accomodation']['images' ][$key];
					$modelName = 'TransportRoute';
					$imageFolder = 'transportClasses';
					
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_place_".$seo_name.'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,749,356,false,false,80);
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,75,75,false,false,100);
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,184,140,false,false,100);
							
							$this->request->data['TransportAccomodation'][$key]['images'] = $newFilename;
							
						}
					}
					
					$this->request->data['TransportAccomodation'][$key]['transport_class_id'] = $val;
					$this->request->data['TransportAccomodation'][$key]['transport_service_id'] = $this->request->data['TransportRoute']['transport_service_id'];
					$this->request->data['TransportAccomodation'][$key]['fare'] = $fare;
				}
				
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['accomodation']);
			//debug($this->request->data);exit;
			$this->TransportRoute->create();
			if ($this->TransportRoute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportRoute->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route')), 'default', array('class' => 'error'));
			}
		}
		$this->loadModel('TransportType');
		$transportTypes = $this->TransportType->find('list');
		$transportServices = $this->TransportRoute->TransportService->find('list');
		$transportClasses = $this->TransportRoute->TransportClass->find('list');
		$this->set(compact('transportTypes','transportServices', 'transportClasses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'adminpoint';
		if (!$this->TransportRoute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//debug($this->request->data);exit;
			
			$accomodation = $this->request->data['accomodation']['trclassname' ];
			if(!empty($this->request->data['TransportRoute']['seo_name'])){
				$string = $this->request->data['TransportRoute']['name'];
				$seo_name = $this->Seotext->formaturi($string,'_');
			}else{
				$seo_name = $this->request->data['TransportRoute']['seo_name'];
			}
			
			$TransportRouteData = $this->request->data['TransportRoute'];
			unset($this->request->data['TransportRoute']);
			$this->request->data['TransportRoute']['id'] 						= $TransportRouteData['id'];
			$this->request->data['TransportRoute']['transport_service_id'] 		= $TransportRouteData['transport_service_id'];
			$this->request->data['TransportRoute']['transport_class_id'] 		= $TransportRouteData['transport_service_id'];
			if(!empty($this->request->data['Location']['country_id'])){
				$this->request->data['TransportRoute']['country_id'] 				= $this->request->data['Location']['country_id'];
			}
			$this->request->data['TransportRoute']['name'] 						= $TransportRouteData['name'];
			$this->request->data['TransportRoute']['bn_name'] 					= $TransportRouteData['bn_name'];
			$this->request->data['TransportRoute']['route_fromcountryid'] 		= $TransportRouteData['FromCountryId'];
			$this->request->data['TransportRoute']['route_fromid'] 				= $TransportRouteData['RouteFromId'];
			$this->request->data['TransportRoute']['route_tocountryid'] 		= $TransportRouteData['ToCountryId'];
			$this->request->data['TransportRoute']['route_toid'] 				= $TransportRouteData['RouteToId'];
			$this->request->data['TransportRoute']['route_details'] 			= $TransportRouteData['route_details'];
			$this->request->data['TransportRoute']['seo_name'] 					= $seo_name;
			$this->request->data['TransportRoute']['departure_time'] 			= $TransportRouteData['departure_time'];
			$this->request->data['TransportRoute']['estimated_reach_time'] 		= $TransportRouteData['estimated_reach_time'];
			$this->request->data['TransportRoute']['isactive'] 					= 1;
			
			foreach($accomodation as $key => $val){
				if(!empty($val)){
					$taid = $this->request->data['accomodation']['id' ][$key];
					$fare = $this->request->data['accomodation']['trfare' ][$key];
					$oldimage = $this->request->data['accomodation']['oldimage' ][$key];
					$imagefile = $this->request->data['accomodation']['images' ][$key];
					$modelName = 'TransportRoute';
					$imageFolder = 'transportClasses';
					
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_place_".$seo_name.'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,749,356,false,false,80);
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,75,75,false,false,100);
							$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,184,140,false,false,100);
							
							@unlink(WWW_ROOT.'img'.DS.'transportClasses/photogallery'.DS.$oldimage);
							@unlink(WWW_ROOT.'img'.DS.'transportClasses/photogallery/small'.DS.$oldimage);
							@unlink(WWW_ROOT.'img'.DS.'transportClasses/photogallery/thumbs'.DS.$oldimage);
							$this->request->data['TransportAccomodation'][$key]['images'] = $newFilename;
							
						}
					}
					
					$this->request->data['TransportAccomodation'][$key]['id'] = $taid;
					$this->request->data['TransportAccomodation'][$key]['transport_class_id'] = $val;
					$this->request->data['TransportAccomodation'][$key]['transport_service_id'] = $this->request->data['TransportRoute']['transport_service_id'];
					$this->request->data['TransportAccomodation'][$key]['fare'] = $fare;
				}
				
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['accomodation']);
			
			//debug($this->request->data);exit;
			if ($this->TransportRoute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportRoute.' . $this->TransportRoute->primaryKey => $id));
			$this->request->data = $this->TransportRoute->find('first', $options);
			//debug($this->request->data);exit;
		}
		$this->loadModel('TransportType');
		$transportTypes = $this->TransportType->find('list');
		$transportServices = $this->TransportRoute->TransportService->find('list');
		$transportClasses = $this->TransportRoute->TransportClass->find('list');
		$this->set(compact('transportTypes','transportServices', 'transportClasses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TransportRoute->id = $id;
		if (!$this->TransportRoute->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportRoute->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport route')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport route')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function ajaxdelete($id = null) {
		$this->layout = 'ajax';
		$this->autoRender = false;
		//debug($this->request->data);
		$modelName = $this->request->data['modelName'];
		$folderName = $this->request->data['folder'];
		$classname = $this->request->data['classname'];
		$this->loadModel('Information.'.$modelName);
		$id = explode('-',$this->request->data['imageid']);
		
		$this->$modelName->id = $id[1];
		if (!$this->$modelName->exists()) {
			//throw new NotFoundException(__('Invalid hospital image'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->$modelName->recursive = -1;
		$imagename = $this->$modelName->find('first',array('conditions' => array("$modelName.id" => $id)));
		//debug($imagename);exit;
		if($this->$modelName->delete()) {
			
			if(file_exists(WWW_ROOT.'img'.DS.$folderName.DS.'photogallery'.DS.$imagename[$modelName]['file'])){
			unlink(WWW_ROOT.'img'.DS.$folderName.DS.'photogallery'.DS.$imagename[$modelName]['file']);
			unlink(WWW_ROOT.'img'.DS.$folderName.DS.'photogallery'.DS.'thumbs'.DS.$imagename[$modelName]['file']);
			unlink(WWW_ROOT.'img'.DS.$folderName.DS.'photogallery'.DS.'small'.DS.$imagename[$modelName]['file']);
			
			}
			$this->Session->setFlash(__('The image has been deleted.'));
		}else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
