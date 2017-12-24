<?php
$this->viewVars['title_for_layout'] = __d('general', 'Place Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Place Types'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('parentid'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('singlename'),
		$this->Paginator->sort('icon'),
		$this->Paginator->sort('icon_image'),
		$this->Paginator->sort('order'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($placeTypes as $placeType):
		$row = array();
		$row[] = h($placeType['PlaceType']['id']);
		$row[] = h($placeType['PlaceType']['parentid']);
		$row[] = h($placeType['PlaceType']['name']);
		$row[] = h($placeType['PlaceType']['bn_name']);
		$row[] = h($placeType['PlaceType']['seo_name']);
		$row[] = h($placeType['PlaceType']['singlename']);
		$row[] = h($placeType['PlaceType']['icon']);
		$row[] = '<i class="'.$placeType['PlaceType']['icon'].'"></i>';
		$row[] = h($placeType['PlaceType']['order']);
		$row[] = $this->Html->status($placeType['PlaceType']['isactive']);
		$actions = array($this->Croogo->adminRowActions($placeType['PlaceType']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $placeType['PlaceType']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$placeType['PlaceType']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$placeType['PlaceType']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $placeType['PlaceType']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
