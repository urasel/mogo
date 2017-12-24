<?php
$this->viewVars['title_for_layout'] = __d('location', 'Place Datas');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Place Datas'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('language_id'),
		$this->Paginator->sort('topic_id'),
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
	foreach ($placeDatas as $placeData):
		$row = array();
		$row[] = h($placeData['PlaceData']['id']);
		$row[] = $this->Html->link($placeData['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$placeData['Language']['id'],
	));
		$row[] = $this->Html->link($placeData['Topic']['id'], array(
			'controller' => 'topics',
		'action' => 'view',
			$placeData['Topic']['id'],
	));
		$row[] = h($placeData['PlaceData']['name']);
		$row[] = h($placeData['PlaceData']['short_description']);
		$row[] = h($placeData['PlaceData']['details']);
		$row[] = h($placeData['PlaceData']['keyword']);
		$row[] = h($placeData['PlaceData']['metatag']);
		$actions = array($this->Croogo->adminRowActions($placeData['PlaceData']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $placeData['PlaceData']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$placeData['PlaceData']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$placeData['PlaceData']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $placeData['PlaceData']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
