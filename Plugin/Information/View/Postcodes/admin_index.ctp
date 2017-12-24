<?php
$this->viewVars['title_for_layout'] = __d('information', 'Postcodes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Postcodes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('bd_division_id'),
		$this->Paginator->sort('bd_district_id'),
		$this->Paginator->sort('bd_thanas_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('post_code'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($postcodes as $postcode):
		$row = array();
		$row[] = h($postcode['Postcode']['id']);
		$row[] = $this->Html->link($postcode['BdDivision']['name'], array(
			'controller' => 'bd_divisions',
		'action' => 'view',
			$postcode['BdDivision']['id'],
	));
		$row[] = $this->Html->link($postcode['BdDistrict']['name'], array(
			'controller' => 'bd_districts',
		'action' => 'view',
			$postcode['BdDistrict']['id'],
	));
		$row[] = $this->Html->link($postcode['BdThanas']['name'], array(
			'controller' => 'bd_thanas',
		'action' => 'view',
			$postcode['BdThanas']['id'],
	));
		$row[] = h($postcode['Postcode']['name']);
		$row[] = h($postcode['Postcode']['post_code']);
		$row[] = h($postcode['Postcode']['lat']);
		$row[] = h($postcode['Postcode']['lng']);
		$actions = array($this->Croogo->adminRowActions($postcode['Postcode']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $postcode['Postcode']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$postcode['Postcode']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$postcode['Postcode']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $postcode['Postcode']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
