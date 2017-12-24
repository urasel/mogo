<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood Donars');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood Donars'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('blood_group_id'),
		$this->Paginator->sort('sex_id'),
		$this->Paginator->sort('date_of_birth'),
		$this->Paginator->sort('mobile_number'),
		$this->Paginator->sort('availability_status'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bloodDonars as $bloodDonar):
		$row = array();
		$row[] = h($bloodDonar['BloodDonar']['id']);
		$row[] = $this->Html->link($bloodDonar['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$bloodDonar['User']['id'],
	));
		$row[] = h($bloodDonar['BloodDonar']['name']);
		$row[] = $this->Html->link($bloodDonar['BloodGroup']['name'], array(
			'controller' => 'blood_groups',
		'action' => 'view',
			$bloodDonar['BloodGroup']['id'],
	));
		$row[] = $this->Html->link($bloodDonar['Sex']['name'], array(
			'controller' => 'sexes',
		'action' => 'view',
			$bloodDonar['Sex']['id'],
	));
		$row[] = h($bloodDonar['BloodDonar']['date_of_birth']);
		$row[] = h($bloodDonar['BloodDonar']['mobile_number']);
		$row[] = h($bloodDonar['BloodDonar']['availability_status']);
		$actions = array($this->Croogo->adminRowActions($bloodDonar['BloodDonar']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bloodDonar['BloodDonar']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bloodDonar['BloodDonar']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bloodDonar['BloodDonar']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bloodDonar['BloodDonar']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
