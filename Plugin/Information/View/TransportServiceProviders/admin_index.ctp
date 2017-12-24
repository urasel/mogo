<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Service Providers');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Service Providers'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_type_id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('head_office'),
		$this->Paginator->sort('bn_head_office'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('bn_address'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('logo'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportServiceProviders as $transportServiceProvider):
		$row = array();
		$row[] = h($transportServiceProvider['TransportServiceProvider']['id']);
		$row[] = $this->Html->link($transportServiceProvider['TransportType']['name'], array(
			'controller' => 'transport_types',
		'action' => 'view',
			$transportServiceProvider['TransportType']['id'],
	));
		$row[] = $this->Html->link($transportServiceProvider['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$transportServiceProvider['Point']['id'],
	));
		$row[] = $this->Html->link($transportServiceProvider['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$transportServiceProvider['PlaceType']['id'],
	));
		$row[] = h($transportServiceProvider['TransportServiceProvider']['name']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['bn_name']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['head_office']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['bn_head_office']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['address']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['bn_address']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['mobile']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['email']);
		$row[] = h($transportServiceProvider['TransportServiceProvider']['logo']);
		$row[] = $this->Html->status($transportServiceProvider['TransportServiceProvider']['isactive']);
		$actions = array($this->Croogo->adminRowActions($transportServiceProvider['TransportServiceProvider']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportServiceProvider['TransportServiceProvider']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportServiceProvider['TransportServiceProvider']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportServiceProvider['TransportServiceProvider']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportServiceProvider['TransportServiceProvider']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
