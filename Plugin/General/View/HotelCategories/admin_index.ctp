<?php
$this->viewVars['title_for_layout'] = __d('general', 'Hotel Categories');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Hotel Categories'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('star'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hotelCategories as $hotelCategory):
		$row = array();
		$row[] = h($hotelCategory['HotelCategory']['id']);
		$row[] = h($hotelCategory['HotelCategory']['name']);
		$row[] = h($hotelCategory['HotelCategory']['star']);
		$actions = array($this->Croogo->adminRowActions($hotelCategory['HotelCategory']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotelCategory['HotelCategory']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotelCategory['HotelCategory']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotelCategory['HotelCategory']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotelCategory['HotelCategory']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
