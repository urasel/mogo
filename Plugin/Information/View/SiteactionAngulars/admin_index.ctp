<?php
$this->viewVars['title_for_layout'] = __d('information', 'Siteactions');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Siteactions'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('action'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($siteactions as $siteaction):
		$row = array();
		$row[] = h($siteaction['Siteaction']['id']);
		$row[] = h($siteaction['Siteaction']['name']);
		$row[] = h($siteaction['Siteaction']['action']);
		$actions = array($this->Croogo->adminRowActions($siteaction['Siteaction']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $siteaction['Siteaction']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$siteaction['Siteaction']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$siteaction['Siteaction']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $siteaction['Siteaction']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
