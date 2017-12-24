<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Stopages');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Stopages'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('transport_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('bn_address'),
		$this->Paginator->sort('contact'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportStopages as $transportStopage):
		$row = array();
		$row[] = h($transportStopage['TransportStopage']['id']);
		$row[] = $this->Html->link($transportStopage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$transportStopage['Point']['id'],
	));
		$row[] = $this->Html->link($transportStopage['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$transportStopage['PlaceType']['id'],
	));
		$row[] = $this->Html->link($transportStopage['TransportType']['name'], array(
			'controller' => 'transport_types',
		'action' => 'view',
			$transportStopage['TransportType']['id'],
	));
		$row[] = h($transportStopage['TransportStopage']['name']);
		$row[] = h($transportStopage['TransportStopage']['bn_name']);
		$row[] = h($transportStopage['TransportStopage']['address']);
		$row[] = h($transportStopage['TransportStopage']['bn_address']);
		$row[] = h($transportStopage['TransportStopage']['contact']);
		$row[] = h($transportStopage['TransportStopage']['image']);
		$row[] = h($transportStopage['TransportStopage']['email']);
		$row[] = $this->Html->status($transportStopage['TransportStopage']['isactive']);
		$actions = array($this->Croogo->adminRowActions($transportStopage['TransportStopage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportStopage['TransportStopage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportStopage['TransportStopage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportStopage['TransportStopage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportStopage['TransportStopage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
