<div class="recipes view">
<h2><?php echo __('Recipe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['Point']['name'], array('controller' => 'points', 'action' => 'view', $recipe['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $recipe['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Note'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['short_note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredients'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['ingredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructions'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['instructions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe Notes'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['recipe_notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe Cuisine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['RecipeCuisine']['name'], array('controller' => 'recipe_cuisines', 'action' => 'view', $recipe['RecipeCuisine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skill Level'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['skill_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prep Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['prep_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cook Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['cook_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Passive Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['passive_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe'), array('action' => 'edit', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe'), array('action' => 'delete', $recipe['Recipe']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recipe['Recipe']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipe Cuisines'), array('controller' => 'recipe_cuisines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe Cuisine'), array('controller' => 'recipe_cuisines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
