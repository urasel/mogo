<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Capitals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Capitals'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryCapitals as $countryCapital):
		$row = array();
		$row[] = h($countryCapital['CountryCapital']['id']);
		$row[] = h($countryCapital['CountryCapital']['country']);
		$row[] = $this->Html->link($countryCapital['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryCapital['Country']['id'],
	));
		$row[] = h($countryCapital['CountryCapital']['name']);
		$row[] = h($countryCapital['CountryCapital']['bn_name']);
		$actions = array($this->Croogo->adminRowActions($countryCapital['CountryCapital']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryCapital['CountryCapital']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryCapital['CountryCapital']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryCapital['CountryCapital']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryCapital['CountryCapital']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
