<div class="transportGalleries index">
	<h2><?php echo __('Transport Galleries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('file'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportGalleries as $transportGallery): ?>
	<tr>
		<td><?php echo h($transportGallery['TransportGallery']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportGallery['TransportRoute']['id'], array('controller' => 'transport_routes', 'action' => 'view', $transportGallery['TransportRoute']['id'])); ?>
		</td>
		<td><?php echo h($transportGallery['TransportGallery']['file']); ?>&nbsp;</td>
		<td><?php echo h($transportGallery['TransportGallery']['description']); ?>&nbsp;</td>
		<td><?php echo h($transportGallery['TransportGallery']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportGallery['TransportGallery']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportGallery['TransportGallery']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportGallery['TransportGallery']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportGallery['TransportGallery']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Gallery'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
