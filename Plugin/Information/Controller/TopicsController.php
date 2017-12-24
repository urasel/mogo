<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Topics Controller
 *
 * @property Topic $Topic
 * @property PaginatorComponent $Paginator
 */
class TopicsController extends InformationAppController {

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
		$this->Topic->recursive = 0;
		$this->set('topics', $this->paginate());
	}
	public function home(){
		$Node = $this->{$this->modelClass};
		$this->layout = 'default';
		$this->loadModel('PlaceType');
		$this->PlaceType->recursive = -1;
		//debug($this->params);
		//$lnagCode = $this->params['language'];
		//parent::setLang($lnagCode);
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$topTypes = $this->PlaceType->find('all',array('conditions'=>array('PlaceType.topcat' => 1),'order' => array('PlaceType.order ASC' )));
		
		$categories = $this->PlaceType->find('all',array('fields' =>array('PlaceType.id',"PlaceType.$fieldName as name",'PlaceType.icon','PlaceType.seo_name'),'conditions'=>array('PlaceType.isactive' => 1,'PlaceType.parentid' => 0),'order' => array('PlaceType.order ASC' ),'limit' => 15));
		
		/**************************************Popular Posts*************************/
		
		//debug($featuredPoints);exit;
		$this->loadModel('Information.HomeCategory');
		$homeCategoryDetails = $this->HomeCategory->find('all',array('contain' => 'HomePost.isactive = 1'));
		$postIDArray = '';
		foreach($homeCategoryDetails as $posting){
			foreach($posting['HomePost'] as $post){
				//debug($post);
				$postIDArray[] = $post['pointid'];
			}
			
		}
		
		$this->loadModel('Point');
		$parentCats = '';
		$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
		foreach($hasChilds as $pCat){
			$parentCatId = $pCat['PlaceType']['parentid'];
			$parentCats[] = $parentCatId;
		}
		$visitData = $this->Point->find('list',array('conditions' => array('Point.id' => $postIDArray),'fields' => array('Point.id','Point.totalvisit')));
		//debug($visitData);
		//debug($homeCategoryDetails);exit;
		/**************************************Popular Posts*************************/
		$this->loadModel('Information.BloodNews');
		$bloodnews = $this->BloodNews->find('all',array('fields' =>array('BloodNews.id','BloodNews.required_date','BloodNews.mobile','BloodNews.created',"BloodGroup.$fieldName as name",'User.firstname'),'conditions'=>array('BloodNews.isactive' => 1),'order' => array('BloodNews.created DESC' ),'limit' => 3));
		//debug($bloodnews);
		$bloodnews = json_encode($bloodnews);
		$metadescription = 'InfoMap24 helps you find the perfect places to go with friends and will provide you the important topics for your daily activities. Discover the best food, locations, nightlife, and entertainment in your area.';
		$this->set('title_for_layout',__('Learn about your surroundings'));
		$this->set(compact('topTypes','categories','bloodnews','metadescription','homeCategoryDetails','visitData','parentCats'));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Topic->create();
			if ($this->Topic->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Topic->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Topic->User->find('list');
		$points = $this->Topic->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Topic->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
			$this->request->data = $this->Topic->find('first', $options);
		}
		$users = $this->Topic->User->find('list');
		$points = $this->Topic->Point->find('list');
		$this->set(compact('users', 'points'));
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
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Topic->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Topic')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Topic')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Topic->create();
			if ($this->Topic->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Topic->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Topic->User->find('list');
		$points = $this->Topic->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Topic->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'topic')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'topic')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
			$this->request->data = $this->Topic->find('first', $options);
		}
		$users = $this->Topic->User->find('list');
		$points = $this->Topic->Point->find('list');
		$this->set(compact('users', 'points'));
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
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'topic')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Topic->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Topic')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Topic')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
}
