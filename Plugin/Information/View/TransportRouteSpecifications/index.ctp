<div class="transportRouteSpecifications index">
	<h2><?php echo __('Transport Route Specifications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transport_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transportRouteSpecifications as $transportRouteSpecification): ?>
	<tr>
		<td><?php echo h($transportRouteSpecification['TransportRouteSpecification']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transportRouteSpecification['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportRouteSpecification['TransportType']['id'])); ?>
		</td>
		<td><?php echo h($transportRouteSpecification['TransportRouteSpecification']['name']); ?>&nbsp;</td>
		<td><?php echo h($transportRouteSpecification['TransportRouteSpecification']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($transportRouteSpecification['TransportRouteSpecification']['seo_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportRouteSpecification['TransportRouteSpecification']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportRouteSpecification['TransportRouteSpecification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportRouteSpecification['TransportRouteSpecification']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportRouteSpecification['TransportRouteSpecification']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transport Route Specification'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
	</ul>
</div>
