<div class="transportServiceProviders view">
<h2><?php echo __('Transport Service Provider'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportServiceProvider['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportServiceProvider['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportServiceProvider['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Head Office'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['head_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Head Office'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_head_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Address'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Service Provider'), array('action' => 'edit', $transportServiceProvider['TransportServiceProvider']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Service Provider'), array('action' => 'delete', $transportServiceProvider['TransportServiceProvider']['id']), array(), __('Are you sure you want to delete # %s?', $transportServiceProvider['TransportServiceProvider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Service Providers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Services'); ?></h3>
	<?php if (!empty($transportServiceProvider['TransportService'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Transport Type Id'); ?></th>
		<th><?php echo __('Transport Service Provider Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Bn Details'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportServiceProvider['TransportService'] as $transportService): ?>
		<tr>
			<td><?php echo $transportService['id']; ?></td>
			<td><?php echo $transportService['point_id']; ?></td>
			<td><?php echo $transportService['place_type_id']; ?></td>
			<td><?php echo $transportService['transport_type_id']; ?></td>
			<td><?php echo $transportService['transport_service_provider_id']; ?></td>
			<td><?php echo $transportService['name']; ?></td>
			<td><?php echo $transportService['bn_name']; ?></td>
			<td><?php echo $transportService['details']; ?></td>
			<td><?php echo $transportService['bn_details']; ?></td>
			<td><?php echo $transportService['contact']; ?></td>
			<td><?php echo $transportService['website']; ?></td>
			<td><?php echo $transportService['email']; ?></td>
			<td><?php echo $transportService['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_services', 'action' => 'view', $transportService['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_services', 'action' => 'edit', $transportService['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_services', 'action' => 'delete', $transportService['id']), array(), __('Are you sure you want to delete # %s?', $transportService['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
