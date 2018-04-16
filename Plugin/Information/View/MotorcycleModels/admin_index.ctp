<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycle Models');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycle Models'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($motorcycleModels as $motorcycleModel):
		$row = array();
		$row[] = h($motorcycleModel['MotorcycleModel']['id']);
		$row[] = $this->Html->link($motorcycleModel['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$motorcycleModel['PlaceType']['id'],
	));
		$row[] = h($motorcycleModel['MotorcycleModel']['name']);
		$row[] = $this->Html->status($motorcycleModel['MotorcycleModel']['isactive']);
		$actions = array($this->Croogo->adminRowActions($motorcycleModel['MotorcycleModel']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $motorcycleModel['MotorcycleModel']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$motorcycleModel['MotorcycleModel']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$motorcycleModel['MotorcycleModel']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $motorcycleModel['MotorcycleModel']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
