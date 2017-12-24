<?php
$this->viewVars['title_for_layout'] = __d('general', 'Hotel Facilities');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Hotel Facilities'), array('action' => 'index'));

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
	foreach ($hotelFacilities as $hotelFacility):
		$row = array();
		$row[] = h($hotelFacility['HotelFacility']['id']);
		$row[] = h($hotelFacility['HotelFacility']['name']);
		$actions = array($this->Croogo->adminRowActions($hotelFacility['HotelFacility']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotelFacility['HotelFacility']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotelFacility['HotelFacility']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotelFacility['HotelFacility']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotelFacility['HotelFacility']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
