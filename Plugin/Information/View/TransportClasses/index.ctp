<div class="transportClasses index">
	<h2><?php echo __('Transport Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_details'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportClasses as $transportClass): ?>
	<tr>
		<td><?php echo h($transportClass['TransportClass']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportClass['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportClass['TransportType']['id'])); ?>
		</td>
		<td><?php echo h($transportClass['TransportClass']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportClass['TransportClass']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportClass['TransportClass']['details']); ?>&nbsp;</td>
		<td><?php echo h($transportClass['TransportClass']['bn_details']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportClass['TransportClass']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportClass['TransportClass']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportClass['TransportClass']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportClass['TransportClass']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Class'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
