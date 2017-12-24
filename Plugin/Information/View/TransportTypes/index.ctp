<div class="transportTypes index">
	<h2><?php echo __('Transport Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportTypes as $transportType): ?>
	<tr>
		<td><?php echo h($transportType['TransportType']['id']); ?>&nbsp;</td>
		<td><?php echo h($transportType['TransportType']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportType['TransportType']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportType['TransportType']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($transportType['TransportType']['icon']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportType['TransportType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportType['TransportType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportType['TransportType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportType['TransportType']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Stopages'), array('controller' => 'transport_stopages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Stopage'), array('controller' => 'transport_stopages', 'action' => 'add')); ?> </li>
	</ul>
</div>
