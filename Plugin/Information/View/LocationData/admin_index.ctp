<?php
$this->viewVars['title_for_layout'] = __d('information', 'Location Data');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Location Data'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('language_id'),
		$this->Paginator->sort('location_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('short_description'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('keyword'),
		$this->Paginator->sort('metatag'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($locationData as $locationData):
		$row = array();
		$row[] = h($locationData['LocationData']['id']);
		$row[] = $this->Html->link($locationData['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$locationData['Language']['id'],
	));
		$row[] = $this->Html->link($locationData['Location']['name'], array(
			'controller' => 'locations',
		'action' => 'view',
			$locationData['Location']['id'],
	));
		$row[] = h($locationData['LocationData']['name']);
		$row[] = h($locationData['LocationData']['short_description']);
		$row[] = h($locationData['LocationData']['details']);
		$row[] = h($locationData['LocationData']['keyword']);
		$row[] = h($locationData['LocationData']['metatag']);
		$actions = array($this->Croogo->adminRowActions($locationData['LocationData']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $locationData['LocationData']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$locationData['LocationData']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$locationData['LocationData']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $locationData['LocationData']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
