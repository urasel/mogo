<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Districts');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Districts'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('bd_division_id'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bdDistricts as $bdDistrict):
		$row = array();
		$row[] = h($bdDistrict['BdDistrict']['id']);
		$row[] = h($bdDistrict['BdDistrict']['name']);
		$row[] = h($bdDistrict['BdDistrict']['bn_name']);
		$row[] = $this->Html->link($bdDistrict['BdDivision']['name'], array(
			'controller' => 'bd_divisions',
		'action' => 'view',
			$bdDistrict['BdDivision']['id'],
	));
		$row[] = $this->Html->status($bdDistrict['BdDistrict']['isactive']);
		$actions = array($this->Croogo->adminRowActions($bdDistrict['BdDistrict']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bdDistrict['BdDistrict']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bdDistrict['BdDistrict']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bdDistrict['BdDistrict']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bdDistrict['BdDistrict']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
