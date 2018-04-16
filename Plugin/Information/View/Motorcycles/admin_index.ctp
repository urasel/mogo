<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycles');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycles'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('engine'),
		$this->Paginator->sort('maximum_power'),
		$this->Paginator->sort('maximum_torque'),
		$this->Paginator->sort('top_speed'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($motorcycles as $motorcycle):
		$row = array();
		$row[] = h($motorcycle['Motorcycle']['id']);
		$row[] = h($motorcycle['Motorcycle']['name']);
		$row[] = h($motorcycle['Motorcycle']['seo_name']);
		$row[] = $this->Html->link($motorcycle['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$motorcycle['PlaceType']['id'],
	));
		$row[] = h($motorcycle['Motorcycle']['engine']);
		$row[] = h($motorcycle['Motorcycle']['maximum_power']);
		$row[] = h($motorcycle['Motorcycle']['maximum_torque']);
		$row[] = $this->Html->status($motorcycle['Motorcycle']['isactive']);
		$actions = array($this->Croogo->adminRowActions($motorcycle['Motorcycle']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $motorcycle['Motorcycle']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$motorcycle['Motorcycle']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$motorcycle['Motorcycle']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $motorcycle['Motorcycle']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
