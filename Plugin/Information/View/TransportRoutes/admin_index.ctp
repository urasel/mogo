<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Routes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Routes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_service_id'),
		$this->Paginator->sort('transport_class_id'),
		$this->Paginator->sort('route_fromid'),
		$this->Paginator->sort('route_toid'),
		$this->Paginator->sort('route_details'),
		$this->Paginator->sort('departure_time'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportRoutes as $transportRoute):
		$row = array();
		$row[] = h($transportRoute['TransportRoute']['id']);
		$row[] = $this->Html->link($transportRoute['TransportService']['name'], array(
			'controller' => 'transport_services',
		'action' => 'view',
			$transportRoute['TransportService']['id'],
	));
		$row[] = $this->Html->link($transportRoute['TransportClass']['name'], array(
			'controller' => 'transport_classes',
		'action' => 'view',
			$transportRoute['TransportClass']['id'],
	));
		$row[] = h($transportRoute['RouteFrom']['name']);
		$row[] = h($transportRoute['RouteTo']['name']);
		$row[] = h($transportRoute['TransportRoute']['route_details']);
		$row[] = h($transportRoute['TransportRoute']['departure_time']);
		$actions = array($this->Croogo->adminRowActions($transportRoute['TransportRoute']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportRoute['TransportRoute']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportRoute['TransportRoute']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportRoute['TransportRoute']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportRoute['TransportRoute']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
