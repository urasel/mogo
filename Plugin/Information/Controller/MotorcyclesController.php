<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Motorcycles Controller
 *
 * @property Motorcycle $Motorcycle
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MotorcyclesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Imageresizer','Seotext');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_index','admin_add','admin_edit','ajaximagedelete');
		if ($this->action == 'admin_index') {
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
		if ($this->action == 'ajaximagedelete') {
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
		$this->Motorcycle->recursive = 0;
		$this->set('motorcycles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
		$this->set('motorcycle', $this->Motorcycle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Motorcycle->create();
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Motorcycle->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
			$this->request->data = $this->Motorcycle->find('first', $options);
		}
		$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
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
		$this->Motorcycle->id = $id;
		if (!$this->Motorcycle->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Motorcycle->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Motorcycle->recursive = 0;
		$searchString = '';
		if ($this->request->is('post')) {
			//debug($this->params);exit;
			if(!empty($this->request->data['Motorcycle']['name']) && empty($this->request->data['Motorcycle']['place_type_id'])){
				$searchString[] = array('Motorcycle.name LIKE' => "%".$this->request->data['Motorcycle']['name']."%");
			}
			else if(empty($this->request->data['Motorcycle']['name']) && !empty($this->request->data['Motorcycle']['place_type_id'])){
				$searchString[] = array('Motorcycle.place_type_id' => $this->request->data['Motorcycle']['place_type_id']);
			}else if(!empty($this->request->data['Motorcycle']['name']) && !empty($this->request->data['Motorcycle']['place_type_id'])){
				$searchString[] = array('Motorcycle.name LIKE' => "%".$this->request->data['Motorcycle']['name']."%");
				$searchString[] = array('Motorcycle.place_type_id' => $this->request->data['Motorcycle']['place_type_id']);
			}
			
			
			$this->Session->write('motorindex',$searchString);
			//debug($searchString);exit;
			$this->paginate = array(
					'conditions' => $searchString,
					'limit' => 10
			);
		
		}else{
		$sessionSearch = $this->Session->read('motorindex');
		
			$this->paginate = array(
				'conditions' => $sessionSearch,
				'limit' => 10,
				
			);
		}
		
		$this->set('motorcycles', $this->paginate());
		
		$searchFields = array('place_type_id', 'name');
		$this->set('searchFields', $searchFields);
		$placeTypes = $this->Motorcycle->PlaceType->find('list',array('conditions' => array('parentid' => 929),'order'=>array('PlaceType.name ASC')));
		$this->set('placeTypes', $placeTypes);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
		$this->set('motorcycle', $this->Motorcycle->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'adminpoint';
		$modelName = 'Motorcycle';
		$imageDB = 'MotorcycleImage';
		if ($this->request->is('post')) {
			$this->request->data['Point']['place_type_id'] = $this->request->data['Motorcycle']['place_type_id'];
			$this->request->data['Point']['name'] = $this->request->data['Motorcycle']['name'];
			$this->request->data['Point']['seo_name'] = $this->Seotext->formaturi(trim($this->request->data['Motorcycle']['name']),'_');
			
			$this->request->data['Motorcycle']['seo_name'] = $this->request->data['Point']['seo_name'];
			
			if(count($this->request->data['postimage']['images']) > 0){
				$galleryImages = $this->request->data['postimage']['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						if($this->request->data['postimage']['position'][$imgCount] == 'Featured'){
							$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
							$type = $imagefile['type'];
							if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$newFilename,570,380,false,false,100);
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
								$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
								$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
								$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
								//debug($this->request->data);exit;
							}
						}else{
							$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
							$type = $imagefile['type'];
							if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$newFilename,570,380,false,false,100);
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
								$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
								$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
								$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
							}
						}
						
					}
				$imgCount++;
				}
			
			}
			unset($this->request->data['postimage']);
			
			$this->Motorcycle->create();
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Motorcycle->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		}
		//$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('placeTypes'));
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
		$modelName = 'Motorcycle';
		$imageDB = 'MotorcycleImage';
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
				/* [2]************************************Point Part*************************/
				$this->request->data['Point']['place_type_id'] = 927;
				$this->request->data['Point']['name'] = $this->request->data['Motorcycle']['name'];
				$this->request->data['Point']['seo_name'] = $this->Seotext->formaturi(trim($this->request->data['Motorcycle']['name']),'_');
				/*************************************Point Part*************************/
				$this->request->data['Motorcycle']['place_type_id'] = 927;
				$this->request->data['Motorcycle']['seo_name'] = $this->request->data['Point']['seo_name'];
				$this->request->data['Motorcycle']['user_id'] = $userID;
				if($this->request->data['Motorcycle']['publish'] == 1){
					$this->request->data['Motorcycle']['publish_date'] = date('Y-m-d H:i:s');
				}
				
			if(count($this->request->data['postimage']['images']) > 0){
					$galleryImages = $this->request->data['postimage']['images'];
					$imgCount = 0;
					foreach($galleryImages as $imagefile){
						//debug($imagefile);exit;
						if(!empty($imagefile['tmp_name'])){
							//echo $this->request->data['postimage']['position'][$imgCount];exit;
							if($this->request->data['postimage']['position'][$imgCount] == 1){
								if(isset($this->request->data['postimage']['oldimage'][$imgCount])){
									$oldImageLink = $this->request->data['postimage']['oldimage'][$imgCount];
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink);
									}
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink);
									}
								}
								$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
								$type = $imagefile['type'];
								if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
									//debug($imagefile);exit;
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$newFilename,570,380,false,false,100);
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
									if(isset($this->request->data['postimage']['id'][$imgCount])){
										$this->request->data[$imageDB][$imgCount]['id'] = $this->request->data['postimage']['id'][$imgCount];
									}
									$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
									$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
								}
							}else{
								//debug($this->request->data);exit;
								if(isset($this->request->data['postimage']['oldimage'][$imgCount])){
									$oldImageLink = $this->request->data['postimage']['oldimage'][$imgCount];
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink);
									}
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink);
									}
								}
								$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
								$type = $imagefile['type'];
								if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$newFilename,570,380,false,false,100);
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
									if(isset($this->request->data['postimage']['id'][$imgCount])){
										$this->request->data[$imageDB][$imgCount]['id'] = $this->request->data['postimage']['id'][$imgCount];
									}
									$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
									$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['position'] = $this->request->data['postimage']['position'][$imgCount];
									//debug($this->request->data);exit;
								}
							}
							
						}else{
								if(isset($this->request->data['postimage']['oldimage'][$imgCount])){
									if(isset($this->request->data['postimage']['id'][$imgCount])){
										$this->request->data[$imageDB][$imgCount]['id'] = $this->request->data['postimage']['id'][$imgCount];
									}
									$this->request->data[$imageDB][$imgCount]['file'] = $this->request->data['postimage']['oldimage'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['position'] = $this->request->data['postimage']['position'][$imgCount];
								}
						}
					$imgCount++;
					}
				
				}
				unset($this->request->data['postimage']);
			
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		} else {
			$this->Motorcycle->recursive = 1;
			$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
			$this->request->data = $this->Motorcycle->find('first', $options);
			//debug($this->request->data);exit;
		}
		//$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('placeTypes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
 
	public function ajaximagedelete($id = null) {
		$this->layout = 'ajax';
		$this->autoRender = false;
		//debug($this->request->data);exit;
		$modelName = $this->request->data['modelName'];
		$folderName = $this->request->data['folder'];
		$classname = $this->request->data['classname'];
		$classImageFile = $this->request->data['classImageFile'];
		$imageid = $this->request->data['imageid'];
		$this->loadModel('Information.'.$modelName);
		$id = $this->request->data['imageid'];
		
		$this->$modelName->id = $id;
		$this->request->onlyAllow('post', 'delete');
		$this->$modelName->recursive = -1;
		$imagename = $this->$modelName->find('first',array('conditions' => array("$modelName.id" => $id)));
		//debug($imagename);exit;
		if($this->$modelName->delete()) {
			if(file_exists(WWW_ROOT.'img'.DS.$folderName.DS.'large'.DS.$classImageFile)){
				unlink(WWW_ROOT.'img'.DS.$folderName.DS.'large'.DS.$classImageFile);
			}
			if(file_exists(WWW_ROOT.'img'.DS.$folderName.DS.'medium'.DS.$classImageFile)){
				unlink(WWW_ROOT.'img'.DS.$folderName.DS.'medium'.DS.$classImageFile);
			}
			$this->Session->setFlash(__('The image has been deleted.'));
		}else {
			echo 'outer';exit;
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		$this->Motorcycle->id = $id;
		if (!$this->Motorcycle->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Motorcycle->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function getchilds($id, &$array = null){
		$this->loadModel('Information.PlaceType');
		$options = array(
			'conditions' => array('PlaceType.parentid' => $id)
		);
		
		$allChildCats = $this->PlaceType->find('list', $options);
		foreach($allChildCats as $k => $v){
			//debug($k);exit;
			$array[] = $k;
			$this->getchilds($k,$array);
		}
		return $array;
	}
	
	public function generatebreadcump($id, &$arraynew = null){
		$this->loadModel('Information.PlaceType');
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			"PlaceType.$fieldName as name",
			'PlaceType.seo_name',
			'PlaceType.parentid',
			)
		);
		
		$parentDetails = $this->PlaceType->find('first', $options);
		$currentLng = $this->Session->read('Config.language');
		//$array[]['placetype_id'] = $parentDetails['PlaceType']['id'];
		//$array[]['placetype_name'] = $parentDetails['PlaceType']['name'];
		//$array[]['placetype_seo_name'] = $parentDetails['PlaceType']['seo_name'];
		//debug($parentDetails);exit;
		
		if(isset($parentDetails['PlaceType']['parentid']) && $parentDetails['PlaceType']['parentid'] != 0){
			$options = array(
				'conditions' => array('PlaceType.parentid' => $parentDetails['PlaceType']['id']),
				'fields' =>array(
				'PlaceType.id',
				)
			);
			$hasChild = $this->PlaceType->find('first', $options);
			//debug($hasChild);exit;
			if(isset($hasChild['PlaceType']['id']) && !empty($hasChild['PlaceType']['id'])){
				$parentDetails['hasChild'] = true;
				$arraynew[] = $parentDetails;
			}else{
				$parentDetails['hasChild'] = false;
				$arraynew[] = $parentDetails;
			}
			
			$this->generatebreadcump($parentDetails['PlaceType']['parentid'],$arraynew);
		}else{
			$parentDetails['hasChild'] = true;
			$arraynew[] = $parentDetails;
		}
		//debug($arraynew);exit;
		return $arraynew;
	}
	
	public function motorcycles(){
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$this->loadModel('Information.Point');
		$this->loadModel('Information.PlaceType');
		
		
		if(isset($this->params['character'])){
			$character = $this->params['character'];
		}else{
			$character = '';
		}
		
		
		$id = 929;
		$childs = $this->getchilds($id,$array);
		$childs = $this->getchilds($id,$array);
		if($childs == null){
			$childs[] = $id;
		}else{
			array_push($childs,$id);
		}
		//debug($childs); exit;
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			"PlaceType.$fieldName as name",
			'PlaceType.singlename',
			'PlaceType.seo_name'
			)
		);
		
		$pointDetails = $this->PlaceType->find('first', $options);
		//debug($pointDetails);exit;
		$singleName = $pointDetails['PlaceType']['singlename'];
		$parent_seo_name = $pointDetails['PlaceType']['seo_name'];
		$PlaceTypeID = $pointDetails['PlaceType']['id'];
		$queryCountry = '';
		$countryId = '';
		$entries = $this->_allcatitems($id,$singleName,$childs,$character,$queryCountry,$countryId);
		//debug($entries);exit;
		$breadcumpArray = $this->generatebreadcump($id,$breadCumb);
		$parentCats = '';
		$disableCache = $this->Session->read('Config.cachestate');
		$disableCache = true;
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			if(Cache::read("subcatbn$id", 'long') == false || $disableCache == true){
				//$categories = $this->Point->query("SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id WHERE pl.parentid = $parentID AND p.private = 0 AND p.active = 1 AND pl.isactive = 1 GROUP BY p.place_type_id");
				/*
				$categories = $this->Point->query("
				SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				LEFT JOIN place_types AS pl2
					ON pl2.parentid = pl.id
				LEFT JOIN place_types AS pl3
					ON pl3.parentid = pl2.id
				LEFT JOIN points AS p
					ON pl.id = p.place_type_id
					OR pl2.id = p.place_type_id
					OR pl3.id = p.place_type_id
				WHERE pl.parentid = $parentID AND
				p.private = 0 AND p.active = 1 AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				*/
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE pl.parentid = $parentID
				AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				Cache::write("subcatbn$parentID", $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read("subcatbn$parentID", 'long');
				$parentCats = Cache::read('parentCats', 'long');
			}
			
		}else{
			$fieldName = 'name';
			if(Cache::read("subcaten$id", 'long') == false  || $disableCache == true){
				//$categories = $this->Point->query("SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id WHERE pl.parentid = $parentID AND p.private = 0 AND p.active = 1 AND pl.isactive = 1 GROUP BY p.place_type_id");
				/*
				$categories = $this->Point->query("
				SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				LEFT JOIN place_types AS pl2
					ON pl2.parentid = pl.id
				LEFT JOIN place_types AS pl3
					ON pl3.parentid = pl2.id
				LEFT JOIN points AS p
					ON pl.id = p.place_type_id
					OR pl2.id = p.place_type_id
					OR pl3.id = p.place_type_id
				WHERE pl.parentid = $parentID AND
				p.private = 0 AND p.active = 1 AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				*/
				
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE pl.parentid = $id
				AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				//debug($categories);exit;
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				//debug($parentCats);exit;
				Cache::write("subcaten$id", $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read("subcaten$id", 'long');
				$parentCats = Cache::read('parentCats', 'long');
			}
			
		}
			if(isset($pointDetails['PlaceType']['name'])){
				$categoryName = $pointDetails['PlaceType']['name'];
				$title_for_layout = $categoryName. __(' Informations');
			}
			$this->loadModel('Country');
			$countries = $this->Country->find('list',array('fields'=> array('Country.id','Country.name')));
			//debug($countries); exit;
		$this->set(compact('title_for_layout','categories','parentCats','catname','passID','categoryName','breadcumpArray','entries','parent_seo_name','PlaceTypeID','character','countries','queryCountry','passCountryName','passCountryId'));
	}
	
	
	
	public function _allcatitems($id,$singleName,$childs,$character,$queryCountry,$countryId){
		$this->loadModel('Information.PlaceType');
		$currentLng = $this->Session->read('Config.language');
		//echo $singleName;exit;
		if($currentLng == 'bn'){
			if(!in_array($singleName ,array('motorcycle'))){
				$fieldName = 'bn_name';
				$fieldAddress = 'bn_address';
			}
			else{
				$fieldName = 'name';
			}
			
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
		}
		
		
		//debug($character);exit;
		$className = ucfirst($singleName);
		$loadModelName = 'Information.'.ucfirst($singleName);
		//debug($loadModelName);exit;
		$this->loadModel($loadModelName);
		$searchString = '';
		if(!empty($character)){
			$searchString[] = array("$className.name LIKE " => $character.'%');
		}
		
		if(!empty($singleName)){
			//echo $singleName;exit;
			if($singleName == 'topicData'){
			$searchString[] = array("TopicData.place_type_id" => $childs);
			$searchString[] = array("Point.active " => 1);
			}else if($singleName == 'recipe'){
			$searchString[] = array("Recipe.place_type_id" => $childs);
			}else if($singleName == 'animal'){
			$searchString[] = array("Animal.place_type_id" => $childs);
			}else if($singleName == 'doctor'){
			$searchString[] = array("Doctor.place_type_id" => $childs);
			}else if($singleName == 'continent'){
			$searchString[] = array("Continent.place_type_id" => $childs);
			}else if($singleName == 'medicine'){
			$searchString[] = array("Medicine.place_type_id" => $childs);
			}else if($singleName == 'motorcycle'){
			$searchString[] = array("Motorcycle.place_type_id" => $childs);
			}else if($singleName == 'babyName'){
			$searchString[] = array("BabyName.place_type_id" => $childs);
			}else{
				//echo $queryCountry.'rrr';exit;
				if($queryCountry == 'all'){
					$searchString[] = array("$className.place_type_id" => $childs);
				}else if($queryCountry == ''){
					$searchString[] = array("$className.place_type_id" => $childs);
				}else{
					
					$this->loadModel('Country');
					//$countryId = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array('Country.id')));
					//$countryId = $countryId['Country']['id'];
					$countryId = $countryId;
					$searchString[] = array("$className.place_type_id" => $childs,"$className.country_id" => $countryId);
				}
			
			}
		}
		
		if($singleName == 'topicData'){
			$className = 'TopicData';
			$this->loadModel($className);
			$this->$className->bindModel(array(
					'hasOne' => array(
					
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'Zone' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = Zone.id')
						)
					
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					'PlaceType.type_image',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.bn_name",
					"$className.short_description",
					"$className.bn_short_description",
					"$className.details",
					"$className.bn_details",
					"$className.image",
					"Country.$fieldName as name",
					"Country.seo_name",
					"Country.id",
					"Zone.$fieldName as name",
					"Zone.seo_name",
					"Zone.id",
					),
					'limit' => 10,
					'order' => "Point.name ASC",
			);
		
		}else if($singleName == 'recipe'){
			$this->$className->bindModel(array(
					'hasOne' => array(
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.title as name",
					"$className.seo_name",
					),
					'limit' => 10,
					'order' => "$className.title ASC",
			);
		
		}else if($singleName == 'animal'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.full_name as name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.full_name ASC",
			);
		
		}else if($singleName == 'doctor'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'continent'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.seo_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'bloodNews'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'medicine'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name"
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'onlinetest'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name"
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if(in_array($singleName,array('babyName'))){
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.pluralname',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name",
					"$className.seo_name",
					"$className.sex_id",
					"$className.bn_name",
					"$className.meaning",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if(in_array($singleName,array('motorcycle'))){
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					),
				'limit' => 10,
				'order' => "$className.name ASC",
			);
		
		}else{
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("$className.country_id = Country.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					'Country.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
				'limit' => 10,
				'order' => "$className.name ASC",
			);
		
		}
			
			//debug($searchOptions);exit;
			
			
			
			$this->$className->recursive = 1;
			$this->paginate = $searchOptions;
			
			
			$entries = $this->paginate($className);
			//debug($entries);exit;
			return $entries;
	}
	
}
