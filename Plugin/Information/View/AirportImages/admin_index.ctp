<?php
$this->viewVars['title_for_layout'] = __d('information', 'Airport Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Airport Images'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('file'),
		$this->Paginator->sort('position'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($airportImages as $airportImage):
		$row = array();
		$row[] = h($airportImage['AirportImage']['id']);
		$row[] = $this->Html->link($airportImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$airportImage['Point']['id'],
	));
		$row[] = h($airportImage['AirportImage']['file']);
		$row[] = h($airportImage['AirportImage']['position']);
		$actions = array($this->Croogo->adminRowActions($airportImage['AirportImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $airportImage['AirportImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$airportImage['AirportImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$airportImage['AirportImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $airportImage['AirportImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
