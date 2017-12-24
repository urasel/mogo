<div class="transportClasses view">
<h2><?php echo __('Transport Class'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportClass['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportClass['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Details'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['bn_details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Class'), array('action' => 'edit', $transportClass['TransportClass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Class'), array('action' => 'delete', $transportClass['TransportClass']['id']), array(), __('Are you sure you want to delete # %s?', $transportClass['TransportClass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Routes'); ?></h3>
	<?php if (!empty($transportClass['TransportRoute'])): ?>
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
	<?php foreach ($transportClass['TransportRoute'] as $transportRoute): ?>
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
