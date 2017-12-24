<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */
class PlaceViewsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	var $name = 'PlaceViews';
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}


}
