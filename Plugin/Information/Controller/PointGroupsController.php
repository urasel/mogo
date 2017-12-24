<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * PointGroups Controller
 *
 * @property PointGroup $PointGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PointGroupsController extends InformationAppController {

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
		$this->PointGroup->recursive = 0;
		$this->set('pointGroups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PointGroup->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		$options = array('conditions' => array('PointGroup.' . $this->PointGroup->primaryKey => $id));
		$this->set('pointGroup', $this->PointGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PointGroup->create();
			if ($this->PointGroup->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point group')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PointGroup->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point group')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->PointGroup->PlaceType->find('list');
		$this->set(compact('placeTypes'));
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PointGroup->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PointGroup->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point group')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point group')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PointGroup.' . $this->PointGroup->primaryKey => $id));
			$this->request->data = $this->PointGroup->find('first', $options);
		}
		$placeTypes = $this->PointGroup->PlaceType->find('list');
		$this->set(compact('placeTypes'));
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
		$this->PointGroup->id = $id;
		if (!$this->PointGroup->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PointGroup->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Point group')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Point group')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PointGroup->recursive = 0;
		$this->set('pointGroups', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PointGroup->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		$options = array('conditions' => array('PointGroup.' . $this->PointGroup->primaryKey => $id));
		$this->set('pointGroup', $this->PointGroup->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//debug($this->request->data);exit;
		if ($this->request->is('post')) {
		//debug($this->request->data);exit;
			$this->PointGroup->create();
			if ($this->PointGroup->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point group')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PointGroup->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point group')), 'default', array('class' => 'error'));
			}
		}
		$parents = $this->PointGroup->find('list');
		$placeTypes = $this->PointGroup->PlaceType->find('list',array('order' => 'PlaceType.name ASC'));
		$this->set(compact('parents','placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PointGroup->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PointGroup->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point group')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point group')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PointGroup.' . $this->PointGroup->primaryKey => $id));
			$this->request->data = $this->PointGroup->find('first', $options);
		}
		$parents = $this->PointGroup->find('list');
		$placeTypes = $this->PointGroup->PlaceType->find('list',array('order' => 'PlaceType.name ASC'));
		$this->set(compact('parents','placeTypes'));
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
		$this->PointGroup->id = $id;
		if (!$this->PointGroup->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point group')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PointGroup->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Point group')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Point group')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
