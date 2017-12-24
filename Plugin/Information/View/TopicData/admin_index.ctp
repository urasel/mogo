<?php
$this->viewVars['title_for_layout'] = __d('information', 'Topic Data');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Topic Data'), array('action' => 'index'));

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
	foreach ($topicData as $topicData):
		$row = array();
		$row[] = h($topicData['TopicData']['id']);
		$row[] = $this->Html->link($topicData['Language']['title'], array(
			'controller' => 'languages',
		'action' => 'view',
			$topicData['Language']['id'],
	));
		$row[] = $this->Html->link($topicData['Topic']['id'], array(
			'controller' => 'topics',
		'action' => 'view',
			$topicData['Topic']['id'],
	));
		$row[] = h($topicData['TopicData']['name']);
		$row[] = h($topicData['TopicData']['short_description']);
		$row[] = h($topicData['TopicData']['details']);
		$row[] = h($topicData['TopicData']['keyword']);
		$row[] = h($topicData['TopicData']['metatag']);
		$actions = array($this->Croogo->adminRowActions($topicData['TopicData']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $topicData['TopicData']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$topicData['TopicData']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$topicData['TopicData']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $topicData['TopicData']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
