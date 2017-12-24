<?php
$this->viewVars['title_for_layout'] = __d('information', 'Airports');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Airports'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('ident'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('airport_type_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('elevation_ft'),
		$this->Paginator->sort('continent_id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('iso_region'),
		$this->Paginator->sort('municipality'),
		$this->Paginator->sort('scheduled_service'),
		$this->Paginator->sort('gps_code'),
		$this->Paginator->sort('iata_code'),
		$this->Paginator->sort('local_code'),
		$this->Paginator->sort('web'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('metatag'),
		$this->Paginator->sort('keywords'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($airports as $airport):
		$row = array();
		$row[] = h($airport['Airport']['id']);
		$row[] = h($airport['Airport']['ident']);
		$row[] = $this->Html->link($airport['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$airport['Point']['id'],
	));
		$row[] = $this->Html->link($airport['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$airport['PlaceType']['id'],
	));
		$row[] = $this->Html->link($airport['AirportType']['name'], array(
			'controller' => 'airport_types',
		'action' => 'view',
			$airport['AirportType']['id'],
	));
		$row[] = h($airport['Airport']['name']);
		$row[] = h($airport['Airport']['seo_name']);
		$row[] = h($airport['Airport']['lat']);
		$row[] = h($airport['Airport']['lng']);
		$row[] = h($airport['Airport']['address']);
		$row[] = h($airport['Airport']['elevation_ft']);
		$row[] = $this->Html->link($airport['Continent']['name'], array(
			'controller' => 'continents',
		'action' => 'view',
			$airport['Continent']['id'],
	));
		$row[] = $this->Html->link($airport['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$airport['Country']['id'],
	));
		$row[] = h($airport['Airport']['iso_region']);
		$row[] = h($airport['Airport']['municipality']);
		$row[] = $this->Html->status($airport['Airport']['scheduled_service']);
		$row[] = h($airport['Airport']['gps_code']);
		$row[] = h($airport['Airport']['iata_code']);
		$row[] = h($airport['Airport']['local_code']);
		$row[] = h($airport['Airport']['web']);
		$row[] = h($airport['Airport']['email']);
		$row[] = h($airport['Airport']['mobile']);
		$row[] = h($airport['Airport']['image']);
		$row[] = h($airport['Airport']['metatag']);
		$row[] = h($airport['Airport']['keywords']);
		$row[] = $this->Html->status($airport['Airport']['isactive']);
		$actions = array($this->Croogo->adminRowActions($airport['Airport']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $airport['Airport']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$airport['Airport']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$airport['Airport']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $airport['Airport']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
