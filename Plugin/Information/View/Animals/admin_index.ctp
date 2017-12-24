<?php
$this->viewVars['title_for_layout'] = __d('information', 'Animals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Animals'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('species'),
		$this->Paginator->sort('genus'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($animals as $animal):
		$row = array();
		$row[] = h($animal['Animal']['id']);
		$row[] = h($animal['Animal']['name']);
		$row[] = h($animal['Animal']['bn_name']);
		$row[] = h($animal['Animal']['species']);
		$row[] = h($animal['Animal']['genus']);
		$row[] = $this->Html->status($animal['Animal']['isactive']);
		$actions = array($this->Croogo->adminRowActions($animal['Animal']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $animal['Animal']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$animal['Animal']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$animal['Animal']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $animal['Animal']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
