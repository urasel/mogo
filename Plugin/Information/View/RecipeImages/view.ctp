<div class="recipeImages view">
<h2><?php echo __('Recipe Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipeImage['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $recipeImage['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['source']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($recipeImage['RecipeImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe Image'), array('action' => 'edit', $recipeImage['RecipeImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe Image'), array('action' => 'delete', $recipeImage['RecipeImage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recipeImage['RecipeImage']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipe Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
