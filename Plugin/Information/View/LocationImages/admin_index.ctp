<?php
$this->viewVars['title_for_layout'] = __d('information', 'Location Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Location Images'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('file'),
		$this->Paginator->sort('position'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($locationImages as $locationImage):
		$row = array();
		$row[] = h($locationImage['LocationImage']['id']);
		$row[] = $this->Html->link($locationImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$locationImage['Point']['id'],
	));
		$row[] = h($locationImage['LocationImage']['file']);
		$row[] = h($locationImage['LocationImage']['position']);
		$actions = array($this->Croogo->adminRowActions($locationImage['LocationImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $locationImage['LocationImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$locationImage['LocationImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$locationImage['LocationImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $locationImage['LocationImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
