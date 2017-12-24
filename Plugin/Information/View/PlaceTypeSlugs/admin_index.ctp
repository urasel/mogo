<?php
$this->viewVars['title_for_layout'] = __d('information', 'Place Type Slugs');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Place Type Slugs'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('slug'),
		$this->Paginator->sort('params'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($placeTypeSlugs as $placeTypeSlug):
		$row = array();
		$row[] = h($placeTypeSlug['PlaceTypeSlug']['id']);
		$row[] = $this->Html->link($placeTypeSlug['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$placeTypeSlug['PlaceType']['id'],
	));
		$row[] = h($placeTypeSlug['PlaceTypeSlug']['slug']);
		$row[] = h($placeTypeSlug['PlaceTypeSlug']['params']);
		$row[] = $this->Html->status($placeTypeSlug['PlaceTypeSlug']['isactive']);
		$actions = array($this->Croogo->adminRowActions($placeTypeSlug['PlaceTypeSlug']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $placeTypeSlug['PlaceTypeSlug']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$placeTypeSlug['PlaceTypeSlug']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$placeTypeSlug['PlaceTypeSlug']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $placeTypeSlug['PlaceTypeSlug']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
