<?php
$this->viewVars['title_for_layout'] = __d('information', 'Subscriber Lists');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Subscriber Lists'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('sex_id'),
		$this->Paginator->sort('dob'),
		$this->Paginator->sort('isactive'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($subscriberLists as $subscriberList):
		$row = array();
		$row[] = h($subscriberList['SubscriberList']['id']);
		$row[] = h($subscriberList['SubscriberList']['name']);
		$row[] = h($subscriberList['SubscriberList']['email']);
		$row[] = $this->Html->link($subscriberList['Sex']['name'], array(
			'controller' => 'sexes',
		'action' => 'view',
			$subscriberList['Sex']['id'],
	));
		$row[] = h($subscriberList['SubscriberList']['dob']);
		$row[] = $this->Html->status($subscriberList['SubscriberList']['isactive']);
		$row[] = $this->Time->format($subscriberList['SubscriberList']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($subscriberList['SubscriberList']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($subscriberList['SubscriberList']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $subscriberList['SubscriberList']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$subscriberList['SubscriberList']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$subscriberList['SubscriberList']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $subscriberList['SubscriberList']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
