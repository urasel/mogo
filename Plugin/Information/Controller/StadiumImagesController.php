<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * StadiumImages Controller
 *
 * @property StadiumImage $StadiumImage
 * @property PaginatorComponent $Paginator
 */
class StadiumImagesController extends InformationAppController {

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
	public function index() {
		$this->StadiumImage->recursive = 0;
		$this->set('stadiumImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StadiumImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		$options = array('conditions' => array('StadiumImage.' . $this->StadiumImage->primaryKey => $id));
		$this->set('stadiumImage', $this->StadiumImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StadiumImage->create();
			if ($this->StadiumImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StadiumImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->StadiumImage->Point->find('list');
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
		if (!$this->StadiumImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StadiumImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StadiumImage.' . $this->StadiumImage->primaryKey => $id));
			$this->request->data = $this->StadiumImage->find('first', $options);
		}
		$points = $this->StadiumImage->Point->find('list');
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
		$this->StadiumImage->id = $id;
		if (!$this->StadiumImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StadiumImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StadiumImage->recursive = 0;
		$this->set('stadiumImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StadiumImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		$options = array('conditions' => array('StadiumImage.' . $this->StadiumImage->primaryKey => $id));
		$this->set('stadiumImage', $this->StadiumImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StadiumImage->create();
			if ($this->StadiumImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StadiumImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->StadiumImage->Point->find('list');
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
		if (!$this->StadiumImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StadiumImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StadiumImage.' . $this->StadiumImage->primaryKey => $id));
			$this->request->data = $this->StadiumImage->find('first', $options);
		}
		$points = $this->StadiumImage->Point->find('list');
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
		$this->StadiumImage->id = $id;
		if (!$this->StadiumImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StadiumImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
