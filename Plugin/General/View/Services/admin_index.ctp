<?php
$this->viewVars['title_for_layout'] = __d('general', 'Services');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Services'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('order'),
		$this->Paginator->sort('isactive'),
		$this->Paginator->sort('created'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($services as $service):
		$row = array();
		$row[] = h($service['Service']['id']);
		$row[] = h($service['Service']['name']);
		$row[] = h($service['Service']['order']);
		$row[] = $this->Html->status($service['Service']['isactive']);
		$row[] = $this->Time->format($service['Service']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($service['Service']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $service['Service']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$service['Service']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$service['Service']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $service['Service']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
