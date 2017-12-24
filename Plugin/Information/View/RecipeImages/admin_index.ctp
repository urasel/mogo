<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipe Images');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipe Images'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('recipe_id'),
		$this->Paginator->sort('file'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('source'),
		$this->Paginator->sort('position'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($recipeImages as $recipeImage):
		$row = array();
		$row[] = h($recipeImage['RecipeImage']['id']);
		$row[] = $this->Html->link($recipeImage['Recipe']['title'], array(
			'controller' => 'recipes',
		'action' => 'view',
			$recipeImage['Recipe']['id'],
	));
		$row[] = h($recipeImage['RecipeImage']['file']);
		$row[] = h($recipeImage['RecipeImage']['name']);
		$row[] = h($recipeImage['RecipeImage']['source']);
		$row[] = h($recipeImage['RecipeImage']['position']);
		$actions = array($this->Croogo->adminRowActions($recipeImage['RecipeImage']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $recipeImage['RecipeImage']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$recipeImage['RecipeImage']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$recipeImage['RecipeImage']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $recipeImage['RecipeImage']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
