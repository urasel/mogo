<?php
$this->viewVars['title_for_layout'] = __d('location', 'Institute Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Institute Images'), array('action' => 'index'));

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
	foreach ($instituteImages as $instituteImage):
		$row = array();
		$row[] = h($instituteImage['InstituteImage']['id']);
		$row[] = $this->Html->link($instituteImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$instituteImage['Point']['id'],
	));
		$row[] = h($instituteImage['InstituteImage']['file']);
		$row[] = h($instituteImage['InstituteImage']['position']);
		$actions = array($this->Croogo->adminRowActions($instituteImage['InstituteImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $instituteImage['InstituteImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$instituteImage['InstituteImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$instituteImage['InstituteImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $instituteImage['InstituteImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
