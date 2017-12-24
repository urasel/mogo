<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * RecipeCuisines Controller
 *
 * @property RecipeCuisine $RecipeCuisine
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RecipeCuisinesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RecipeCuisine->recursive = 0;
		$this->set('recipeCuisines', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RecipeCuisine->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		$options = array('conditions' => array('RecipeCuisine.' . $this->RecipeCuisine->primaryKey => $id));
		$this->set('recipeCuisine', $this->RecipeCuisine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecipeCuisine->create();
			if ($this->RecipeCuisine->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe cuisine')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecipeCuisine->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe cuisine')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RecipeCuisine->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipeCuisine->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe cuisine')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe cuisine')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecipeCuisine.' . $this->RecipeCuisine->primaryKey => $id));
			$this->request->data = $this->RecipeCuisine->find('first', $options);
		}
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
		$this->RecipeCuisine->id = $id;
		if (!$this->RecipeCuisine->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipeCuisine->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe cuisine')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe cuisine')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RecipeCuisine->recursive = 0;
		$this->set('recipeCuisines', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RecipeCuisine->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		$options = array('conditions' => array('RecipeCuisine.' . $this->RecipeCuisine->primaryKey => $id));
		$this->set('recipeCuisine', $this->RecipeCuisine->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RecipeCuisine->create();
			if ($this->RecipeCuisine->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe cuisine')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecipeCuisine->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe cuisine')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->RecipeCuisine->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipeCuisine->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe cuisine')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe cuisine')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecipeCuisine.' . $this->RecipeCuisine->primaryKey => $id));
			$this->request->data = $this->RecipeCuisine->find('first', $options);
		}
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
		$this->RecipeCuisine->id = $id;
		if (!$this->RecipeCuisine->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe cuisine')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipeCuisine->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe cuisine')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe cuisine')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
