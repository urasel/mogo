<?php
$this->viewVars['title_for_layout'] = __d('information', 'Point Groups');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Point Groups'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('parent'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('seo_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($pointGroups as $pointGroup):
		$row = array();
		$row[] = h($pointGroup['PointGroup']['id']);
		$row[] = h($pointGroup['PointGroup']['parent']);
		$row[] = $this->Html->link($pointGroup['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$pointGroup['PlaceType']['id'],
	));
		$row[] = h($pointGroup['PointGroup']['name']);
		$row[] = h($pointGroup['PointGroup']['bn_name']);
		$row[] = h($pointGroup['PointGroup']['seo_name']);
		$actions = array($this->Croogo->adminRowActions($pointGroup['PointGroup']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $pointGroup['PointGroup']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$pointGroup['PointGroup']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$pointGroup['PointGroup']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $pointGroup['PointGroup']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
