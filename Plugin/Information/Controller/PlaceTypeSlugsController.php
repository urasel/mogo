<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * PlaceTypeSlugs Controller
 *
 * @property PlaceTypeSlug $PlaceTypeSlug
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlaceTypeSlugsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Seotext','Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlaceTypeSlug->recursive = 0;
		$this->set('placeTypeSlugs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceTypeSlug->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		$options = array('conditions' => array('PlaceTypeSlug.' . $this->PlaceTypeSlug->primaryKey => $id));
		$this->set('placeTypeSlug', $this->PlaceTypeSlug->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceTypeSlug->create();
			if ($this->PlaceTypeSlug->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place type slug')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceTypeSlug->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place type slug')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->PlaceTypeSlug->PlaceType->find('list');
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
		if (!$this->PlaceTypeSlug->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceTypeSlug->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place type slug')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place type slug')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceTypeSlug.' . $this->PlaceTypeSlug->primaryKey => $id));
			$this->request->data = $this->PlaceTypeSlug->find('first', $options);
		}
		$placeTypes = $this->PlaceTypeSlug->PlaceType->find('list');
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
		$this->PlaceTypeSlug->id = $id;
		if (!$this->PlaceTypeSlug->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceTypeSlug->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Place type slug')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Place type slug')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceTypeSlug->recursive = 0;
		$this->set('placeTypeSlugs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceTypeSlug->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		$options = array('conditions' => array('PlaceTypeSlug.' . $this->PlaceTypeSlug->primaryKey => $id));
		$this->set('placeTypeSlug', $this->PlaceTypeSlug->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			foreach($this->request->data['PlaceTypeSlug']['title'] as $key => $value){
				if(!empty($this->request->data['PlaceTypeSlug']['title'])){
					$this->request->data['newPlaceTypeSlug'][$key]['place_type_id'] = $this->request->data['PlaceTypeSlug']['place_type_id'];
					$this->request->data['newPlaceTypeSlug'][$key]['title'] 	= $this->request->data['PlaceTypeSlug']['title'][$key];
					$this->request->data['newPlaceTypeSlug'][$key]['seo_title'] 	= $this->Seotext->formaturi($this->request->data['PlaceTypeSlug']['title'][$key],'-');
					$this->request->data['newPlaceTypeSlug'][$key]['slug'] 		= $this->request->data['PlaceTypeSlug']['slug'][$key];
					$this->request->data['newPlaceTypeSlug'][$key]['params'] 	= $this->request->data['PlaceTypeSlug']['params'][$key];
					$this->request->data['newPlaceTypeSlug'][$key]['isactive'] = 1;
				}
			}
			//debug($this->request->data['newPlaceTypeSlug']);exit;
			$this->PlaceTypeSlug->create();
			if ($this->PlaceTypeSlug->saveAll($this->request->data['newPlaceTypeSlug'])) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place type slug')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceTypeSlug->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place type slug')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->PlaceTypeSlug->PlaceType->find('list',array('order' => 'PlaceType.name ASC'));
		$this->set(compact('placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PlaceTypeSlug->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceTypeSlug->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place type slug')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place type slug')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceTypeSlug.' . $this->PlaceTypeSlug->primaryKey => $id));
			$this->request->data = $this->PlaceTypeSlug->find('first', $options);
		}
		$placeTypes = $this->PlaceTypeSlug->PlaceType->find('list',array('order' => 'PlaceType.name ASC'));
		$this->set(compact('placeTypes'));
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
		$this->PlaceTypeSlug->id = $id;
		if (!$this->PlaceTypeSlug->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place type slug')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceTypeSlug->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Place type slug')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Place type slug')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
