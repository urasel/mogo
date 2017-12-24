<?php
$this->viewVars['title_for_layout'] = __d('information', 'Stadia');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Stadia'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('tenant_or_use'),
		$this->Paginator->sort('city'),
		$this->Paginator->sort('name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($stadia as $stadium):
		$row = array();
		$row[] = h($stadium['Stadium']['id']);
		$row[] = $this->Html->link($stadium['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$stadium['Country']['id'],
	));
		$row[] = h($stadium['Stadium']['tenant_or_use']);
		$row[] = h($stadium['Stadium']['city']);
		$row[] = h($stadium['Stadium']['name']);
		$actions = array($this->Croogo->adminRowActions($stadium['Stadium']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $stadium['Stadium']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$stadium['Stadium']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$stadium['Stadium']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $stadium['Stadium']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
