<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Domains');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Domains'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('country'),
		$this->Paginator->sort('country_id'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryDomains as $countryDomain):
		$row = array();
		$row[] = h($countryDomain['CountryDomain']['id']);
		$row[] = h($countryDomain['CountryDomain']['name']);
		$row[] = h($countryDomain['CountryDomain']['country']);
		$row[] = $this->Html->link($countryDomain['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryDomain['Country']['id'],
	));
		$actions = array($this->Croogo->adminRowActions($countryDomain['CountryDomain']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryDomain['CountryDomain']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryDomain['CountryDomain']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryDomain['CountryDomain']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryDomain['CountryDomain']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
