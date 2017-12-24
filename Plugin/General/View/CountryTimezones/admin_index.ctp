<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Timezones');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Timezones'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('utc'),
		$this->Paginator->sort('dst'),
		$this->Paginator->sort('dst_period_start_end'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryTimezones as $countryTimezone):
		$row = array();
		$row[] = h($countryTimezone['CountryTimezone']['id']);
		$row[] = h($countryTimezone['CountryTimezone']['country']);
		$row[] = $this->Html->link($countryTimezone['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryTimezone['Country']['id'],
	));
		$row[] = h($countryTimezone['CountryTimezone']['utc']);
		$row[] = h($countryTimezone['CountryTimezone']['dst']);
		$row[] = h($countryTimezone['CountryTimezone']['dst_period_start_end']);
		$actions = array($this->Croogo->adminRowActions($countryTimezone['CountryTimezone']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryTimezone['CountryTimezone']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryTimezone['CountryTimezone']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryTimezone['CountryTimezone']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryTimezone['CountryTimezone']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
