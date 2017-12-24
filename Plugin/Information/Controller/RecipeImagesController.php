<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * RecipeImages Controller
 *
 * @property RecipeImage $RecipeImage
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RecipeImagesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RecipeImage->recursive = 0;
		$this->set('recipeImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RecipeImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		$options = array('conditions' => array('RecipeImage.' . $this->RecipeImage->primaryKey => $id));
		$this->set('recipeImage', $this->RecipeImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecipeImage->create();
			if ($this->RecipeImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecipeImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe image')), 'default', array('class' => 'error'));
			}
		}
		$recipes = $this->RecipeImage->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RecipeImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipeImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecipeImage.' . $this->RecipeImage->primaryKey => $id));
			$this->request->data = $this->RecipeImage->find('first', $options);
		}
		$recipes = $this->RecipeImage->Recipe->find('list');
		$this->set(compact('recipes'));
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
		$this->RecipeImage->id = $id;
		if (!$this->RecipeImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipeImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RecipeImage->recursive = 0;
		$this->set('recipeImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RecipeImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		$options = array('conditions' => array('RecipeImage.' . $this->RecipeImage->primaryKey => $id));
		$this->set('recipeImage', $this->RecipeImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RecipeImage->create();
			if ($this->RecipeImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecipeImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe image')), 'default', array('class' => 'error'));
			}
		}
		$recipes = $this->RecipeImage->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->RecipeImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipeImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recipe image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recipe image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecipeImage.' . $this->RecipeImage->primaryKey => $id));
			$this->request->data = $this->RecipeImage->find('first', $options);
		}
		$recipes = $this->RecipeImage->Recipe->find('list');
		$this->set(compact('recipes'));
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
		$this->RecipeImage->id = $id;
		if (!$this->RecipeImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recipe image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipeImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recipe image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recipe image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
