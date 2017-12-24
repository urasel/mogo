<?php
$this->viewVars['title_for_layout'] = __d('information', 'Home Posts');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Home Posts'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('home_category_id'),
		$this->Paginator->sort('pointid'),
		$this->Paginator->sort('class_bntitle'),
		$this->Paginator->sort('class_title'),
		$this->Paginator->sort('placetype_pluralname'),
		$this->Paginator->sort('publishdate'),
		$this->Paginator->sort('unpublishdate'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($homePosts as $homePost):
		$row = array();
		$row[] = h($homePost['HomePost']['id']);
		$row[] = $this->Html->link($homePost['HomeCategory']['title'], array(
			'controller' => 'home_categories',
		'action' => 'view',
			$homePost['HomeCategory']['id'],
	));
		$row[] = h($homePost['HomePost']['pointid']);
		$row[] = h($homePost['HomePost']['class_bntitle']);
		$row[] = h($homePost['HomePost']['class_title']);
		$row[] = h($homePost['HomePost']['placetype_pluralname']);
		$row[] = $this->Time->format($homePost['HomePost']['publishdate'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($homePost['HomePost']['unpublishdate'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($homePost['HomePost']['isactive']);
		$actions = array($this->Croogo->adminRowActions($homePost['HomePost']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $homePost['HomePost']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$homePost['HomePost']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$homePost['HomePost']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $homePost['HomePost']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
