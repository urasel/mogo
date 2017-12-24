<?php
$this->viewVars['title_for_layout'] = __d('information', 'Topics');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Topics'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('popular'),
		$this->Paginator->sort('active'),
		$this->Paginator->sort('verifiedby'),
		$this->Paginator->sort('reviewedby'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($topics as $topic):
		$row = array();
		$row[] = h($topic['Topic']['id']);
		$row[] = $this->Html->link($topic['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$topic['User']['id'],
	));
		$row[] = $this->Html->link($topic['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$topic['Point']['id'],
	));
		$row[] = h($topic['Topic']['image']);
		$row[] = $this->Time->format($topic['Topic']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($topic['Topic']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($topic['Topic']['popular']);
		$row[] = $this->Html->status($topic['Topic']['active']);
		$row[] = h($topic['Topic']['verifiedby']);
		$row[] = h($topic['Topic']['reviewedby']);
		$actions = array($this->Croogo->adminRowActions($topic['Topic']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $topic['Topic']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$topic['Topic']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$topic['Topic']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $topic['Topic']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
