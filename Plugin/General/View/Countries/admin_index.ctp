<?php
$this->viewVars['title_for_layout'] = __d('general', 'Countries');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Countries'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('continent_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('flag'),
		$this->Paginator->sort('iso_code_2'),
		$this->Paginator->sort('iso_code_3'),
		$this->Paginator->sort('status'),
		$this->Paginator->sort('order'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countries as $country):
		$row = array();
		$row[] = h($country['Country']['id']);
		$row[] = $this->Html->link($country['Continent']['name'], array(
			'controller' => 'continents',
		'action' => 'view',
			$country['Continent']['id'],
	));
		$row[] = h($country['Country']['name']);
		$row[] = h($country['Country']['bn_name']);
		$row[] = '<i class="'.$country['Country']['flag'].'"></i>';
		$row[] = h($country['Country']['iso_code_2']);
		$row[] = h($country['Country']['iso_code_3']);
		$row[] = $this->Html->status($country['Country']['status']);
		$row[] = h($country['Country']['order']);
		$actions = array($this->Croogo->adminRowActions($country['Country']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $country['Country']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$country['Country']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$country['Country']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $country['Country']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
