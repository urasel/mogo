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
	public $components = array('Paginator', 'Session','Imageresizer','Seotext');
	
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
							}
						}else{
							$newFilename = "InfoMap24_Motorcycle_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
							$type = $imagefile['type'];
							if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
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
						if(!empty($imagefile['tmp_name'])){
							if($this->request->data['postimage']['position'][$imgCount] == 1){
								if(isset($this->request->data['postimage']['oldimage'][$imgCount])){
									$oldImageLink = $this->request->data['postimage']['oldimage'][$imgCount];
									if(file_exists(WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$oldImageLink);
									}
									if(file_exists(WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$oldImageLink);
									}
								}
								$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
								$type = $imagefile['type'];
								if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$newFilename,570,380,false,false,100);
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
									if(isset($this->request->data['postimage']['id'][$imgCount])){
										$this->request->data[$imageDB][$imgCount]['id'] = $this->request->data['postimage']['id'][$imgCount];
									}
									$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
									$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
								}
							}else{
								if(isset($this->request->data['postimage']['oldimage'][$imgCount])){
									$oldImageLink = $this->request->data['postimage']['oldimage'][$imgCount];
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$oldImageLink);
									}
									if(file_exists(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink)){
										unlink(WWW_ROOT.'img'.DS.'motorcycles'.DS.'large'.DS.$oldImageLink);
									}
								}
								$newFilename = "InfoMap24_Motorcycle_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
								$type = $imagefile['type'];
								if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
									$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'motorcycles'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
									if(isset($this->request->data['postimage']['id'][$imgCount])){
										$this->request->data[$imageDB][$imgCount]['id'] = $this->request->data['postimage']['id'][$imgCount];
									}
									$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
									$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
									$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
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
}
