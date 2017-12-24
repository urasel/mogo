<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Divisions');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Divisions'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bdDivisions as $bdDivision):
		$row = array();
		$row[] = h($bdDivision['BdDivision']['id']);
		$row[] = h($bdDivision['BdDivision']['name']);
		$row[] = h($bdDivision['BdDivision']['bn_name']);
		$row[] = $this->Html->status($bdDivision['BdDivision']['isactive']);
		$actions = array($this->Croogo->adminRowActions($bdDivision['BdDivision']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bdDivision['BdDivision']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bdDivision['BdDivision']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bdDivision['BdDivision']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bdDivision['BdDivision']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
