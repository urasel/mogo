<div class="transportServices index">
	<h2><?php echo __('Transport Services'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_service_provider_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_details'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportServices as $transportService): ?>
	<tr>
		<td><?php echo h($transportService['TransportService']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportService['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportService['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportService['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportService['PlaceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportService['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportService['TransportType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportService['TransportServiceProvider']['name'], array('controller' => 'transport_service_providers', 'action' => 'view', $transportService['TransportServiceProvider']['id'])); ?>
		</td>
		<td><?php echo h($transportService['TransportService']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['details']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['bn_details']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['contact']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['website']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['email']); ?>&nbsp;</td>
		<td><?php echo h($transportService['TransportService']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportService['TransportService']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportService['TransportService']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportService['TransportService']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportService['TransportService']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Service'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
