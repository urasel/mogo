<div class="transportAccomodations index">
	<h2><?php echo __('Transport Accomodations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_service_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fare'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('images'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportAccomodations as $transportAccomodation): ?>
	<tr>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportAccomodation['TransportRoute']['name'], array('controller' => 'transport_routes', 'action' => 'view', $transportAccomodation['TransportRoute']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportAccomodation['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportAccomodation['TransportClass']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportAccomodation['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportAccomodation['TransportService']['id'])); ?>
		</td>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['fare']); ?>&nbsp;</td>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['images']); ?>&nbsp;</td>
		<td><?php echo h($transportAccomodation['TransportAccomodation']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportAccomodation['TransportAccomodation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportAccomodation['TransportAccomodation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportAccomodation['TransportAccomodation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportAccomodation['TransportAccomodation']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Accomodation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
	</ul>
</div>
