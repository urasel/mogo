<?php
$this->viewVars['title_for_layout'] = __d('information', 'Yellow Pages');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Yellow Pages'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('logo'),
		$this->Paginator->sort('parent'),
		$this->Paginator->sort('subparent'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('bn_address'),
		$this->Paginator->sort('phone'),
		$this->Paginator->sort('fax'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('contact_person'),
		$this->Paginator->sort('website'),
		$this->Paginator->sort('details'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($yellowPages as $yellowPage):
		$row = array();
		$row[] = h($yellowPage['YellowPage']['id']);
		$row[] = $this->Html->link($yellowPage['Country']['title'], array(
			'controller' => 'countries',
		'action' => 'view',
			$yellowPage['Country']['id'],
	));
		$row[] = $this->Html->link($yellowPage['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$yellowPage['Point']['id'],
	));
		$row[] = $this->Html->link($yellowPage['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$yellowPage['PlaceType']['id'],
	));
		$row[] = h($yellowPage['YellowPage']['logo']);
		$row[] = h($yellowPage['YellowPage']['parent']);
		$row[] = h($yellowPage['YellowPage']['subparent']);
		$row[] = h($yellowPage['YellowPage']['name']);
		$row[] = h($yellowPage['YellowPage']['bn_name']);
		$row[] = h($yellowPage['YellowPage']['seo_name']);
		$row[] = h($yellowPage['YellowPage']['address']);
		$row[] = h($yellowPage['YellowPage']['bn_address']);
		$row[] = h($yellowPage['YellowPage']['phone']);
		$row[] = h($yellowPage['YellowPage']['fax']);
		$row[] = h($yellowPage['YellowPage']['email']);
		$row[] = h($yellowPage['YellowPage']['contact_person']);
		$row[] = h($yellowPage['YellowPage']['website']);
		$row[] = h($yellowPage['YellowPage']['details']);
		$actions = array($this->Croogo->adminRowActions($yellowPage['YellowPage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $yellowPage['YellowPage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$yellowPage['YellowPage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$yellowPage['YellowPage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $yellowPage['YellowPage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
