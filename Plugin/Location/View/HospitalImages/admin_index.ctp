<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hospital Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hospital Images'), array('action' => 'index'));

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
	foreach ($hospitalImages as $hospitalImage):
		$row = array();
		$row[] = h($hospitalImage['HospitalImage']['id']);
		$row[] = $this->Html->link($hospitalImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$hospitalImage['Point']['id'],
	));
		$row[] = h($hospitalImage['HospitalImage']['file']);
		$row[] = h($hospitalImage['HospitalImage']['position']);
		$actions = array($this->Croogo->adminRowActions($hospitalImage['HospitalImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hospitalImage['HospitalImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hospitalImage['HospitalImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hospitalImage['HospitalImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hospitalImage['HospitalImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
