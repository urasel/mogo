<div class="recipes index">
	<h2><?php echo __('Recipes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('short_note'); ?></th>
			<th><?php echo $this->Paginator->sort('ingredients'); ?></th>
			<th><?php echo $this->Paginator->sort('instructions'); ?></th>
			<th><?php echo $this->Paginator->sort('recipe_notes'); ?></th>
			<th><?php echo $this->Paginator->sort('recipe_cuisine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('skill_level'); ?></th>
			<th><?php echo $this->Paginator->sort('prep_time'); ?></th>
			<th><?php echo $this->Paginator->sort('cook_time'); ?></th>
			<th><?php echo $this->Paginator->sort('passive_time'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipe['Point']['name'], array('controller' => 'points', 'action' => 'view', $recipe['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recipe['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $recipe['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($recipe['Recipe']['title']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['short_note']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['ingredients']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['instructions']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['recipe_notes']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipe['RecipeCuisine']['name'], array('controller' => 'recipe_cuisines', 'action' => 'view', $recipe['RecipeCuisine']['id'])); ?>
		</td>
		<td><?php echo h($recipe['Recipe']['skill_level']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['prep_time']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['cook_time']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['passive_time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recipe['Recipe']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?></li>
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
