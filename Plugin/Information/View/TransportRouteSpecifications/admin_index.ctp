<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Route Specifications');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Route Specifications'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('seo_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportRouteSpecifications as $transportRouteSpecification):
		$row = array();
		$row[] = h($transportRouteSpecification['TransportRouteSpecification']['id']);
		$row[] = $this->Html->link($transportRouteSpecification['TransportType']['name'], array(
			'controller' => 'transport_types',
		'action' => 'view',
			$transportRouteSpecification['TransportType']['id'],
	));
		$row[] = h($transportRouteSpecification['TransportRouteSpecification']['name']);
		$row[] = h($transportRouteSpecification['TransportRouteSpecification']['bn_name']);
		$row[] = h($transportRouteSpecification['TransportRouteSpecification']['seo_name']);
		$actions = array($this->Croogo->adminRowActions($transportRouteSpecification['TransportRouteSpecification']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportRouteSpecification['TransportRouteSpecification']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportRouteSpecification['TransportRouteSpecification']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportRouteSpecification['TransportRouteSpecification']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportRouteSpecification['TransportRouteSpecification']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
