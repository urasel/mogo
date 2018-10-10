<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recent Posts');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recent Posts'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
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
	foreach ($recentPosts as $recentPost):
		$row = array();
		$row[] = h($recentPost['RecentPost']['id']);
		$row[] = h($recentPost['RecentPost']['pointid']);
		$row[] = h($recentPost['RecentPost']['class_bntitle']);
		$row[] = h($recentPost['RecentPost']['class_title']);
		$row[] = h($recentPost['RecentPost']['placetype_pluralname']);
		$row[] = $this->Time->format($recentPost['RecentPost']['publishdate'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($recentPost['RecentPost']['unpublishdate'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($recentPost['RecentPost']['isactive']);
		$actions = array($this->Croogo->adminRowActions($recentPost['RecentPost']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $recentPost['RecentPost']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$recentPost['RecentPost']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$recentPost['RecentPost']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $recentPost['RecentPost']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
