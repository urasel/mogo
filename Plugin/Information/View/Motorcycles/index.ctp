<div class="motorcycles index">
	<h2><?php echo __('Motorcycles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('engine'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_power'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_torque'); ?></th>
			<th><?php echo $this->Paginator->sort('top_speed'); ?></th>
			<th><?php echo $this->Paginator->sort('mileage'); ?></th>
			<th><?php echo $this->Paginator->sort('curb_weight'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($motorcycles as $motorcycle): ?>
	<tr>
		<td><?php echo h($motorcycle['Motorcycle']['id']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['name']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['seo_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($motorcycle['Point']['name'], array('controller' => 'points', 'action' => 'view', $motorcycle['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($motorcycle['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycle['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($motorcycle['Motorcycle']['engine']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['maximum_power']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['maximum_torque']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['top_speed']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['mileage']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['curb_weight']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['remarks']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['created']); ?>&nbsp;</td>
		<td><?php echo h($motorcycle['Motorcycle']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $motorcycle['Motorcycle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $motorcycle['Motorcycle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $motorcycle['Motorcycle']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $motorcycle['Motorcycle']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Motorcycle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Images'), array('controller' => 'motorcycle_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Image'), array('controller' => 'motorcycle_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Prices'), array('controller' => 'motorcycle_prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Price'), array('controller' => 'motorcycle_prices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Specifications'), array('controller' => 'motorcycle_specifications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Specification'), array('controller' => 'motorcycle_specifications', 'action' => 'add')); ?> </li>
	</ul>
</div>
