<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('title'),
		$this->Paginator->sort('recipe_cuisine_id'),
		$this->Paginator->sort('user_id'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($recipes as $recipe):
		$row = array();
		$row[] = h($recipe['Recipe']['id']);
		$row[] = h($recipe['Recipe']['title']);
		$row[] = $this->Html->link($recipe['RecipeCuisine']['name'], array(
			'controller' => 'recipe_cuisines',
		'action' => 'view',
			$recipe['RecipeCuisine']['id'],
	));
		$row[] = $this->Html->link($recipe['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$recipe['User']['id'],
	));
		$actions = array($this->Croogo->adminRowActions($recipe['Recipe']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $recipe['Recipe']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$recipe['Recipe']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$recipe['Recipe']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $recipe['Recipe']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
