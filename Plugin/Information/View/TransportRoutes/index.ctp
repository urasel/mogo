<div class="transportRoutes index">
	<h2><?php echo __('Transport Routes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_service_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('route_fromcountryid'); ?></th>
			<th><?php echo $this->Paginator->sort('route_fromid'); ?></th>
			<th><?php echo $this->Paginator->sort('route_tocountryid'); ?></th>
			<th><?php echo $this->Paginator->sort('route_toid'); ?></th>
			<th><?php echo $this->Paginator->sort('route_details'); ?></th>
			<th><?php echo $this->Paginator->sort('fare'); ?></th>
			<th><?php echo $this->Paginator->sort('departure_time'); ?></th>
			<th><?php echo $this->Paginator->sort('estimated_reach_time'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportRoutes as $transportRoute): ?>
	<tr>
		<td><?php echo h($transportRoute['TransportRoute']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportRoute['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportRoute['TransportService']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportRoute['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportRoute['TransportClass']['id'])); ?>
		</td>
		<td><?php echo h($transportRoute['TransportRoute']['route_fromcountryid']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['route_fromid']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['route_tocountryid']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['route_toid']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['route_details']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['fare']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['departure_time']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['estimated_reach_time']); ?>&nbsp;</td>
		<td><?php echo h($transportRoute['TransportRoute']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportRoute['TransportRoute']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportRoute['TransportRoute']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportRoute['TransportRoute']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportRoute['TransportRoute']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Route'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Galleries'), array('controller' => 'transport_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Gallery'), array('controller' => 'transport_galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>
