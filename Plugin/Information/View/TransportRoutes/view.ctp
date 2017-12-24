<div class="transportRoutes view">
<h2><?php echo __('Transport Route'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRoute['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportRoute['TransportService']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRoute['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportRoute['TransportClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Fromcountryid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_fromcountryid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Fromid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_fromid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Tocountryid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_tocountryid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Toid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_toid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Details'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departure Time'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['departure_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estimated Reach Time'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['estimated_reach_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Route'), array('action' => 'edit', $transportRoute['TransportRoute']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Route'), array('action' => 'delete', $transportRoute['TransportRoute']['id']), array(), __('Are you sure you want to delete # %s?', $transportRoute['TransportRoute']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Galleries'), array('controller' => 'transport_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Gallery'), array('controller' => 'transport_galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Galleries'); ?></h3>
	<?php if (!empty($transportRoute['TransportGallery'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transport Route Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportRoute['TransportGallery'] as $transportGallery): ?>
		<tr>
			<td><?php echo $transportGallery['id']; ?></td>
			<td><?php echo $transportGallery['transport_route_id']; ?></td>
			<td><?php echo $transportGallery['file']; ?></td>
			<td><?php echo $transportGallery['description']; ?></td>
			<td><?php echo $transportGallery['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_galleries', 'action' => 'view', $transportGallery['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_galleries', 'action' => 'edit', $transportGallery['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_galleries', 'action' => 'delete', $transportGallery['id']), array(), __('Are you sure you want to delete # %s?', $transportGallery['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Gallery'), array('controller' => 'transport_galleries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
