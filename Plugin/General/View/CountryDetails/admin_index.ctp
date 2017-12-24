<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Details');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Details'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('map'),
		$this->Paginator->sort('flag'),
		$this->Paginator->sort('infosource'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryDetails as $countryDetail):
		$row = array();
		$row[] = h($countryDetail['CountryDetail']['id']);
		$row[] = $this->Html->link($countryDetail['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryDetail['Country']['id'],
	));
		$row[] = h($countryDetail['CountryDetail']['map']);
		$row[] = h($countryDetail['CountryDetail']['flag']);
	
		$row[] = h($countryDetail['CountryDetail']['infosource']);
		$row[] = $this->Html->status($countryDetail['CountryDetail']['isactive']);
		$actions = array($this->Croogo->adminRowActions($countryDetail['CountryDetail']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryDetail['CountryDetail']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryDetail['CountryDetail']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryDetail['CountryDetail']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryDetail['CountryDetail']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
