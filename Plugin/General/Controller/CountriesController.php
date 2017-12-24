<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
 */
class CountriesController extends GeneralAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
	}
	
	public function getCountries(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Country->recursive = -1;
        if (isset($this->params['url']['term']) && $this->params['url']['term'] != '') {
            $countries = $this->Country->find('list', array(
				'fields'=>array('id','name'),
                'conditions' => array('Country.name LIKE ' => $this->params['url']['term'] . "%"),
                'limit' => 10
                    )
            );
            //debug($countries);exit;
			$results = array();
            foreach ($countries as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
        
	
	}
	public function getSearchCountries(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Country->recursive = -1;
        if (isset($this->params['url']['term']) && $this->params['url']['term'] != '') {
            $countries = $this->Country->find('list', array(
				'fields'=>array('id','name'),
                'conditions' => array('Country.name LIKE ' => $this->params['url']['term'] . "%"),
                'limit' => 10
                    )
            );
            //debug($countries);exit;
			$results = array();
            foreach ($countries as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
        
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
		$this->set('country', $this->Country->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Country->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country')), 'default', array('class' => 'error'));
			}
		}
		$continents = $this->Country->Continent->find('list');
		$this->set(compact('continents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
			$this->request->data = $this->Country->find('first', $options);
		}
		$continents = $this->Country->Continent->find('list');
		$this->set(compact('continents'));
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Country->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Country->recursive = 0;
		//$this->paginate = array('limit' => 2,'order' => array('Country.order ASC'));
		$this->paginate = array(
			'order' => array(
				'Country.order' => 'asc'
			)
		);
		$this->set('countries', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
		$this->set('country', $this->Country->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Country->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country')), 'default', array('class' => 'error'));
			}
		}
		$continents = $this->Country->Continent->find('list');
		$this->set(compact('continents'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
			$this->request->data = $this->Country->find('first', $options);
		}
		$continents = $this->Country->Continent->find('list');
		$this->set(compact('continents'));
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Country->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
