<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RecipesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Imageresizer','Seotext');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_add','admin_edit','ajaximagedelete');
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
	
	
	
	public function index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
		$this->set('recipe', $this->Recipe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Recipe->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe')), 'default', array('class' => 'error'));
			}
		}
		$recipeCuisines = $this->Recipe->RecipeCuisine->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('recipeCuisines', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
		$recipeCuisines = $this->Recipe->RecipeCuisine->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('recipeCuisines', 'users'));
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
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
		$this->set('recipe', $this->Recipe->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'adminpoint';
		$modelName = 'Recipe';
		$imageDB = 'RecipeImage';
		if ($this->request->is('post')) {
			//debug($this->request);exit;
			/* [2]************************************Point Part*************************/
			$this->request->data['Point']['place_type_id'] = $this->request->data['Recipe']['place_type_id'];
			$this->request->data['Point']['name'] = $this->request->data['Recipe']['title'];
			$this->request->data['Point']['seo_name'] = $this->Seotext->formaturi(trim($this->request->data['Recipe']['title']),'_');
			/*************************************Point Part*************************/
			$this->request->data['Recipe']['place_type_id'] = $this->request->data['Recipe']['place_type_id'];
			$this->request->data['Recipe']['seo_name'] = $this->request->data['Point']['seo_name'];
			$this->Recipe->create();
			//debug($this->request->data);exit;
			
			if(count($this->request->data['postimage']['images']) > 0){
				$galleryImages = $this->request->data['postimage']['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						if($this->request->data['postimage']['position'][$imgCount] == 'Featured'){
							$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
							$type = $imagefile['type'];
							if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$newFilename,570,380,false,false,100);
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
								$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
								$this->request->data[$imageDB][$imgCount]['name'] = $this->request->data['postimage']['name'][$imgCount];
								$this->request->data[$imageDB][$imgCount]['source'] = $this->request->data['postimage']['source'][$imgCount];
								//debug($this->request->data);exit;
							}
						}else{
							$newFilename = "InfoMap24_recipe_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
							$type = $imagefile['type'];
							if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$newFilename,570,380,false,false,100);
								$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$newFilename,380,240,false,false,100);
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
			//debug($this->request->data);exit;
			if ($this->Recipe->saveAssociated($this->request->data)) {
				//debug($this->request->data);exit;
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Recipe->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe')), 'default', array('class' => 'error'));
			}
		}
		$recipeCuisines = $this->Recipe->RecipeCuisine->find('list');
		$placeTypes = $this->Recipe->PlaceType->find('list',array('conditions'=>array('PlaceType.parentid' => 927)));
		//debug($recipeCategories);exit;
		$users = $this->Recipe->User->find('list');
		$this->set(compact('recipeCuisines', 'users','placeTypes'));
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
		$modelName = 'Recipe';
		$imageDB = 'RecipeImage';
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		
		if ($this->request->is('post') || $this->request->is('put')) {
			//debug($this->request->data);exit;
			
			if($userData['role_id'] == 1 && $this->request->data['Recipe']['publish'] != 1){
				
				/* [2]************************************Point Part*************************/
				$this->request->data['Point']['place_type_id'] = $this->request->data['Recipe']['place_type_id'];
				$this->request->data['Point']['name'] = $this->request->data['Recipe']['title'];
				$this->request->data['Point']['seo_name'] = $this->Seotext->formaturi(trim($this->request->data['Recipe']['title']),'_');
				/*************************************Point Part*************************/
				$this->request->data['Recipe']['place_type_id'] = $this->request->data['Recipe']['place_type_id'];
				$this->request->data['Recipe']['seo_name'] = $this->request->data['Point']['seo_name'];
				$this->request->data['Recipe']['user_id'] = $userID;
				if($this->request->data['Recipe']['publish'] == 1){
					$this->request->data['Recipe']['publish_date'] = date('Y-m-d H:i:s');
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
									//debug($imagefile);exit;
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
								//debug($this->request->data);exit;
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
				
				
				//debug($this->request->data);exit;
				unset($this->request->data['postimage']);
				if ($this->Recipe->saveAssociated($this->request->data)) {
					$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe')), 'default', array('class' => 'success'));
					$redirectTo = array('action' => 'index');
					if (isset($this->request->data['apply'])) {
						$redirectTo = array('action' => 'edit', $id);
					}
					if (isset($this->request->data['save_and_new'])) {
						$redirectTo = array('action' => 'add');
					}
					return $this->redirect($redirectTo);
				} else {
					$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe')), 'default', array('class' => 'error'));
				}
			
			}else{
				$this->Session->setFlash(__d('croogo', '%s is already published!!', __d('information', 'recipe')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
		$recipeCuisines = $this->Recipe->RecipeCuisine->find('list');
		$placeTypes = $this->Recipe->PlaceType->find('list',array('conditions'=>array('PlaceType.parentid' => 927)));
		$users = $this->Recipe->User->find('list');
		$this->set(compact('recipeCuisines', 'users', 'placeTypes'));
	}
	
	
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
	

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$modelName = 'Recipe';
		$this->$modelName->id = $id;
		if (!$this->$modelName->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe')));
		}
		$modelDetails = $this->$modelName->find('first',array('conditions' => array("$modelName.id" => $id)));
		//debug($imagename);exit;
		$modelId = $modelDetails['Recipe']['id'];
		$pointId = $modelDetails['Recipe']['id'];
		$images = $modelDetails['RecipeImage'];
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->loadModel('Point');
			$this->Point->id = $pointId;
			if ($this->Point->delete()) {}
			
			$this->loadModel('RecipeImage');
			foreach($images as $image){
				$this->RecipeImage->id = $image['id'];
				if($this->RecipeImage->delete()) {
					if(file_exists(WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$image['file'])){
						unlink(WWW_ROOT.'img'.DS.'recipes'.DS.'large'.DS.$image['file']);
					}
					if(file_exists(WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$image['file'])){
						unlink(WWW_ROOT.'img'.DS.'recipes'.DS.'medium'.DS.$image['file']);
					}
				}
			}
			
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
