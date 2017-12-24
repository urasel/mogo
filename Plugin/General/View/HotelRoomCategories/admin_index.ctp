<?php
$this->viewVars['title_for_layout'] = __d('general', 'Hotel Room Categories');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Hotel Room Categories'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hotelRoomCategories as $hotelRoomCategory):
		$row = array();
		$row[] = h($hotelRoomCategory['HotelRoomCategory']['id']);
		$row[] = h($hotelRoomCategory['HotelRoomCategory']['name']);
		$actions = array($this->Croogo->adminRowActions($hotelRoomCategory['HotelRoomCategory']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotelRoomCategory['HotelRoomCategory']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotelRoomCategory['HotelRoomCategory']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotelRoomCategory['HotelRoomCategory']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotelRoomCategory['HotelRoomCategory']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
