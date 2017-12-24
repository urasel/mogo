<div class="bdThanas view">
<h2><?php echo __('Bd Thana'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdThana['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdThana['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bd Thana'), array('action' => 'edit', $bdThana['BdThana']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bd Thana'), array('action' => 'delete', $bdThana['BdThana']['id']), array(), __('Are you sure you want to delete # %s?', $bdThana['BdThana']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thana'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Data'), array('controller' => 'service_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Service Data'); ?></h3>
	<?php if (!empty($bdThana['ServiceData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usi'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Spclocation'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Bd Thana Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdThana['ServiceData'] as $serviceData): ?>
		<tr>
			<td><?php echo $serviceData['id']; ?></td>
			<td><?php echo $serviceData['usi']; ?></td>
			<td><?php echo $serviceData['title']; ?></td>
			<td><?php echo $serviceData['details']; ?></td>
			<td><?php echo $serviceData['price']; ?></td>
			<td><?php echo $serviceData['spclocation']; ?></td>
			<td><?php echo $serviceData['type']; ?></td>
			<td><?php echo $serviceData['category']; ?></td>
			<td><?php echo $serviceData['filename']; ?></td>
			<td><?php echo $serviceData['email']; ?></td>
			<td><?php echo $serviceData['phone']; ?></td>
			<td><?php echo $serviceData['bd_thana_id']; ?></td>
			<td><?php echo $serviceData['bd_district_id']; ?></td>
			<td><?php echo $serviceData['bd_division_id']; ?></td>
			<td><?php echo $serviceData['country']; ?></td>
			<td><?php echo $serviceData['isactive']; ?></td>
			<td><?php echo $serviceData['created']; ?></td>
			<td><?php echo $serviceData['updated']; ?></td>
			<td><?php echo $serviceData['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'service_data', 'action' => 'view', $serviceData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'service_data', 'action' => 'edit', $serviceData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'service_data', 'action' => 'delete', $serviceData['id']), array(), __('Are you sure you want to delete # %s?', $serviceData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
