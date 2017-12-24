<?php
$this->viewVars['title_for_layout'] = __d('information', 'Home Categories');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Home Categories'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('title'),
		$this->Paginator->sort('bn_title'),
		$this->Paginator->sort('isActive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($homeCategories as $homeCategory):
		$row = array();
		$row[] = h($homeCategory['HomeCategory']['id']);
		$row[] = h($homeCategory['HomeCategory']['title']);
		$row[] = h($homeCategory['HomeCategory']['bn_title']);
		$row[] = $this->Html->status($homeCategory['HomeCategory']['isActive']);
		$actions = array($this->Croogo->adminRowActions($homeCategory['HomeCategory']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $homeCategory['HomeCategory']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$homeCategory['HomeCategory']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$homeCategory['HomeCategory']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $homeCategory['HomeCategory']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
