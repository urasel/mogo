<?php
$this->viewVars['title_for_layout'] = __d('information', 'Stadium Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Stadium Images'), array('action' => 'index'));

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
	foreach ($stadiumImages as $stadiumImage):
		$row = array();
		$row[] = h($stadiumImage['StadiumImage']['id']);
		$row[] = $this->Html->link($stadiumImage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$stadiumImage['Point']['id'],
	));
		$row[] = h($stadiumImage['StadiumImage']['file']);
		$row[] = h($stadiumImage['StadiumImage']['position']);
		$actions = array($this->Croogo->adminRowActions($stadiumImage['StadiumImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $stadiumImage['StadiumImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$stadiumImage['StadiumImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$stadiumImage['StadiumImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $stadiumImage['StadiumImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
