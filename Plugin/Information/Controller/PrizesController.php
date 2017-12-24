<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Prizes Controller
 *
 * @property Prize $Prize
 * @property PaginatorComponent $Paginator
 */
class PrizesController extends InformationAppController {

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
		$this->Prize->recursive = 0;
		$this->set('prizes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prize->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		$options = array('conditions' => array('Prize.' . $this->Prize->primaryKey => $id));
		$this->set('prize', $this->Prize->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prize->create();
			if ($this->Prize->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'prize')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Prize->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'prize')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Prize->Point->find('list');
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
		if (!$this->Prize->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Prize->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'prize')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'prize')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Prize.' . $this->Prize->primaryKey => $id));
			$this->request->data = $this->Prize->find('first', $options);
		}
		$points = $this->Prize->Point->find('list');
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
		$this->Prize->id = $id;
		if (!$this->Prize->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prize->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Prize')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Prize')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prize->recursive = 0;
		$this->set('prizes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Prize->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		$options = array('conditions' => array('Prize.' . $this->Prize->primaryKey => $id));
		$this->set('prize', $this->Prize->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Prize->create();
			if ($this->Prize->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'prize')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Prize->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'prize')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Prize->Point->find('list');
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
		if (!$this->Prize->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Prize->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'prize')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'prize')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Prize.' . $this->Prize->primaryKey => $id));
			$this->request->data = $this->Prize->find('first', $options);
		}
		$points = $this->Prize->Point->find('list');
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
		$this->Prize->id = $id;
		if (!$this->Prize->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'prize')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prize->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Prize')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Prize')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
