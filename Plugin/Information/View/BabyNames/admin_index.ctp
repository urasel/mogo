<?php
$this->viewVars['title_for_layout'] = __d('information', 'Baby Names');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Baby Names'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('arabic'),
		$this->Paginator->sort('meaning'),
		$this->Paginator->sort('sex_id'),
		$this->Paginator->sort('tags'),
		$this->Paginator->sort('origin'),
		$this->Paginator->sort('likes'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($babyNames as $babyName):
		$row = array();
		$row[] = h($babyName['BabyName']['id']);
		$row[] = $this->Html->link($babyName['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$babyName['PlaceType']['id'],
	));
		$row[] = h($babyName['BabyName']['name']);
		$row[] = h($babyName['BabyName']['bn_name']);
		$row[] = h($babyName['BabyName']['arabic']);
		$row[] = h($babyName['BabyName']['meaning']);
		$row[] = $this->Html->link($babyName['Sex']['name'], array(
			'controller' => 'sexes',
		'action' => 'view',
			$babyName['Sex']['id'],
	));
		$row[] = h($babyName['BabyName']['tags']);
		$row[] = h($babyName['BabyName']['origin']);
		$row[] = h($babyName['BabyName']['likes']);
		$row[] = $this->Time->format($babyName['BabyName']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($babyName['BabyName']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($babyName['BabyName']['isactive']);
		$actions = array($this->Croogo->adminRowActions($babyName['BabyName']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $babyName['BabyName']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$babyName['BabyName']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$babyName['BabyName']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $babyName['BabyName']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
