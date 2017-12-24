<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Cities');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Cities'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('country_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('bn_name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($countryCities as $countryCity):
		$row = array();
		$row[] = h($countryCity['CountryCity']['id']);
		$row[] = $this->Html->link($countryCity['Country']['name'], array(
			'controller' => 'countries',
		'action' => 'view',
			$countryCity['Country']['id'],
	));
		$row[] = h($countryCity['CountryCity']['name']);
		$row[] = h($countryCity['CountryCity']['bn_name']);
		$actions = array($this->Croogo->adminRowActions($countryCity['CountryCity']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $countryCity['CountryCity']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$countryCity['CountryCity']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$countryCity['CountryCity']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $countryCity['CountryCity']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
