<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipe Cuisines');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipe Cuisines'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('name_bn'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('order'),
		$this->Paginator->sort('isactive'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($recipeCuisines as $recipeCuisine):
		$row = array();
		$row[] = h($recipeCuisine['RecipeCuisine']['id']);
		$row[] = h($recipeCuisine['RecipeCuisine']['name']);
		$row[] = h($recipeCuisine['RecipeCuisine']['name_bn']);
		$row[] = h($recipeCuisine['RecipeCuisine']['seo_name']);
		$row[] = h($recipeCuisine['RecipeCuisine']['order']);
		$row[] = $this->Html->status($recipeCuisine['RecipeCuisine']['isactive']);
		$actions = array($this->Croogo->adminRowActions($recipeCuisine['RecipeCuisine']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $recipeCuisine['RecipeCuisine']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$recipeCuisine['RecipeCuisine']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$recipeCuisine['RecipeCuisine']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $recipeCuisine['RecipeCuisine']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
