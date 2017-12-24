<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hotels');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hotels'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('hotel_category_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('city'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('zone_id'),
		$this->Paginator->sort('postcode'),
		$this->Paginator->sort('facilities'),
		$this->Paginator->sort('extrafacilities'),
		$this->Paginator->sort('facilitydata'),
		$this->Paginator->sort('extrafacilitydata'),
		$this->Paginator->sort('maplocation'),
		$this->Paginator->sort('description'),
		$this->Paginator->sort('policies'),
		$this->Paginator->sort('check_in_from'),
		$this->Paginator->sort('check_out_until'),
		$this->Paginator->sort('distance_from_city'),
		$this->Paginator->sort('number_of_floor'),
		$this->Paginator->sort('number_of_restaurant'),
		$this->Paginator->sort('total_rooms'),
		$this->Paginator->sort('build_year'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hotels as $hotel):
		$row = array();
		$row[] = h($hotel['Hotel']['id']);
		$row[] = $this->Html->link($hotel['HotelCategory']['name'], array(
			'controller' => 'hotel_categories',
		'action' => 'view',
			$hotel['HotelCategory']['id'],
	));
		$row[] = h($hotel['Hotel']['name']);
		$row[] = h($hotel['Hotel']['image']);
		$row[] = h($hotel['Hotel']['address']);
		$row[] = h($hotel['Hotel']['city']);
		$row[] = $this->Html->link($hotel['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$hotel['Country']['id'],
	));
		$row[] = $this->Html->link($hotel['Zone']['name'], array(
			'controller' => 'zones',
		'action' => 'view',
			$hotel['Zone']['id'],
	));
		$row[] = h($hotel['Hotel']['postcode']);
		$row[] = h($hotel['Hotel']['facilities']);
		$row[] = h($hotel['Hotel']['extrafacilities']);
		$row[] = h($hotel['Hotel']['facilitydata']);
		$row[] = h($hotel['Hotel']['extrafacilitydata']);
		$row[] = h($hotel['Hotel']['maplocation']);
		$row[] = h($hotel['Hotel']['description']);
		$row[] = h($hotel['Hotel']['policies']);
		$row[] = h($hotel['Hotel']['check_in_from']);
		$row[] = h($hotel['Hotel']['check_out_until']);
		$row[] = h($hotel['Hotel']['distance_from_city']);
		$row[] = h($hotel['Hotel']['number_of_floor']);
		$row[] = h($hotel['Hotel']['number_of_restaurant']);
		$row[] = h($hotel['Hotel']['total_rooms']);
		$row[] = h($hotel['Hotel']['build_year']);
		$row[] = h($hotel['Hotel']['lat']);
		$row[] = h($hotel['Hotel']['lng']);
		$actions = array($this->Croogo->adminRowActions($hotel['Hotel']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hotel['Hotel']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hotel['Hotel']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hotel['Hotel']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hotel['Hotel']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
