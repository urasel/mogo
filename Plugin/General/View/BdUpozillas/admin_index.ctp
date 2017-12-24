<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Upozillas');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Upozillas'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('division_bn'),
		$this->Paginator->sort('division_en'),
		$this->Paginator->sort('bd_division_id'),
		$this->Paginator->sort('district_bn'),
		$this->Paginator->sort('district_en'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('upozilla_bn'),
		$this->Paginator->sort('upozilla_en'),
		$this->Paginator->sort('upozillaid'),
		$this->Paginator->sort('union_bn'),
		$this->Paginator->sort('union_en'),
		$this->Paginator->sort('unionid'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bdUpozillas as $bdUpozilla):
		$row = array();
		$row[] = h($bdUpozilla['BdUpozilla']['id']);
		$row[] = h($bdUpozilla['BdUpozilla']['division_bn']);
		$row[] = h($bdUpozilla['BdUpozilla']['division_en']);
		$row[] = $this->Html->link($bdUpozilla['BdDivision']['name'], array(
			'controller' => 'bd_divisions',
		'action' => 'view',
			$bdUpozilla['BdDivision']['id'],
	));
		$row[] = h($bdUpozilla['BdUpozilla']['district_bn']);
		$row[] = h($bdUpozilla['BdUpozilla']['district_en']);
		$row[] = $this->Html->link($bdUpozilla['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$bdUpozilla['BdDistrict']['id'],
	));
		$row[] = h($bdUpozilla['BdUpozilla']['upozilla_bn']);
		$row[] = h($bdUpozilla['BdUpozilla']['upozilla_en']);
		$row[] = h($bdUpozilla['BdUpozilla']['upozillaid']);
		$row[] = h($bdUpozilla['BdUpozilla']['union_bn']);
		$row[] = h($bdUpozilla['BdUpozilla']['union_en']);
		$row[] = h($bdUpozilla['BdUpozilla']['unionid']);
		$actions = array($this->Croogo->adminRowActions($bdUpozilla['BdUpozilla']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bdUpozilla['BdUpozilla']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bdUpozilla['BdUpozilla']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bdUpozilla['BdUpozilla']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bdUpozilla['BdUpozilla']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
