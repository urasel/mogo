<div class="motorcycleModels index">
	<h2><?php echo __('Motorcycle Models'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($motorcycleModels as $motorcycleModel): ?>
	<tr>
		<td><?php echo h($motorcycleModel['MotorcycleModel']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($motorcycleModel['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycleModel['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($motorcycleModel['MotorcycleModel']['name']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleModel['MotorcycleModel']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $motorcycleModel['MotorcycleModel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $motorcycleModel['MotorcycleModel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $motorcycleModel['MotorcycleModel']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $motorcycleModel['MotorcycleModel']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Motorcycle Model'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
