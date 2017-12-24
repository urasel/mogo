<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Galleries');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Galleries'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('transport_route_id'),
		$this->Paginator->sort('file'),
		$this->Paginator->sort('description'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($transportGalleries as $transportGallery):
		$row = array();
		$row[] = h($transportGallery['TransportGallery']['id']);
		$row[] = $this->Html->link($transportGallery['TransportRoute']['id'], array(
			'controller' => 'transport_routes',
		'action' => 'view',
			$transportGallery['TransportRoute']['id'],
	));
		$row[] = h($transportGallery['TransportGallery']['file']);
		$row[] = h($transportGallery['TransportGallery']['description']);
		$row[] = $this->Html->status($transportGallery['TransportGallery']['isactive']);
		$actions = array($this->Croogo->adminRowActions($transportGallery['TransportGallery']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $transportGallery['TransportGallery']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$transportGallery['TransportGallery']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$transportGallery['TransportGallery']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $transportGallery['TransportGallery']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
