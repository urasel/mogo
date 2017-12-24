<div class="servicelists index">
	<h2><?php echo __('Servicelists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($servicelists as $servicelist): ?>
	<tr>
		<td><?php echo h($servicelist['Servicelist']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($servicelist['Service']['name'], array('controller' => 'services', 'action' => 'view', $servicelist['Service']['id'])); ?>
		</td>
		<td><?php echo h($servicelist['Servicelist']['name']); ?>&nbsp;</td>
		<td><?php echo h($servicelist['Servicelist']['order']); ?>&nbsp;</td>
		<td><?php echo h($servicelist['Servicelist']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($servicelist['Servicelist']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $servicelist['Servicelist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $servicelist['Servicelist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $servicelist['Servicelist']['id']), array(), __('Are you sure you want to delete # %s?', $servicelist['Servicelist']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Servicelist'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Fields'), array('controller' => 'service_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Field'), array('controller' => 'service_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
