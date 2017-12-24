<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recipe Images'), h($recipeImage['RecipeImage']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipe Images'), array('action' => 'index'));

if (isset($recipeImage['RecipeImage']['name'])):
	$this->Html->addCrumb($recipeImage['RecipeImage']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Recipe Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Recipe Image'), array(
		'action' => 'edit',
		$recipeImage['RecipeImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Recipe Image'), array(
		'action' => 'delete', $recipeImage['RecipeImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $recipeImage['RecipeImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipe Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipes'), array('controller' => 'recipes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe'), array('controller' => 'recipes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="recipeImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipeImage['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $recipeImage['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Source'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['source']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>