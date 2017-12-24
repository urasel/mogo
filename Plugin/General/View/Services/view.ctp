<div class="services view">
<h2><?php echo __('Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($service['Service']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($service['Service']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($service['Service']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($service['Service']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($service['Service']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Service'), array('action' => 'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Service'), array('action' => 'delete', $service['Service']['id']), array(), __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Fields'), array('controller' => 'service_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Field'), array('controller' => 'service_fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicelists'), array('controller' => 'servicelists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servicelist'), array('controller' => 'servicelists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Service Fields'); ?></h3>
	<?php if (!empty($service['ServiceField'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Service Id'); ?></th>
		<th><?php echo __('Servicelist Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Symbol'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($service['ServiceField'] as $serviceField): ?>
		<tr>
			<td><?php echo $serviceField['id']; ?></td>
			<td><?php echo $serviceField['service_id']; ?></td>
			<td><?php echo $serviceField['servicelist_id']; ?></td>
			<td><?php echo $serviceField['name']; ?></td>
			<td><?php echo $serviceField['value']; ?></td>
			<td><?php echo $serviceField['symbol']; ?></td>
			<td><?php echo $serviceField['type']; ?></td>
			<td><?php echo $serviceField['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'service_fields', 'action' => 'view', $serviceField['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'service_fields', 'action' => 'edit', $serviceField['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'service_fields', 'action' => 'delete', $serviceField['id']), array(), __('Are you sure you want to delete # %s?', $serviceField['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Service Field'), array('controller' => 'service_fields', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Servicelists'); ?></h3>
	<?php if (!empty($service['Servicelist'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Service Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($service['Servicelist'] as $servicelist): ?>
		<tr>
			<td><?php echo $servicelist['id']; ?></td>
			<td><?php echo $servicelist['service_id']; ?></td>
			<td><?php echo $servicelist['name']; ?></td>
			<td><?php echo $servicelist['order']; ?></td>
			<td><?php echo $servicelist['isactive']; ?></td>
			<td><?php echo $servicelist['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servicelists', 'action' => 'view', $servicelist['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servicelists', 'action' => 'edit', $servicelist['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servicelists', 'action' => 'delete', $servicelist['id']), array(), __('Are you sure you want to delete # %s?', $servicelist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Servicelist'), array('controller' => 'servicelists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
