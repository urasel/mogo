<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * BloodNews Controller
 *
 * @property BloodNews $BloodNews
 * @property PaginatorComponent $Paginator
 */
class BloodNewsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $helpers = array(
		'Html' => array(
			'className' => 'CroogoHtml',
		),
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BloodNews->recursive = 0;
		$this->set('bloodNews', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'bootstrap';
		if (!$this->BloodNews->exists($id)) {
			throw new NotFoundException(__('Invalid blood news'));
		}
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			$firstName = 'bn_firstname';
			$lastName = 'bn_lastname';
		}else{
			$fieldName = 'name';
			$firstName = 'firstname';
			$lastName = 'lastname';
		}
		$fields = array(
			"BloodGroup.$fieldName as name",
			'BloodNews.quantity',
			'BloodNews.mobile',
			'BloodNews.required_date',
			'BloodNewsDetail.details',
			'BloodNewsDetail.address',
			"User.$firstName as firstname",
			"User.$lastName as lastname",
		);
		$options = array('conditions' => array('BloodNews.' . $this->BloodNews->primaryKey => $id),'fields'=> $fields);
		$bloodNews = $this->BloodNews->find('first', $options);
		//debug($bloodNews);
		$title_for_layout = $bloodNews['BloodGroup']['name'].__(' Blood Needed').'. '.__('Contact Info').': '.$bloodNews['User']['firstname'].' '.$bloodNews['User']['lastname'].', '.__('Mobile').': '.$bloodNews['BloodNews']['mobile'];
		
		$this->set(compact('bloodNews', 'title_for_layout'));
		
	}
	
	public function listing() {
		$this->layout = 'bootstrap';
		$this->BloodNews->recursive = 1;
		$title_for_layout = __('Blood Needed');
		$this->paginate = array(
				'order' => array(
				'BloodNews.created' => 'desc'
			)
		);
		$this->set('bloodNews', $this->Paginator->paginate());
		$this->set(compact('title_for_layout'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'bootstrap';
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$requiredDate = $this->request->data['BloodNews']['requireddate'];
			$this->request->data['BloodNews']['required_date'] = $requiredDate;
			$this->request->data['BloodNews']['user_id'] = $this->Auth->user('id');
			$this->BloodNews->create();
			if ($this->BloodNews->saveAll($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'edit', $this->BloodNews->id);
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodNews->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news')), 'default', array('class' => 'error'));
			}
		}
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$bloodGroups = $this->BloodNews->BloodGroup->find('list',array('fields' => array('id',$fieldName)));
		$this->set(compact('bloodGroups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'bootstrap';
		if (!$this->BloodNews->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodNews->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodNews.' . $this->BloodNews->primaryKey => $id));
			$currentUserID = $this->Auth->user('id');
			$this->request->data = $this->BloodNews->find('first', $options);
			//debug($this->request->data);
			$dataUserID = $this->request->data['User']['id'];
			if($dataUserID != $currentUserID){
				$this->Session->setFlash(__('You are not Authorized to Edit This.'), 'default', array('class' => 'error'));
				$redirectTo = array('action' => 'add');
				return $this->redirect($redirectTo);
			}
		}
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$bloodGroups = $this->BloodNews->BloodGroup->find('list',array('fields' => array('id',$fieldName)));
		$users = $this->BloodNews->User->find('list');
		$this->set(compact('bloodGroups', 'users'));
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
		$this->BloodNews->id = $id;
		if (!$this->BloodNews->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodNews->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood news')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood news')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BloodNews->recursive = 0;
		$this->set('bloodNews', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BloodNews->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news')));
		}
		$options = array('conditions' => array('BloodNews.' . $this->BloodNews->primaryKey => $id));
		$this->set('bloodNews', $this->BloodNews->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			$this->BloodNews->create();
			if ($this->BloodNews->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodNews->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news')), 'default', array('class' => 'error'));
			}
		}
		$bloodGroups = $this->BloodNews->BloodGroup->find('list');
		$users = $this->BloodNews->User->find('list');
		$this->set(compact('bloodGroups', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		//debug($this->request->data);exit;
		if (!$this->BloodNews->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodNews->saveAll($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodNews.' . $this->BloodNews->primaryKey => $id));
			$this->request->data = $this->BloodNews->find('first', $options);
		}
		$bloodGroups = $this->BloodNews->BloodGroup->find('list');
		$users = $this->BloodNews->User->find('list');
		$this->set(compact('bloodGroups', 'users'));
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
		$this->BloodNews->id = $id;
		if (!$this->BloodNews->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodNews->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood news')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood news')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
