<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportServices Controller
 *
 * @property TransportService $TransportService
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportServicesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Imageresizer','Seotext');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_add');
		if ($this->action == 'admin_add') {
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
		$this->TransportService->recursive = 0;
		$this->set('transportServices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportService->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		$options = array('conditions' => array('TransportService.' . $this->TransportService->primaryKey => $id));
		$this->set('transportService', $this->TransportService->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportService->create();
			if ($this->TransportService->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportService->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->TransportService->Point->find('list');
		$placeTypes = $this->TransportService->PlaceType->find('list');
		$transportTypes = $this->TransportService->TransportType->find('list');
		$transportServiceProviders = $this->TransportService->TransportServiceProvider->find('list');
		$this->set(compact('points', 'placeTypes', 'transportTypes', 'transportServiceProviders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportService->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportService->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportService.' . $this->TransportService->primaryKey => $id));
			$this->request->data = $this->TransportService->find('first', $options);
		}
		$points = $this->TransportService->Point->find('list');
		$placeTypes = $this->TransportService->PlaceType->find('list');
		$transportTypes = $this->TransportService->TransportType->find('list');
		$transportServiceProviders = $this->TransportService->TransportServiceProvider->find('list');
		$this->set(compact('points', 'placeTypes', 'transportTypes', 'transportServiceProviders'));
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
		$this->TransportService->id = $id;
		if (!$this->TransportService->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportService->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport service')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport service')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportService->recursive = 0;
		$this->set('transportServices', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportService->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		$options = array('conditions' => array('TransportService.' . $this->TransportService->primaryKey => $id));
		$this->set('transportService', $this->TransportService->find('first', $options));
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
			$this->TransportService->create();
			$accomodation = $this->request->data['accomodation'];
			
			
			
			/* [1]************************************TransportService Part*************************/
			$transportdata['TransportService']['name'] = $this->request->data['TransportService']['name'];
			$transportdata['TransportService']['bn_name'] = $this->request->data['TransportService']['bn_name'];
			$transportdata['TransportService']['transport_type_id'] = $this->request->data['TransportService']['transport_type_id'];
			$transportdata['TransportService']['transport_service_provider_id'] = $this->request->data['TransportService']['transport_service_provider_id'];
			$transportdata['TransportService']['transport_service_provider_id'] = $this->request->data['TransportService']['transport_service_provider_id'];
			$transportdata['TransportService']['place_type_id'] = 146;
			$transportdata['TransportService']['details'] = $this->request->data['TransportService']['details'];
			$transportdata['TransportService']['bn_details'] = $this->request->data['TransportService']['bn_details'];
			$transportdata['TransportService']['contact'] = $this->request->data['TransportService']['contact'];
			$transportdata['TransportService']['website'] = $this->request->data['TransportService']['website'];
			$transportdata['TransportService']['email'] = $this->request->data['TransportService']['email'];
			$transportdata['TransportService']['metatag'] = '';
			$transportdata['TransportService']['keyword'] = '';
			$transportdata['TransportService']['logo'] = '';
			$transportdata['TransportService']['isactive'] = $this->request->data['TransportService']['isactive'];
			/*************************************TransportService Part*************************/
			
			
			/* [2]************************************Point Part*************************/
			$transportdata['Point']['place_type_id'] = 146;
			$transportdata['Point']['name'] = $this->request->data['TransportService']['name'];
			/*************************************Point Part*************************/
			
			
			unset($this->request->data['Location']);
			
			if ($this->TransportService->saveAll($transportdata)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service')), 'default', array('class' => 'success'));
				
				
				
			
				/* [3]************************************TransportRoute Part*************************/
				$transportRoutedata['TransportRoute']['name'] = $this->request->data['TransportRoute']['name'];
				$transportRoutedata['TransportRoute']['bn_name'] = $this->request->data['TransportRoute']['bn_name'];
				$transportRoutedata['TransportRoute']['transport_service_id'] = $this->TransportService->id;
				$transportRoutedata['TransportRoute']['country_id'] = $this->request->data['TransportService']['FromCountryId'];
				$transportRoutedata['TransportRoute']['route_fromcountryid'] = $this->request->data['TransportService']['FromCountryId'];
				$transportRoutedata['TransportRoute']['route_fromid'] = $this->request->data['TransportService']['RouteFromId'];
				$transportRoutedata['TransportRoute']['route_tocountryid'] = $this->request->data['TransportService']['ToCountryId'];
				$transportRoutedata['TransportRoute']['route_toid'] = $this->request->data['TransportService']['RouteToId'];
				$transportRoutedata['TransportRoute']['route_details'] = $this->request->data['TransportRoute']['route_details'];
				$transportRoutedata['TransportRoute']['off_day'] = $this->request->data['TransportRoute']['off_day'];
				$transportRoutedata['TransportRoute']['seo_name'] = '';
				$transportRoutedata['TransportRoute']['departure_time'] = $this->request->data['TransportRoute']['departure_time'];
				$transportRoutedata['TransportRoute']['distance'] = $this->request->data['TransportRoute']['distance'];
				$transportRoutedata['TransportRoute']['estimated_reach_time'] = $this->request->data['TransportRoute']['estimated_reach_time'];
				$transportRoutedata['TransportRoute']['isactive'] = $this->request->data['TransportService']['isactive'];
				
				/*************************************TransportRoute Part*************************/
				$this->loadModel('TransportRoute');
				$this->TransportRoute->create();
				if ($this->TransportRoute->save($transportRoutedata)) {
				
					/* [4]****************************************************Accomodation Save Part*********************/
					
					foreach($accomodation as $key => $val){
						
						foreach($val as $inKey => $valData){
							if(!empty($valData)){
								
								if($key == 'images'){
									
									$imagefile = $valData;
									$modelName = 'TransportService';
									$imageFolder = 'transportClasses';
									$seo_name = '';
									
									if(!empty($imagefile['tmp_name'])){
										
										$newFilename = "InfoMap24_place_".$seo_name.'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
										$type = $imagefile['type'];
										if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
											
											$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,749,356,false,false,80);
											$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,75,75,false,false,100);
											$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,184,140,false,false,100);
											
											$transportAccomodationdata['TransportAccomodation'][$inKey]['images'] = $newFilename;
											
										}
									}
									
								}
								
								if($key == 'trfare'){
									$transportAccomodationdata['TransportAccomodation'][$inKey]['fare'] = $valData;
									
								}
								
								if($key == 'trclassname'){
									$transportAccomodationdata['TransportAccomodation'][$inKey]['transport_service_id'] = $this->TransportService->id;
									$transportAccomodationdata['TransportAccomodation'][$inKey]['transport_route_id'] = $this->TransportRoute->id;
									$transportAccomodationdata['TransportAccomodation'][$inKey]['transport_class_id'] = $valData;
									
									
								}
									
							}
								
							
						}
							
						
						
					}
					
					$this->loadModel('TransportAccomodation');
					foreach($transportAccomodationdata as &$val) {
					   $transportAccomodationdata = array_values($val);
					}
					//debug($transportAccomodationdata);exit;
					$this->TransportAccomodation->create();
					//$this->TransportAccomodation->saveAll($transportAccomodationdata);
					if ($this->TransportAccomodation->saveAll($transportAccomodationdata)) {	
						$redirectTo = array('action' => 'index');
						return $this->redirect($redirectTo);
					}else {
						$dbo = $this->getDatasource();
						$logs = $dbo->getLog();
						$lastLog = end($logs['log']);
						debug($lastLog);exit;
						$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'Accomodation')), 'default', array('class' => 'error'));
					}					
					/* [4]****************************************************Accomodation Save Part*********************/
				
				
				}else {
					$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'Transport Route')), 'default', array('class' => 'error'));
				}
				
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'Transport service')), 'default', array('class' => 'error'));
			}
		}
		//$points = $this->TransportService->Point->find('list');
		$placeTypes = $this->TransportService->PlaceType->find('list');
		$transportTypes = $this->TransportService->TransportType->find('list');
		$transportServiceProviders = $this->TransportService->TransportServiceProvider->find('list');
		$this->set(compact( 'placeTypes', 'transportTypes', 'transportServiceProviders'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportService->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportService->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportService.' . $this->TransportService->primaryKey => $id));
			$this->request->data = $this->TransportService->find('first', $options);
		}
		//$points = $this->TransportService->Point->find('list');
		$placeTypes = $this->TransportService->PlaceType->find('list');
		$transportTypes = $this->TransportService->TransportType->find('list');
		$transportServiceProviders = $this->TransportService->TransportServiceProvider->find('list');
		$this->set(compact('placeTypes', 'transportTypes', 'transportServiceProviders'));
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
		$this->TransportService->id = $id;
		if (!$this->TransportService->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportService->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport service')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport service')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
