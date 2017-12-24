<?php
$this->viewVars['title_for_layout'] = __d('information', 'Airport Data');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Airport Data'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('language_id'),
		$this->Paginator->sort('airport_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('short_description'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('keyword'),
		$this->Paginator->sort('metatag'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($airportData as $airportData):
		$row = array();
		$row[] = h($airportData['AirportData']['id']);
		$row[] = $this->Html->link($airportData['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$airportData['Language']['id'],
	));
		$row[] = $this->Html->link($airportData['Airport']['name'], array(
			'controller' => 'airports',
		'action' => 'view',
			$airportData['Airport']['id'],
	));
		$row[] = h($airportData['AirportData']['name']);
		$row[] = h($airportData['AirportData']['short_description']);
		$row[] = h($airportData['AirportData']['details']);
		$row[] = h($airportData['AirportData']['keyword']);
		$row[] = h($airportData['AirportData']['metatag']);
		$actions = array($this->Croogo->adminRowActions($airportData['AirportData']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $airportData['AirportData']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$airportData['AirportData']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$airportData['AirportData']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $airportData['AirportData']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
