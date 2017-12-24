<?php
$this->viewVars['title_for_layout'] = __d('location', 'Points');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Points'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('zone_id'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('bd_thanas_id'),
		$this->Paginator->sort('location'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('icon'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('map'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('contact'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		$this->Paginator->sort('private'),
		$this->Paginator->sort('active'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($points as $point):
		$row = array();
		$row[] = h($point['Point']['id']);
		$row[] = h($point['Point']['name']);
		$row[] = h($point['Point']['bn_name']);
		$row[] = h($point['Point']['seo_name']);
		$row[] = $this->Html->link($point['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$point['Country']['id'],
	));
		$row[] = $this->Html->link($point['Zone']['name'], array(
			'controller' => 'zones',
		'action' => 'view',
			$point['Zone']['id'],
	));
		$row[] = $this->Html->link($point['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$point['BdDistrict']['id'],
	));
		$row[] = $this->Html->link($point['BdThanas']['name'], array(
			'controller' => 'bd_thanas',
		'action' => 'view',
			$point['BdThanas']['id'],
	));
		$row[] = h($point['Point']['location']);
		$row[] = h($point['Point']['address']);
		$row[] = h($point['Point']['icon']);
		$row[] = h($point['Point']['image']);
		$row[] = h($point['Point']['map']);
		$row[] = $this->Html->link($point['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$point['PlaceType']['id'],
	));
		$row[] = h($point['Point']['contact']);
		$row[] = h($point['Point']['email']);
		$row[] = h($point['Point']['lat']);
		$row[] = h($point['Point']['lng']);
		$row[] = $this->Html->status($point['Point']['private']);
		$row[] = $this->Html->status($point['Point']['active']);
		$row[] = $this->Time->format($point['Point']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($point['Point']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($point['Point']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $point['Point']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$point['Point']['id'],
		), array(
			'icon' => 'pencil',
		));
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
