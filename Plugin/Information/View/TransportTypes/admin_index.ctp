<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Types'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('isactive'),
		$this->Paginator->sort('icon'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportTypes as $transportType):
		$row = array();
		$row[] = h($transportType['TransportType']['id']);
		$row[] = h($transportType['TransportType']['name']);
		$row[] = h($transportType['TransportType']['bn_name']);
		$row[] = $this->Html->status($transportType['TransportType']['isactive']);
		$row[] = h($transportType['TransportType']['icon']);
		$actions = array($this->Croogo->adminRowActions($transportType['TransportType']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportType['TransportType']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportType['TransportType']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportType['TransportType']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportType['TransportType']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
