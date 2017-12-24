<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TopicData Controller
 *
 * @property TopicData $TopicData
 * @property PaginatorComponent $Paginator
 */
class TopicDataController extends InformationAppController {

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
		$this->TopicData->recursive = 0;
		$this->set('topicData', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TopicData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		$options = array('conditions' => array('TopicData.' . $this->TopicData->primaryKey => $id));
		$this->set('topicData', $this->TopicData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TopicData->create();
			if ($this->TopicData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TopicData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->TopicData->Language->find('list');
		$topics = $this->TopicData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TopicData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TopicData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TopicData.' . $this->TopicData->primaryKey => $id));
			$this->request->data = $this->TopicData->find('first', $options);
		}
		$languages = $this->TopicData->Language->find('list');
		$topics = $this->TopicData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
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
		$this->TopicData->id = $id;
		if (!$this->TopicData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TopicData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Topic data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Topic data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TopicData->recursive = 0;
		$this->set('topicData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TopicData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		$options = array('conditions' => array('TopicData.' . $this->TopicData->primaryKey => $id));
		$this->set('topicData', $this->TopicData->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TopicData->create();
			if ($this->TopicData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TopicData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->TopicData->Language->find('list');
		$topics = $this->TopicData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TopicData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TopicData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TopicData.' . $this->TopicData->primaryKey => $id));
			$this->request->data = $this->TopicData->find('first', $options);
		}
		$languages = $this->TopicData->Language->find('list');
		$topics = $this->TopicData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
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
		$this->TopicData->id = $id;
		if (!$this->TopicData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TopicData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Topic data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Topic data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
