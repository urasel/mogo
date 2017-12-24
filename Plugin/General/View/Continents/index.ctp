<div class="continents index">
	<h2><?php echo __('Continents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_title'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('area'); ?></th>
			<th><?php echo $this->Paginator->sort('population'); ?></th>
			<th><?php echo $this->Paginator->sort('countries'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_details'); ?></th>
			<th><?php echo $this->Paginator->sort('ranking'); ?></th>
			<th><?php echo $this->Paginator->sort('major_biomes'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_major_biomes'); ?></th>
			<th><?php echo $this->Paginator->sort('major_cities'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_major_cities'); ?></th>
			<th><?php echo $this->Paginator->sort('bordering_bodies_of_water'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_bordering_bodies_of_water'); ?></th>
			<th><?php echo $this->Paginator->sort('major_rivers_and_lakes'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_major_rivers_and_lakes'); ?></th>
			<th><?php echo $this->Paginator->sort('major_geographical_features'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_major_geographical_features'); ?></th>
			<th><?php echo $this->Paginator->sort('facts_about_asia'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_facts_about_asia'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($continents as $continent): ?>
	<tr>
		<td><?php echo h($continent['Continent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($continent['Point']['name'], array('controller' => 'points', 'action' => 'view', $continent['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($continent['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $continent['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($continent['Continent']['name']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['title']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_title']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['area']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['population']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['countries']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['details']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_details']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['ranking']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['major_biomes']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_major_biomes']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['major_cities']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_major_cities']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bordering_bodies_of_water']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_bordering_bodies_of_water']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['major_rivers_and_lakes']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_major_rivers_and_lakes']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['major_geographical_features']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_major_geographical_features']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['facts_about_asia']); ?>&nbsp;</td>
		<td><?php echo h($continent['Continent']['bn_facts_about_asia']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $continent['Continent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $continent['Continent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $continent['Continent']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $continent['Continent']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Continent'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
