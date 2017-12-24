<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * HospitalImages Controller
 *
 * @property HospitalImage $HospitalImage
 * @property PaginatorComponent $Paginator
 */
class HospitalImagesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Security->unlockedActions = array('ajaxdelete','mapajaxdelete');
		if ($this->action == 'ajaxdelete') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'mapajaxdelete') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	
	public function index() {
		$this->HospitalImage->recursive = 0;
		$this->set('hospitalImages', $this->paginate());
	}
	
	public function ajaxdelete($id = null) {
		$this->layout = 'ajax';
		$this->autoRender = false;
		//debug($this->request->data);
		$modelName = $this->request->data['modelName'];
		$folderName = $this->request->data['folder'];
		$classname = $this->request->data['classname'];
		$classid = $this->request->data['classid'];
		$classImageFile = $this->request->data['classImageFile'];
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
			
				if($classImageFile == $imagename[$modelName]['file']){
					$this->loadModel('Information.'.$classname);
					$this->$classname->id = $classid;
					$this->$classname->saveField('image', '');
				}
			}
			$this->Session->setFlash(__('The image has been deleted.'));
		}else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function mapajaxdelete($id = null) {
		$this->layout = 'ajax';
		$this->autoRender = false;
		//debug($this->request->data);
		$modelName = $this->request->data['modelName'];
		$folderName = $this->request->data['folder'];
		$filename = $this->request->data['filename'];
		$classid = $this->request->data['classid'];
		$this->loadModel('Information.'.$modelName);
		$id = $this->request->data['classid'];
		$this->request->onlyAllow('post', 'delete');
		$this->$modelName->id = $id;
		$this->$modelName->saveField('map', '');
		//debug($imagename);exit;
		
		if(file_exists(WWW_ROOT.'img'.DS.$folderName.DS.$filename)){
			unlink(WWW_ROOT.'img'.DS.$folderName.DS.$filename);
			
		}
		$this->Session->setFlash(__('The image has been deleted.'));
		
		return $this->redirect(array('action' => 'index'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
		$this->set('hospitalImage', $this->HospitalImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HospitalImage->create();
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HospitalImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'hospital image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'hospital image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
			$this->request->data = $this->HospitalImage->find('first', $options);
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
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
		$this->HospitalImage->id = $id;
		if (!$this->HospitalImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HospitalImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Hospital image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Hospital image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HospitalImage->recursive = 0;
		$this->set('hospitalImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
		$this->set('hospitalImage', $this->HospitalImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HospitalImage->create();
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HospitalImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'hospital image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'hospital image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
			$this->request->data = $this->HospitalImage->find('first', $options);
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
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
		$this->HospitalImage->id = $id;
		if (!$this->HospitalImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'hospital image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HospitalImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Hospital image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Hospital image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
