<div class="transportServices view">
<h2><?php echo __('Transport Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportService['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportService['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportService['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Service Provider'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['TransportServiceProvider']['name'], array('controller' => 'transport_service_providers', 'action' => 'view', $transportService['TransportServiceProvider']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Details'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Service'), array('action' => 'edit', $transportService['TransportService']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Service'), array('action' => 'delete', $transportService['TransportService']['id']), array(), __('Are you sure you want to delete # %s?', $transportService['TransportService']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Routes'); ?></h3>
	<?php if (!empty($transportService['TransportRoute'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transport Service Id'); ?></th>
		<th><?php echo __('Transport Class Id'); ?></th>
		<th><?php echo __('Route Fromid'); ?></th>
		<th><?php echo __('Route Toid'); ?></th>
		<th><?php echo __('Route Details'); ?></th>
		<th><?php echo __('Fare'); ?></th>
		<th><?php echo __('Departure Time'); ?></th>
		<th><?php echo __('Estimated Reach Time'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportService['TransportRoute'] as $transportRoute): ?>
		<tr>
			<td><?php echo $transportRoute['id']; ?></td>
			<td><?php echo $transportRoute['transport_service_id']; ?></td>
			<td><?php echo $transportRoute['transport_class_id']; ?></td>
			<td><?php echo $transportRoute['route_fromid']; ?></td>
			<td><?php echo $transportRoute['route_toid']; ?></td>
			<td><?php echo $transportRoute['route_details']; ?></td>
			<td><?php echo $transportRoute['fare']; ?></td>
			<td><?php echo $transportRoute['departure_time']; ?></td>
			<td><?php echo $transportRoute['estimated_reach_time']; ?></td>
			<td><?php echo $transportRoute['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_routes', 'action' => 'view', $transportRoute['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_routes', 'action' => 'edit', $transportRoute['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_routes', 'action' => 'delete', $transportRoute['id']), array(), __('Are you sure you want to delete # %s?', $transportRoute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
