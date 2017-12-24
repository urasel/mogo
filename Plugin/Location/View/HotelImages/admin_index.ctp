<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hotel Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hotel Images'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('hotel_id'),
		$this->Paginator->sort('file'),
		$this->Paginator->sort('location'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hotelImages as $hotelImage):
		$row = array();
		$row[] = h($hotelImage['HotelImage']['id']);
		$row[] = $this->Html->link($hotelImage['Hotel']['name'], array(
			'controller' => 'hotels',
		'action' => 'view',
			$hotelImage['Hotel']['id'],
	));
		$row[] = h($hotelImage['HotelImage']['file']);
		$row[] = h($hotelImage['HotelImage']['location']);
		$actions = array($this->Croogo->adminRowActions($hotelImage['HotelImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotelImage['HotelImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotelImage['HotelImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotelImage['HotelImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotelImage['HotelImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
