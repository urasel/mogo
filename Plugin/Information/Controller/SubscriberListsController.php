<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * SubscriberLists Controller
 *
 * @property SubscriberList $SubscriberList
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SubscriberListsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('add','subscription');
		if ($this->action == 'add') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'subscription') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SubscriberList->recursive = 0;
		$this->set('subscriberLists', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SubscriberList->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		$options = array('conditions' => array('SubscriberList.' . $this->SubscriberList->primaryKey => $id));
		$this->set('subscriberList', $this->SubscriberList->find('first', $options));
	}
	
	public function subscription() {
		//debug($this->params);exit;
		if(isset($this->request->data['SubscriberList']['email'])){
			$email = $this->request->data['SubscriberList']['email'];
		}else{
			$email = '';
		}
		
		$title_for_layout = 'Free Informap24 Newsletters';
		$sexes = $this->SubscriberList->Sex->find('list');
		$this->set(compact('email', 'title_for_layout','sexes'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//debug($this->params);exit;
		if ($this->request->is('post')) {
			if($this->request->data['SubscriberList']['acknowledge'] == 1){
				unset($this->request->data['SubscriberList']['acknowledge']);
				$this->SubscriberList->create();
				//debug($this->request->data);exit;
				if ($this->SubscriberList->saveAssociated($this->request->data)) {
					$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'subscriber list')), 'default', array('class' => 'success'));
					$redirectTo = array('plugin'=>'information','controller'=>'topics','action' => 'home');
					return $this->redirect($redirectTo);
				}
			}else{
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'subscriber list')), 'default', array('class' => 'error'));
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
		if (!$this->SubscriberList->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SubscriberList->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'subscriber list')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'subscriber list')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('SubscriberList.' . $this->SubscriberList->primaryKey => $id));
			$this->request->data = $this->SubscriberList->find('first', $options);
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
		$this->SubscriberList->id = $id;
		if (!$this->SubscriberList->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SubscriberList->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Subscriber list')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Subscriber list')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SubscriberList->recursive = 0;
		$this->set('subscriberLists', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SubscriberList->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		$options = array('conditions' => array('SubscriberList.' . $this->SubscriberList->primaryKey => $id));
		$this->set('subscriberList', $this->SubscriberList->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SubscriberList->create();
			if ($this->SubscriberList->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'subscriber list')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->SubscriberList->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'subscriber list')), 'default', array('class' => 'error'));
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
		if (!$this->SubscriberList->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SubscriberList->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'subscriber list')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'subscriber list')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('SubscriberList.' . $this->SubscriberList->primaryKey => $id));
			$this->request->data = $this->SubscriberList->find('first', $options);
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
		$this->SubscriberList->id = $id;
		if (!$this->SubscriberList->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'subscriber list')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SubscriberList->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Subscriber list')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Subscriber list')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
