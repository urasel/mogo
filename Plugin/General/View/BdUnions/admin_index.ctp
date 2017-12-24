<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Unions');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Unions'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('bd_division_id'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('bd_thanas_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bdUnions as $bdUnion):
		$row = array();
		$row[] = h($bdUnion['BdUnion']['id']);
		$row[] = $this->Html->link($bdUnion['BdDivision']['name'], array(
			'controller' => 'bd_divisions',
		'action' => 'view',
			$bdUnion['BdDivision']['id'],
	));
		$row[] = $this->Html->link($bdUnion['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$bdUnion['BdDistrict']['id'],
	));
		$row[] = $this->Html->link($bdUnion['BdThanas']['name'], array(
			'controller' => 'bd_thanas',
		'action' => 'view',
			$bdUnion['BdThanas']['id'],
	));
		$row[] = h($bdUnion['BdUnion']['name']);
		$row[] = h($bdUnion['BdUnion']['bn_name']);
		$actions = array($this->Croogo->adminRowActions($bdUnion['BdUnion']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bdUnion['BdUnion']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bdUnion['BdUnion']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bdUnion['BdUnion']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bdUnion['BdUnion']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
