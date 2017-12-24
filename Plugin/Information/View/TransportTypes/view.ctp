<div class="transportTypes view">
<h2><?php echo __('Transport Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['icon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Type'), array('action' => 'edit', $transportType['TransportType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Type'), array('action' => 'delete', $transportType['TransportType']['id']), array(), __('Are you sure you want to delete # %s?', $transportType['TransportType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Stopages'), array('controller' => 'transport_stopages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Stopage'), array('controller' => 'transport_stopages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Classes'); ?></h3>
	<?php if (!empty($transportType['TransportClass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transport Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Bn Details'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportType['TransportClass'] as $transportClass): ?>
		<tr>
			<td><?php echo $transportClass['id']; ?></td>
			<td><?php echo $transportClass['transport_type_id']; ?></td>
			<td><?php echo $transportClass['name']; ?></td>
			<td><?php echo $transportClass['bn_name']; ?></td>
			<td><?php echo $transportClass['details']; ?></td>
			<td><?php echo $transportClass['bn_details']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_classes', 'action' => 'view', $transportClass['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_classes', 'action' => 'edit', $transportClass['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_classes', 'action' => 'delete', $transportClass['id']), array(), __('Are you sure you want to delete # %s?', $transportClass['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Service Providers'); ?></h3>
	<?php if (!empty($transportType['TransportServiceProvider'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transport Type Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Head Office'); ?></th>
		<th><?php echo __('Bn Head Office'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Bn Address'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportType['TransportServiceProvider'] as $transportServiceProvider): ?>
		<tr>
			<td><?php echo $transportServiceProvider['id']; ?></td>
			<td><?php echo $transportServiceProvider['transport_type_id']; ?></td>
			<td><?php echo $transportServiceProvider['point_id']; ?></td>
			<td><?php echo $transportServiceProvider['place_type_id']; ?></td>
			<td><?php echo $transportServiceProvider['name']; ?></td>
			<td><?php echo $transportServiceProvider['bn_name']; ?></td>
			<td><?php echo $transportServiceProvider['head_office']; ?></td>
			<td><?php echo $transportServiceProvider['bn_head_office']; ?></td>
			<td><?php echo $transportServiceProvider['address']; ?></td>
			<td><?php echo $transportServiceProvider['bn_address']; ?></td>
			<td><?php echo $transportServiceProvider['mobile']; ?></td>
			<td><?php echo $transportServiceProvider['email']; ?></td>
			<td><?php echo $transportServiceProvider['logo']; ?></td>
			<td><?php echo $transportServiceProvider['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_service_providers', 'action' => 'view', $transportServiceProvider['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_service_providers', 'action' => 'edit', $transportServiceProvider['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_service_providers', 'action' => 'delete', $transportServiceProvider['id']), array(), __('Are you sure you want to delete # %s?', $transportServiceProvider['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transport Services'); ?></h3>
	<?php if (!empty($transportType['TransportService'])): ?>
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
	<?php foreach ($transportType['TransportService'] as $transportService): ?>
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
<div class="related">
	<h3><?php echo __('Related Transport Stopages'); ?></h3>
	<?php if (!empty($transportType['TransportStopage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Transport Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Bn Address'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportType['TransportStopage'] as $transportStopage): ?>
		<tr>
			<td><?php echo $transportStopage['id']; ?></td>
			<td><?php echo $transportStopage['point_id']; ?></td>
			<td><?php echo $transportStopage['place_type_id']; ?></td>
			<td><?php echo $transportStopage['transport_type_id']; ?></td>
			<td><?php echo $transportStopage['name']; ?></td>
			<td><?php echo $transportStopage['bn_name']; ?></td>
			<td><?php echo $transportStopage['address']; ?></td>
			<td><?php echo $transportStopage['bn_address']; ?></td>
			<td><?php echo $transportStopage['contact']; ?></td>
			<td><?php echo $transportStopage['image']; ?></td>
			<td><?php echo $transportStopage['email']; ?></td>
			<td><?php echo $transportStopage['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transport_stopages', 'action' => 'view', $transportStopage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transport_stopages', 'action' => 'edit', $transportStopage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transport_stopages', 'action' => 'delete', $transportStopage['id']), array(), __('Are you sure you want to delete # %s?', $transportStopage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transport Stopage'), array('controller' => 'transport_stopages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
