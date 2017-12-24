<?php
$this->viewVars['title_for_layout'] = __d('information', 'Prizes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Prizes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('description'),
		$this->Paginator->sort('logo'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($prizes as $prize):
		$row = array();
		$row[] = h($prize['Prize']['id']);
		$row[] = $this->Html->link($prize['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$prize['Point']['id'],
	));
		$row[] = h($prize['Prize']['name']);
		$row[] = h($prize['Prize']['bn_name']);
		$row[] = h($prize['Prize']['description']);
		$row[] = h($prize['Prize']['logo']);
		$actions = array($this->Croogo->adminRowActions($prize['Prize']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $prize['Prize']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$prize['Prize']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$prize['Prize']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $prize['Prize']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
