<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * StadiumData Controller
 *
 * @property StadiumData $StadiumData
 * @property PaginatorComponent $Paginator
 */
class StadiumDataController extends InformationAppController {

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
		$this->StadiumData->recursive = 0;
		$this->set('stadiumData', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StadiumData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		$options = array('conditions' => array('StadiumData.' . $this->StadiumData->primaryKey => $id));
		$this->set('stadiumData', $this->StadiumData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StadiumData->create();
			if ($this->StadiumData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StadiumData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->StadiumData->Language->find('list');
		$stadia = $this->StadiumData->Stadium->find('list');
		$this->set(compact('languages', 'stadia'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StadiumData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StadiumData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StadiumData.' . $this->StadiumData->primaryKey => $id));
			$this->request->data = $this->StadiumData->find('first', $options);
		}
		$languages = $this->StadiumData->Language->find('list');
		$stadia = $this->StadiumData->Stadium->find('list');
		$this->set(compact('languages', 'stadia'));
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
		$this->StadiumData->id = $id;
		if (!$this->StadiumData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StadiumData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StadiumData->recursive = 0;
		$this->set('stadiumData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StadiumData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		$options = array('conditions' => array('StadiumData.' . $this->StadiumData->primaryKey => $id));
		$this->set('stadiumData', $this->StadiumData->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StadiumData->create();
			if ($this->StadiumData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StadiumData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->StadiumData->Language->find('list');
		$stadia = $this->StadiumData->Stadium->find('list');
		$this->set(compact('languages', 'stadia'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StadiumData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StadiumData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StadiumData.' . $this->StadiumData->primaryKey => $id));
			$this->request->data = $this->StadiumData->find('first', $options);
		}
		$languages = $this->StadiumData->Language->find('list');
		$stadia = $this->StadiumData->Stadium->find('list');
		$this->set(compact('languages', 'stadia'));
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
		$this->StadiumData->id = $id;
		if (!$this->StadiumData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StadiumData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
