<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hotel Rooms');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hotel Rooms'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('hotel_id'),
		$this->Paginator->sort('hotel_room_category_id'),
		$this->Paginator->sort('room_size'),
		$this->Paginator->sort('bed'),
		$this->Paginator->sort('hotel_views'),
		$this->Paginator->sort('room_features'),
		$this->Paginator->sort('rules_conditions'),
		$this->Paginator->sort('offers'),
		$this->Paginator->sort('price'),
		$this->Paginator->sort('number'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hotelRooms as $hotelRoom):
		$row = array();
		$row[] = h($hotelRoom['HotelRoom']['id']);
		$row[] = $this->Html->link($hotelRoom['Hotel']['name'], array(
			'controller' => 'hotels',
		'action' => 'view',
			$hotelRoom['Hotel']['id'],
	));
		$row[] = $this->Html->link($hotelRoom['HotelRoomCategory']['name'], array(
			'controller' => 'hotel_room_categories',
		'action' => 'view',
			$hotelRoom['HotelRoomCategory']['id'],
	));
		$row[] = h($hotelRoom['HotelRoom']['room_size']);
		$row[] = h($hotelRoom['HotelRoom']['bed']);
		$row[] = h($hotelRoom['HotelRoom']['hotel_views']);
		$row[] = h($hotelRoom['HotelRoom']['room_features']);
		$row[] = h($hotelRoom['HotelRoom']['rules_conditions']);
		$row[] = h($hotelRoom['HotelRoom']['offers']);
		$row[] = h($hotelRoom['HotelRoom']['price']);
		$row[] = h($hotelRoom['HotelRoom']['number']);
		$actions = array($this->Croogo->adminRowActions($hotelRoom['HotelRoom']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotelRoom['HotelRoom']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotelRoom['HotelRoom']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotelRoom['HotelRoom']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotelRoom['HotelRoom']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
