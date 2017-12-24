<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportStopages Controller
 *
 * @property TransportStopage $TransportStopage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportStopagesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TransportStopage->recursive = 0;
		$this->set('transportStopages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportStopage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		$options = array('conditions' => array('TransportStopage.' . $this->TransportStopage->primaryKey => $id));
		$this->set('transportStopage', $this->TransportStopage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportStopage->create();
			if ($this->TransportStopage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport stopage')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportStopage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport stopage')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->TransportStopage->Point->find('list');
		$placeTypes = $this->TransportStopage->PlaceType->find('list');
		$transportTypes = $this->TransportStopage->TransportType->find('list');
		$this->set(compact('points', 'placeTypes', 'transportTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportStopage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportStopage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport stopage')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport stopage')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportStopage.' . $this->TransportStopage->primaryKey => $id));
			$this->request->data = $this->TransportStopage->find('first', $options);
		}
		$points = $this->TransportStopage->Point->find('list');
		$placeTypes = $this->TransportStopage->PlaceType->find('list');
		$transportTypes = $this->TransportStopage->TransportType->find('list');
		$this->set(compact('points', 'placeTypes', 'transportTypes'));
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
		$this->TransportStopage->id = $id;
		if (!$this->TransportStopage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportStopage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport stopage')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport stopage')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportStopage->recursive = 0;
		$this->set('transportStopages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportStopage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		$options = array('conditions' => array('TransportStopage.' . $this->TransportStopage->primaryKey => $id));
		$this->set('transportStopage', $this->TransportStopage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportStopage->create();
			if ($this->TransportStopage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport stopage')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportStopage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport stopage')), 'default', array('class' => 'error'));
			}
		}
		//$points = $this->TransportStopage->Point->find('list');
		$placeTypes = $this->TransportStopage->PlaceType->find('list');
		$transportTypes = $this->TransportStopage->TransportType->find('list');
		$this->set(compact('placeTypes', 'transportTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportStopage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportStopage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport stopage')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport stopage')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportStopage.' . $this->TransportStopage->primaryKey => $id));
			$this->request->data = $this->TransportStopage->find('first', $options);
		}
		//$points = $this->TransportStopage->Point->find('list');
		$placeTypes = $this->TransportStopage->PlaceType->find('list');
		$transportTypes = $this->TransportStopage->TransportType->find('list');
		$this->set(compact('placeTypes', 'transportTypes'));
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
		$this->TransportStopage->id = $id;
		if (!$this->TransportStopage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport stopage')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportStopage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport stopage')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport stopage')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
