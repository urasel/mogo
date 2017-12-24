<?php
$this->viewVars['title_for_layout'] = __d('information', 'Locations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Locations'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		$this->Paginator->sort('address'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($locations as $location):
		$row = array();
		$row[] = h($location['Location']['id']);
		$row[] = h($location['Location']['name']);
		$row[] = h($location['Location']['lat']);
		$row[] = h($location['Location']['lng']);
		$row[] = h($location['Location']['address']);
		$actions = array($this->Croogo->adminRowActions($location['Location']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $location['Location']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'controller' => 'points',
			'action' => 'locationedit',
			$location['Point']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$location['Location']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $location['Location']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
