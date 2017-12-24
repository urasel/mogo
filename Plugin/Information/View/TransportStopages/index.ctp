<div class="transportStopages index">
	<h2><?php echo __('Transport Stopages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_address'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportStopages as $transportStopage): ?>
	<tr>
		<td><?php echo h($transportStopage['TransportStopage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportStopage['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportStopage['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportStopage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportStopage['PlaceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transportStopage['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportStopage['TransportType']['id'])); ?>
		</td>
		<td><?php echo h($transportStopage['TransportStopage']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['address']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['bn_address']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['contact']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['image']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['email']); ?>&nbsp;</td>
		<td><?php echo h($transportStopage['TransportStopage']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportStopage['TransportStopage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportStopage['TransportStopage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportStopage['TransportStopage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportStopage['TransportStopage']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Stopage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
