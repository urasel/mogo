<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Classes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Classes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportClasses as $transportClass):
		$row = array();
		$row[] = h($transportClass['TransportClass']['id']);
		$row[] = $this->Html->link($transportClass['TransportType']['name'], array(
			'controller' => 'transport_types',
		'action' => 'view',
			$transportClass['TransportType']['id'],
	));
		$row[] = h($transportClass['TransportClass']['name']);
		$row[] = h($transportClass['TransportClass']['bn_name']);
		$actions = array($this->Croogo->adminRowActions($transportClass['TransportClass']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportClass['TransportClass']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportClass['TransportClass']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportClass['TransportClass']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportClass['TransportClass']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
