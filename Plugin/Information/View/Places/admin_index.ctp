<?php
$this->viewVars['title_for_layout'] = __d('information', 'Places');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Places'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('fax'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('active'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($places as $place):
		$row = array();
		$row[] = h($place['Place']['id']);
		$row[] = $this->Html->link($place['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$place['User']['id'],
	));
		$row[] = $this->Html->link($place['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$place['Point']['id'],
	));
		$row[] = h($place['Place']['name']);
		$row[] = h($place['Place']['mobile']);
		$row[] = h($place['Place']['fax']);
		$row[] = h($place['Place']['email']);
		$row[] = $this->Time->format($place['Place']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($place['Place']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($place['Place']['active']);
		$actions = array($this->Croogo->adminRowActions($place['Place']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $place['Place']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$place['Place']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$place['Place']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $place['Place']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
