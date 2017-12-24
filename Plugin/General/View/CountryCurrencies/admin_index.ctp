<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Currencies');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Currencies'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		$this->Paginator->sort('iso_4217'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryCurrencies as $countryCurrency):
		$row = array();
		$row[] = h($countryCurrency['CountryCurrency']['id']);
		$row[] = h($countryCurrency['CountryCurrency']['country']);
		$row[] = $this->Html->link($countryCurrency['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryCurrency['Country']['id'],
	));
		$row[] = h($countryCurrency['CountryCurrency']['name']);
		$row[] = h($countryCurrency['CountryCurrency']['bn_name']);
		$row[] = h($countryCurrency['CountryCurrency']['iso_4217']);
		$actions = array($this->Croogo->adminRowActions($countryCurrency['CountryCurrency']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryCurrency['CountryCurrency']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryCurrency['CountryCurrency']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryCurrency['CountryCurrency']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryCurrency['CountryCurrency']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
