<?php
$this->viewVars['title_for_layout'] = __d('information', 'Update Informations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Update Informations'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('itemid'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('classname'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('verifiedby'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($updateInformations as $updateInformation):
		$row = array();
		$row[] = h($updateInformation['UpdateInformation']['id']);
		$row[] = h($updateInformation['UpdateInformation']['itemid']);
		$row[] = $this->Html->link($updateInformation['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$updateInformation['User']['id'],
	));
		$row[] = h($updateInformation['UpdateInformation']['classname']);
		$row[] = $this->Time->format($updateInformation['UpdateInformation']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = h($updateInformation['UpdateInformation']['verifiedby']);
		$row[] = $this->Html->status($updateInformation['UpdateInformation']['isactive']);
		$actions = array($this->Croogo->adminRowActions($updateInformation['UpdateInformation']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $updateInformation['UpdateInformation']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$updateInformation['UpdateInformation']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$updateInformation['UpdateInformation']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $updateInformation['UpdateInformation']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
