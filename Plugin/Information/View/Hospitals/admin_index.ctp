<?php
$this->viewVars['title_for_layout'] = __d('information', 'Hospitals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Hospitals'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('hospital_category_id'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hospitals as $hospital):
		$row = array();
		$row[] = h($hospital['Hospital']['id']);
		$row[] = $this->Html->link($hospital['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$hospital['Point']['id'],
	));
		$row[] = h($hospital['Hospital']['name']);
		$row[] = $this->Html->link($hospital['HospitalCategory']['name'], array(
			'controller' => 'hospital_categories',
		'action' => 'view',
			$hospital['HospitalCategory']['id'],
	));
		$actions = array($this->Croogo->adminRowActions($hospital['Hospital']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hospital['Hospital']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hospital['Hospital']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hospital['Hospital']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hospital['Hospital']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
