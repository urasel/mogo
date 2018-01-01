<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */
class PlacesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
	$this->Security->unlockedActions = array('findplace');
		if ($this->action == 'findplace') {
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
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Place->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Place')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Place')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Place->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'place')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'place')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Place')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Place')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function findplace(){
		$this->layout = 'ajax';
		//debug($this->request->data);exit;
		$accessLat = $this->request->data['lat'];
		$accessLng = $this->request->data['lng'];
		$address = $this->request->data['address'];
		//debug($this->request->data);
		/* 
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * 
						COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) *  
						SIN( RADIANS( lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
						WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.lat < places.lat AND ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( lat ) ) ) ) < 4) <= 4
						HAVING distance < 200  ORDER BY place_type_id,distance ASC
					";
		*/
		/*
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( places.lat ) ) * COS( RADIANS( places.lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( places.lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
					WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id > places.id ORDER BY places.lat, places.lng ASC) <= 4
					HAVING distance < 8  ORDER BY place_type_id, distance ASC		
					";
		
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( places.lat ) ) * COS( RADIANS( places.lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( places.lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
					WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id > places.id) <= 4
					HAVING distance < 100 ORDER BY place_type_id, distance ASC		
					";
		*/
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * 
		COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) *  
		SIN( RADIANS( lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
		WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id < places.id AND ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( lat ) ) ) ) < 4) <= 2
		AND places.place_type_id IN (1,3,10,12,13,14,18,19)
		HAVING distance < 10  ORDER BY place_type_id,distance ASC
		
		";
			//debug($places);
			$this->loadModel('Place');
			$this->loadModel('Accesslog');
			$places = $this->Place->query($places);
			$userID = $this->Auth->user('id');
			if(!empty($userID)){
			  $this->request->data['Accesslog']['user_id'] = $userID;
			}
			$this->request->data['Accesslog']['address'] = $address;
			$this->request->data['Accesslog']['ip'] = $this->request->clientIp();
			$this->Accesslog->create();
			$this->Accesslog->save($this->request->data['Accesslog']);
			//debug($this->request->data['Accesslog']);
		$this->set(compact('accessLat','accessLng','places','address'));
	
	}
	
	public function mappath(){
		$this->layout = 'locate';
		//debug($this->params->query);exit;
		$title_for_layout = '';
		$pageHeader = '';
		$placeid = $this->params->query['rcord'];
		$firstPointLat = $this->params->query['lat'];
		$firstPointLng = $this->params->query['lng'];
		if(!empty($this->params->query['plat'])){
		$secondPointLat = $this->params->query['plat'];
		}
		else{
		$secondPointLat = '23.729965';
		}
		if(!empty($this->params->query['plng'])){
		$secondPointLng = $this->params->query['plng'];
		}
		else{
		$startPointName = "Motijheel Thana";
		$secondPointLng = '90.417267';
		}
		$this->loadModel('Place');
		$placeDetails = $this->Place->find('first',array('conditions'=> array('Place.id' => $placeid )));
		//debug($placeDetails);
		if(!empty($this->params->query['addr'])){
		$title = $this->params->query['addr'];
		$title_for_layout = 'Direction From '.$title.' To '.$placeDetails['Place']['name'].', '.$placeDetails['BdThanas']['name'].','.$placeDetails['BdDistrict']['name'].' in OxiMap';
		$pageHeader = 'From '.$title.' To '.$placeDetails['Place']['name'].', '.$placeDetails['BdThanas']['name'].','.$placeDetails['BdDistrict']['name'].' Map Direction in OxiMap';
		}
		else{
		$title = "Motijheel Thana";
		$title_for_layout = 'Direction From '.$title.' To '.$placeDetails['Place']['name'].', '.$placeDetails['BdThanas']['name'].','.$placeDetails['BdDistrict']['name'].' in OxiMap';
		$pageHeader = 'From '.$title.' To '.$placeDetails['Place']['name'].', '.$placeDetails['BdThanas']['name'].','.$placeDetails['BdDistrict']['name'].' Map Direction in OxiMap';
		}
		
		$this->set(compact('firstPointLat','firstPointLng','secondPointLat','secondPointLng','title_for_layout','pageHeader','placeDetails'));
	}
}
