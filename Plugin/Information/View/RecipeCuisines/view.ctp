<div class="recipeCuisines view">
<h2><?php echo __('Recipe Cuisine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Bn'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe Cuisine'), array('action' => 'edit', $recipeCuisine['RecipeCuisine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe Cuisine'), array('action' => 'delete', $recipeCuisine['RecipeCuisine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recipeCuisine['RecipeCuisine']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipe Cuisines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe Cuisine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Recipes'); ?></h3>
	<?php if (!empty($recipeCuisine['Recipe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Short Note'); ?></th>
		<th><?php echo __('Ingredients'); ?></th>
		<th><?php echo __('Instructions'); ?></th>
		<th><?php echo __('Recipe Notes'); ?></th>
		<th><?php echo __('Recipe Cuisine Id'); ?></th>
		<th><?php echo __('Skill Level'); ?></th>
		<th><?php echo __('Prep Time'); ?></th>
		<th><?php echo __('Cook Time'); ?></th>
		<th><?php echo __('Passive Time'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recipeCuisine['Recipe'] as $recipe): ?>
		<tr>
			<td><?php echo $recipe['id']; ?></td>
			<td><?php echo $recipe['point_id']; ?></td>
			<td><?php echo $recipe['place_type_id']; ?></td>
			<td><?php echo $recipe['title']; ?></td>
			<td><?php echo $recipe['seo_name']; ?></td>
			<td><?php echo $recipe['short_note']; ?></td>
			<td><?php echo $recipe['ingredients']; ?></td>
			<td><?php echo $recipe['instructions']; ?></td>
			<td><?php echo $recipe['recipe_notes']; ?></td>
			<td><?php echo $recipe['recipe_cuisine_id']; ?></td>
			<td><?php echo $recipe['skill_level']; ?></td>
			<td><?php echo $recipe['prep_time']; ?></td>
			<td><?php echo $recipe['cook_time']; ?></td>
			<td><?php echo $recipe['passive_time']; ?></td>
			<td><?php echo $recipe['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recipes', 'action' => 'view', $recipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recipes', 'action' => 'edit', $recipe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recipes', 'action' => 'delete', $recipe['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recipe['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
