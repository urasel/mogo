<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood News');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood News'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('blood_group_id'),
		$this->Paginator->sort('required_date'),
		$this->Paginator->sort('quantity'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bloodNews as $bloodNews):
		$row = array();
		$row[] = h($bloodNews['BloodNews']['id']);
		$row[] = $this->Html->link($bloodNews['BloodGroup']['name'], array(
			'controller' => 'blood_groups',
		'action' => 'view',
			$bloodNews['BloodGroup']['id'],
	));
		$row[] = h($bloodNews['BloodNews']['required_date']);
		$row[] = h($bloodNews['BloodNews']['quantity']);
		$row[] = h($bloodNews['BloodNews']['mobile']);
		$row[] = $this->Time->format($bloodNews['BloodNews']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($bloodNews['BloodNews']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->link($bloodNews['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$bloodNews['User']['id'],
	));
		$row[] = $this->Html->status($bloodNews['BloodNews']['isactive']);
		$actions = array($this->Croogo->adminRowActions($bloodNews['BloodNews']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bloodNews['BloodNews']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bloodNews['BloodNews']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bloodNews['BloodNews']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bloodNews['BloodNews']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
