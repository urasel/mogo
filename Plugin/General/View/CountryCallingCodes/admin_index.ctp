<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Calling Codes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Calling Codes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('calling_code'),
		$this->Paginator->sort('country'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('exit_prefix_idd'),
		$this->Paginator->sort('national_prefix_ndd'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryCallingCodes as $countryCallingCode):
		$row = array();
		$row[] = h($countryCallingCode['CountryCallingCode']['id']);
		$row[] = h($countryCallingCode['CountryCallingCode']['calling_code']);
		$row[] = h($countryCallingCode['CountryCallingCode']['country']);
		$row[] = $this->Html->link($countryCallingCode['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryCallingCode['Country']['id'],
	));
		$row[] = h($countryCallingCode['CountryCallingCode']['exit_prefix_idd']);
		$row[] = h($countryCallingCode['CountryCallingCode']['national_prefix_ndd']);
		$row[] = $this->Html->status($countryCallingCode['CountryCallingCode']['isactive']);
		$actions = array($this->Croogo->adminRowActions($countryCallingCode['CountryCallingCode']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryCallingCode['CountryCallingCode']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryCallingCode['CountryCallingCode']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryCallingCode['CountryCallingCode']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryCallingCode['CountryCallingCode']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
