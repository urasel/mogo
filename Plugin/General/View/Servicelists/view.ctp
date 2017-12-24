<div class="servicelists view">
<h2><?php echo __('Servicelist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($servicelist['Service']['name'], array('controller' => 'services', 'action' => 'view', $servicelist['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Servicelist'), array('action' => 'edit', $servicelist['Servicelist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Servicelist'), array('action' => 'delete', $servicelist['Servicelist']['id']), array(), __('Are you sure you want to delete # %s?', $servicelist['Servicelist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicelists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servicelist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Fields'), array('controller' => 'service_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Field'), array('controller' => 'service_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Service Fields'); ?></h3>
	<?php if (!empty($servicelist['ServiceField'])): ?>
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
	<?php foreach ($servicelist['ServiceField'] as $serviceField): ?>
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
