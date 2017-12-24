<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Thanas');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Thanas'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bdThanas as $bdThana):
		$row = array();
		$row[] = h($bdThana['BdThana']['id']);
		$row[] = h($bdThana['BdThana']['name']);
		$row[] = h($bdThana['BdThana']['bn_name']);
		$row[] = $this->Html->link($bdThana['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$bdThana['BdDistrict']['id'],
	));
		$row[] = $this->Html->status($bdThana['BdThana']['isactive']);
		$actions = array($this->Croogo->adminRowActions($bdThana['BdThana']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bdThana['BdThana']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bdThana['BdThana']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bdThana['BdThana']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bdThana['BdThana']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
