<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * HomePosts Controller
 *
 * @property HomePost $HomePost
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HomePostsController extends InformationAppController {

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
		$this->HomePost->recursive = 0;
		$this->set('homePosts', $this->paginate());
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
		if (!$this->HomePost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		$options = array('conditions' => array('HomePost.' . $this->HomePost->primaryKey => $id));
		$this->set('homePost', $this->HomePost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HomePost->create();
			if ($this->HomePost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HomePost->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home post')), 'default', array('class' => 'error'));
			}
		}
		$homeCategories = $this->HomePost->HomeCategory->find('list');
		$this->set(compact('homeCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HomePost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HomePost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home post')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HomePost.' . $this->HomePost->primaryKey => $id));
			$this->request->data = $this->HomePost->find('first', $options);
		}
		$homeCategories = $this->HomePost->HomeCategory->find('list');
		$this->set(compact('homeCategories'));
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
		$this->HomePost->id = $id;
		if (!$this->HomePost->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HomePost->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Home post')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Home post')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HomePost->recursive = 0;
		$this->set('homePosts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HomePost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		$options = array('conditions' => array('HomePost.' . $this->HomePost->primaryKey => $id));
		$this->set('homePost', $this->HomePost->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'adminpointdate';
		if ($this->request->is('post')) {
			$this->HomePost->create();
			if ($this->HomePost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HomePost->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home post')), 'default', array('class' => 'error'));
			}
		}
		$homeCategories = $this->HomePost->HomeCategory->find('list');
		$this->set(compact('homeCategories'));
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
		if (!$this->HomePost->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//debug($this->request->data);exit;
			
			if ($this->HomePost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home post')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home post')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HomePost.' . $this->HomePost->primaryKey => $id));
			$this->request->data = $this->HomePost->find('first', $options);
		}
		$homeCategories = $this->HomePost->HomeCategory->find('list');
		$this->set(compact('homeCategories'));
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
		$this->HomePost->id = $id;
		if (!$this->HomePost->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home post')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HomePost->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Home post')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Home post')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function googlecaptcha(){
		$this->layout = 'login';
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$params = array();
			$params['secret'] = '6LfoZR4TAAAAAHzP1lJr1Nq7WBi5YBAZzuLPWzyx'; // Secret key
			if (isset($this->request->data['g-recaptcha-response'])) {
				$params['response'] = urlencode($this->request->data['g-recaptcha-response']);
			}
			$params['remoteip'] = $_SERVER['REMOTE_ADDR'];

			$params_string = http_build_query($params);
			//debug($params_string);exit;
			$requestURL = 'https://www.google.com/recaptcha/api/siteverify?' . $params_string;

			// Get cURL resource
			$curl = curl_init();

			// Set some options
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $requestURL,
			));
			
			// Send the request
			$response = curl_exec($curl);
			//debug($response);exit;
			// Close request to clear up some resources
			curl_close($curl);

			$response = @json_decode($response, true);
			//debug($response);exit;
			if ($response["success"] == true) {
				$referredUrl = $this->Session->read('refererUrl');
				$this->loadModel('SessionTable');
				$this->SessionTable->id = $this->Session->read('sessiontableID');
				//$data['SessionTable']['clickcount'] = 0;
				$data['SessionTable']['verified'] = 1;
				if($this->SessionTable->save($data)){};
				//debug($referredUrl);exit;
				$this->redirect($referredUrl);
			} else {
				echo '<h3 class="alert alert-danger">Authentication failed</h3>';
				return $this->redirect(array('plugin'=>'information','controller' => 'siteactions', 'action' => 'googlecaptcha'));
			}
		}
		//debug($this->params);exit;
		$title_for_layout = 'Robot Check up';
		$this->set(compact('title_for_layout'));
	}
}
