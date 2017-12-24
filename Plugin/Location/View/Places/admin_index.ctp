<?php
$this->viewVars['title_for_layout'] = __d('location', 'Places');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Places'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('fax'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('web'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('keyword'),
		$this->Paginator->sort('metatag'),
		$this->Paginator->sort('bangla_name'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('zone_id'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('bd_thanas_id'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('location'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('establish'),
		$this->Paginator->sort('history'),
		$this->Paginator->sort('capacity'),
		$this->Paginator->sort('holiday'),
		$this->Paginator->sort('hours'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		$this->Paginator->sort('status'),
		$this->Paginator->sort('popular'),
		$this->Paginator->sort('private'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		$this->Paginator->sort('active'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($places as $place):
		$row = array();
		$row[] = h($place['Place']['id']);
		$row[] = $this->Html->link($place['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$place['User']['id'],
	));
		$row[] = $this->Html->link($place['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$place['Point']['id'],
	));
		$row[] = h($place['Place']['name']);
		$row[] = h($place['Place']['mobile']);
		$row[] = h($place['Place']['fax']);
		$row[] = h($place['Place']['email']);
		$row[] = h($place['Place']['web']);
		$row[] = h($place['Place']['seo_name']);
		$row[] = h($place['Place']['keyword']);
		$row[] = h($place['Place']['metatag']);
		$row[] = h($place['Place']['bangla_name']);
		$row[] = $this->Html->link($place['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$place['PlaceType']['id'],
	));
		$row[] = h($place['Place']['image']);
		$row[] = $this->Html->link($place['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$place['Country']['id'],
	));
		$row[] = $this->Html->link($place['Zone']['name'], array(
			'controller' => 'zones',
		'action' => 'view',
			$place['Zone']['id'],
	));
		$row[] = $this->Html->link($place['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$place['BdDistrict']['id'],
	));
		$row[] = $this->Html->link($place['BdThanas']['name'], array(
			'controller' => 'bd_thanas',
		'action' => 'view',
			$place['BdThanas']['id'],
	));
		$row[] = h($place['Place']['address']);
		$row[] = h($place['Place']['location']);
		$row[] = h($place['Place']['details']);
		$row[] = h($place['Place']['establish']);
		$row[] = h($place['Place']['history']);
		$row[] = h($place['Place']['capacity']);
		$row[] = h($place['Place']['holiday']);
		$row[] = h($place['Place']['hours']);
		$row[] = h($place['Place']['lat']);
		$row[] = h($place['Place']['lng']);
		$row[] = $this->Html->status($place['Place']['status']);
		$row[] = $this->Html->status($place['Place']['popular']);
		$row[] = $this->Html->status($place['Place']['private']);
		$row[] = $this->Time->format($place['Place']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($place['Place']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Html->status($place['Place']['active']);
		$actions = array($this->Croogo->adminRowActions($place['Place']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $place['Place']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$place['Place']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$place['Place']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $place['Place']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
