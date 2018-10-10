<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * RecentPosts Controller
 *
 * @property RecentPost $RecentPost
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RecentPostsController extends InformationAppController {

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
 
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_add','googlecaptcha');
		if ($this->action == 'admin_add') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'googlecaptcha') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	
	public function index() {
		$this->RecentPost->recursive = 0;
		$this->set('recentPosts', $this->paginate());
	}
	
	
	public function getPoint(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->loadModel('Information.Point');
		$this->Point->recursive = 1;
        if (isset($this->params['url']['term']) && $this->params['url']['term'] != '') {
            $points = $this->Point->find('all', array(
                'conditions' => array('Point.name LIKE ' => $this->params['url']['term'] . "%"),
                'limit' => 10
                )
            );
            //debug($points);exit;
			$results = array();
            foreach ($points as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $v['Point']['id'];
                $rpa['Result']['label'] = $v['Point']['name'];
                $rpa['Result']['classname'] = $v['PlaceType']['singlename'];
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
        
	}
	
	
	public function getPointDetails($id = null) {
		$this->autoRender = false;
		$this->layout = 'ajax';
		//debug($this->params);exit;
		$id = $this->params->query['pointid'];
		$className =  ucfirst($this->params->query['classname']);
		$referenceID = $this->params->query['classname'].'_id';
		$detailsTable = $className.'Data';
		$this->loadModel("Information.$className");
		$this->$className->recursive = -1;
		$classDetails = $this->$className->find('first',array('conditions' => array("$className.point_id" => $id )));
		//debug($classDetails);
		$this->loadModel('Information.Point');
		$this->Point->recursive = 1;
		
		$this->Point->bindModel(array(
				'hasOne' => array(
					$className => array(
						'foreignKey' => false,
						'conditions' => array("Point.id = $className.point_id")
					),	
				),
				'hasMany' => array(
					$detailsTable => array(
							'foreignKey' => false,
							'conditions' => array("$detailsTable.$referenceID" => $classDetails[$className]['id'])
					),
				),
			)
		);
		//debug($this->Point);
		$options = array('conditions' => array('Point.id' => $id));
		$pointDetails = $this->Point->find('first', $options);
		$log = $this->Point->getDataSource()->getLog(false, false);
		//debug($log);
		
		//debug($pointDetails);exit;
			$results = array();
                $rpa['Result']['point_id'] = $pointDetails['Point']['id'];
                $rpa['Result']['point_name'] = $pointDetails[$className]['name'];
                $rpa['Result']['point_bn_name'] = $pointDetails[$className]['bn_name'];
                $rpa['Result']['point_created'] = $pointDetails[$className]['created'];
                $rpa['Result']['point_seo_name'] = $pointDetails['Point']['seo_name'];
				$rpa['Result']['language'] = $pointDetails['Point']['language'];
                $rpa['Result']['class_id'] = $pointDetails[$className]['id'];
                $rpa['Result']['class_title'] = $pointDetails[$className]['name'];
                $rpa['Result']['class_bn_title'] = $pointDetails[$className]['bn_name'];
				if(!empty($pointDetails[$detailsTable][0]['short_description']) && $pointDetails[$detailsTable][0]['language_id'] == 1){	
                $rpa['Result']['class_details'] = $pointDetails[$detailsTable][0]['short_description'];
				}
				if(!empty($pointDetails[$detailsTable][1]['short_description']) && $pointDetails[$detailsTable][1]['language_id'] == 2){	
                $rpa['Result']['class_bn_details'] = $pointDetails[$detailsTable][1]['short_description'];
				}
                
                $rpa['Result']['class_metatag'] = $pointDetails[$className]['metatag'];
				if(!empty($pointDetails[$className]['image'])){
					$rpa['Result']['class_image'] = $pointDetails['PlaceType']['pluralname'].'/photogallery/small/'.$pointDetails[$className]['image'];
				}else if(!empty($pointDetails['Point']['map'])){
					$rpa['Result']['class_image'] = 'placemaps/'.$pointDetails['Point']['map'];
				}else{
				
				}
                
                $rpa['Result']['placetype_id'] = $pointDetails['PlaceType']['id'];
                $rpa['Result']['placetype_pluralname'] = $pointDetails['PlaceType']['pluralname'];
                $rpa['Result']['placetype_icon'] = $pointDetails['PlaceType']['icon'];
                $rpa['Result']['placetype_seoname'] = $pointDetails['PlaceType']['seo_name'];
                array_push($results, $rpa['Result']);
            echo json_encode($results);
		
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RecentPost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		$options = array('conditions' => array('RecentPost.' . $this->RecentPost->primaryKey => $id));
		$this->set('recentPost', $this->RecentPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecentPost->create();
			if ($this->RecentPost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recent post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecentPost->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recent post')), 'default', array('class' => 'error'));
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
		if (!$this->RecentPost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecentPost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recent post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recent post')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecentPost.' . $this->RecentPost->primaryKey => $id));
			$this->request->data = $this->RecentPost->find('first', $options);
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
		$this->RecentPost->id = $id;
		if (!$this->RecentPost->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecentPost->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recent post')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recent post')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RecentPost->recursive = 0;
		$this->set('recentPosts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RecentPost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		$options = array('conditions' => array('RecentPost.' . $this->RecentPost->primaryKey => $id));
		$this->set('recentPost', $this->RecentPost->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'adminpointdate';
		if ($this->request->is('post')) {
			$this->RecentPost->create();
			if ($this->RecentPost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recent post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->RecentPost->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recent post')), 'default', array('class' => 'error'));
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
		$this->layout = 'adminpointdate';
		if (!$this->RecentPost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecentPost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'recent post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'recent post')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('RecentPost.' . $this->RecentPost->primaryKey => $id));
			$this->request->data = $this->RecentPost->find('first', $options);
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
		$this->RecentPost->id = $id;
		if (!$this->RecentPost->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'recent post')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecentPost->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Recent post')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Recent post')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
