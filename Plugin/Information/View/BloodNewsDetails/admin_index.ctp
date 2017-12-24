<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood News Details');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood News Details'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('language_id'),
		$this->Paginator->sort('blood_news_id'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('address'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bloodNewsDetails as $bloodNewsDetail):
		$row = array();
		$row[] = h($bloodNewsDetail['BloodNewsDetail']['id']);
		$row[] = $this->Html->link($bloodNewsDetail['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$bloodNewsDetail['Language']['id'],
	));
		$row[] = $this->Html->link($bloodNewsDetail['BloodNews']['id'], array(
			'controller' => 'blood_news',
		'action' => 'view',
			$bloodNewsDetail['BloodNews']['id'],
	));
		$row[] = h($bloodNewsDetail['BloodNewsDetail']['details']);
		$row[] = h($bloodNewsDetail['BloodNewsDetail']['address']);
		$actions = array($this->Croogo->adminRowActions($bloodNewsDetail['BloodNewsDetail']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bloodNewsDetail['BloodNewsDetail']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bloodNewsDetail['BloodNewsDetail']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bloodNewsDetail['BloodNewsDetail']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bloodNewsDetail['BloodNewsDetail']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
