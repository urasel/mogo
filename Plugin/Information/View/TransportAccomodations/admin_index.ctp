<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Accomodations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Accomodations'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_route_id'),
		$this->Paginator->sort('transport_class_id'),
		$this->Paginator->sort('transport_service_id'),
		$this->Paginator->sort('fare'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportAccomodations as $transportAccomodation):
		$row = array();
		$row[] = h($transportAccomodation['TransportAccomodation']['id']);
		$row[] = $this->Html->link($transportAccomodation['TransportRoute']['name'], array(
			'controller' => 'transport_routes',
		'action' => 'view',
			$transportAccomodation['TransportRoute']['id'],
	));
		$row[] = $this->Html->link($transportAccomodation['TransportClass']['name'], array(
			'controller' => 'transport_classes',
		'action' => 'view',
			$transportAccomodation['TransportClass']['id'],
	));
		$row[] = $this->Html->link($transportAccomodation['TransportService']['name'], array(
			'controller' => 'transport_services',
		'action' => 'view',
			$transportAccomodation['TransportService']['id'],
	));
		$row[] = h($transportAccomodation['TransportAccomodation']['fare']);
		$row[] = $this->Html->status($transportAccomodation['TransportAccomodation']['isactive']);
		$actions = array($this->Croogo->adminRowActions($transportAccomodation['TransportAccomodation']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportAccomodation['TransportAccomodation']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportAccomodation['TransportAccomodation']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportAccomodation['TransportAccomodation']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportAccomodation['TransportAccomodation']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
