<?php
$this->viewVars['title_for_layout'] = __d('general', 'Servicelists');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Servicelists'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('service_id'),
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
	foreach ($servicelists as $servicelist):
		$row = array();
		$row[] = h($servicelist['Servicelist']['id']);
		$row[] = $this->Html->link($servicelist['Service']['name'], array(
			'controller' => 'services',
		'action' => 'view',
			$servicelist['Service']['id'],
	));
		$row[] = h($servicelist['Servicelist']['name']);
		$row[] = h($servicelist['Servicelist']['order']);
		$row[] = $this->Html->status($servicelist['Servicelist']['isactive']);
		$row[] = $this->Time->format($servicelist['Servicelist']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($servicelist['Servicelist']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $servicelist['Servicelist']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$servicelist['Servicelist']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$servicelist['Servicelist']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $servicelist['Servicelist']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
