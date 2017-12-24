<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Services');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Services'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('contact'),
		$this->Paginator->sort('website'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportServices as $transportService):
		$row = array();
		$row[] = h($transportService['TransportService']['id']);
		$row[] = $this->Html->link($transportService['TransportType']['name'], array(
			'controller' => 'transport_types',
		'action' => 'view',
			$transportService['TransportType']['id'],
	));
		$row[] = h($transportService['TransportService']['name']);
		$row[] = h($transportService['TransportService']['contact']);
		$row[] = h($transportService['TransportService']['website']);
		$row[] = h($transportService['TransportService']['email']);
		$row[] = $this->Html->status($transportService['TransportService']['isactive']);
		$actions = array($this->Croogo->adminRowActions($transportService['TransportService']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportService['TransportService']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportService['TransportService']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportService['TransportService']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportService['TransportService']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
