<?php
$this->viewVars['title_for_layout'] = __d('general', 'Zones');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Zones'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('code'),
		$this->Paginator->sort('status'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($zones as $zone):
		$row = array();
		$row[] = h($zone['Zone']['id']);
		$row[] = $this->Html->link($zone['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$zone['Country']['id'],
	));
		$row[] = h($zone['Zone']['name']);
		$row[] = h($zone['Zone']['code']);
		$row[] = $this->Html->status($zone['Zone']['status']);
		$actions = array($this->Croogo->adminRowActions($zone['Zone']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $zone['Zone']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$zone['Zone']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$zone['Zone']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $zone['Zone']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
