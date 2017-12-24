<div class="transportRouteSpecifications view">
<h2><?php echo __('Transport Route Specification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRouteSpecification['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportRouteSpecification['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['seo_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Route Specification'), array('action' => 'edit', $transportRouteSpecification['TransportRouteSpecification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Route Specification'), array('action' => 'delete', $transportRouteSpecification['TransportRouteSpecification']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportRouteSpecification['TransportRouteSpecification']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Route Specifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route Specification'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Services'); ?></h3>
	<?php if (!empty($transportRouteSpecification['TransportService'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Transport Type Id'); ?></th>
		<th><?php echo __('Transport Service Provider Id'); ?></th>
		<th><?php echo __('Transport Route Specification Id'); ?></th>
		<th><?php echo __('Transport Specification Id'); ?></th>
		<th><?php echo __('Number Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Bn Details'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Off Day'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportRouteSpecification['TransportService'] as $transportService): ?>
		<tr>
			<td><?php echo $transportService['id']; ?></td>
			<td><?php echo $transportService['point_id']; ?></td>
			<td><?php echo $transportService['place_type_id']; ?></td>
			<td><?php echo $transportService['transport_type_id']; ?></td>
			<td><?php echo $transportService['transport_service_provider_id']; ?></td>
			<td><?php echo $transportService['transport_route_specification_id']; ?></td>
			<td><?php echo $transportService['transport_specification_id']; ?></td>
			<td><?php echo $transportService['number_code']; ?></td>
			<td><?php echo $transportService['name']; ?></td>
			<td><?php echo $transportService['bn_name']; ?></td>
			<td><?php echo $transportService['details']; ?></td>
			<td><?php echo $transportService['bn_details']; ?></td>
			<td><?php echo $transportService['contact']; ?></td>
			<td><?php echo $transportService['mobile']; ?></td>
			<td><?php echo $transportService['website']; ?></td>
			<td><?php echo $transportService['email']; ?></td>
			<td><?php echo $transportService['seo_name']; ?></td>
			<td><?php echo $transportService['metatag']; ?></td>
			<td><?php echo $transportService['keyword']; ?></td>
			<td><?php echo $transportService['off_day']; ?></td>
			<td><?php echo $transportService['logo']; ?></td>
			<td><?php echo $transportService['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_services', 'action' => 'view', $transportService['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_services', 'action' => 'edit', $transportService['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_services', 'action' => 'delete', $transportService['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transportService['id']))); ?>
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
