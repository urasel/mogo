<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recipes'), h($recipe['Recipe']['title']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));

if (isset($recipe['Recipe']['title'])):
	$this->Html->addCrumb($recipe['Recipe']['title'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Recipe'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Recipe'), array(
		'action' => 'edit',
		$recipe['Recipe']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Recipe'), array(
		'action' => 'delete', $recipe['Recipe']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $recipe['Recipe']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipe Cuisines'), array('controller' => 'recipe_cuisines', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe Cuisine'), array('controller' => 'recipe_cuisines', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="recipes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['Point']['name'], array('controller' => 'points', 'action' => 'view', $recipe['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $recipe['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Note'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['short_note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Ingredients'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['ingredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Instructions'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['instructions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Recipe Notes'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['recipe_notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Recipe Cuisine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['RecipeCuisine']['name'], array('controller' => 'recipe_cuisines', 'action' => 'view', $recipe['RecipeCuisine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Skill Level'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['skill_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Prep Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['prep_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Cook Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['cook_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Passive Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['passive_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>