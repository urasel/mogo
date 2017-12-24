<?php
$this->viewVars['title_for_layout'] = __d('information', 'Place Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Place Images'), array('action' => 'index'));

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
	foreach ($placeImages as $placeImage):
		$row = array();
		$row[] = h($placeImage['PlaceImage']['id']);
		$row[] = $this->Html->link($placeImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$placeImage['Point']['id'],
	));
		$row[] = h($placeImage['PlaceImage']['file']);
		$row[] = h($placeImage['PlaceImage']['position']);
		$actions = array($this->Croogo->adminRowActions($placeImage['PlaceImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $placeImage['PlaceImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$placeImage['PlaceImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$placeImage['PlaceImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $placeImage['PlaceImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
