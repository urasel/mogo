<?php
$this->viewVars['title_for_layout'] = __d('information', 'Stadium Data');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Stadium Data'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('language_id'),
		$this->Paginator->sort('stadium_id'),
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
	foreach ($stadiumData as $stadiumData):
		$row = array();
		$row[] = h($stadiumData['StadiumData']['id']);
		$row[] = $this->Html->link($stadiumData['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$stadiumData['Language']['id'],
	));
		$row[] = $this->Html->link($stadiumData['Stadium']['name'], array(
			'controller' => 'stadia',
		'action' => 'view',
			$stadiumData['Stadium']['id'],
	));
		$row[] = h($stadiumData['StadiumData']['name']);
		$row[] = h($stadiumData['StadiumData']['short_description']);
		$row[] = h($stadiumData['StadiumData']['details']);
		$row[] = h($stadiumData['StadiumData']['keyword']);
		$row[] = h($stadiumData['StadiumData']['metatag']);
		$actions = array($this->Croogo->adminRowActions($stadiumData['StadiumData']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $stadiumData['StadiumData']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$stadiumData['StadiumData']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$stadiumData['StadiumData']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $stadiumData['StadiumData']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
