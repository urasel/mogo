<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('totalvisit'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('active'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($points as $point):
		$row = array();
		if(strlen($point['Point']['name']) > 50){
		$pointName = mb_substr($point['Point']['name'], 0, 50).' ..';
		}else{
		$pointName = mb_substr($point['Point']['name'], 0, 50);
		}
		$row[] = h($point['Point']['id']);
		$row[] = h($pointName);
		$row[] = $this->Html->link($point['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$point['PlaceType']['id'],
	));
		$row[] = h($point['Point']['totalvisit']);
		$row[] = h($point['Point']['updated']);
		$row[] = $this->Html->status($point['Point']['active']);
		$actions = array($this->Croogo->adminRowActions($point['Point']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $point['Point']['id']
	), array(
			'icon' => 'eye-open',
		));
		if($point['PlaceType']['singlename'] == 'topicData'){
			$actions[] = $this->Croogo->adminRowAction('', array(
				'action' => 'topicedit',
				$point['Point']['id'],
			), array(
				'icon' => 'pencil',
			));
		}else{
			$actions[] = $this->Croogo->adminRowAction('', array(
				'action' => $point['PlaceType']['singlename'].'edit',
				$point['Point']['id'],
			), array(
				'icon' => 'pencil',
			));
		}  
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$point['Point']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $point['Point']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
