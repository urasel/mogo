<?php
$this->viewVars['title_for_layout'] = __d('general', 'Continents');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Continents'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('name'),
		$this->Paginator->sort('title'),
		$this->Paginator->sort('area'),
		$this->Paginator->sort('population'),
		$this->Paginator->sort('countries'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($continents as $continent):
		$row = array();
		$row[] = h($continent['Continent']['name']);
		$row[] = h($continent['Continent']['title']);
		$row[] = h($continent['Continent']['area']);
		$row[] = h($continent['Continent']['population']);
		$row[] = h($continent['Continent']['countries']);
		$actions = array($this->Croogo->adminRowActions($continent['Continent']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $continent['Continent']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$continent['Continent']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$continent['Continent']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $continent['Continent']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
