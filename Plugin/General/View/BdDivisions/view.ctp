<div class="bdDivisions view">
<h2><?php echo __('Bd Division'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bd Division'), array('action' => 'edit', $bdDivision['BdDivision']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bd Division'), array('action' => 'delete', $bdDivision['BdDivision']['id']), array(), __('Are you sure you want to delete # %s?', $bdDivision['BdDivision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Upozillas'), array('controller' => 'bd_upozillas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Data'), array('controller' => 'service_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bd Districts'); ?></h3>
	<?php if (!empty($bdDivision['BdDistrict'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdDivision['BdDistrict'] as $bdDistrict): ?>
		<tr>
			<td><?php echo $bdDistrict['id']; ?></td>
			<td><?php echo $bdDistrict['name']; ?></td>
			<td><?php echo $bdDistrict['bn_name']; ?></td>
			<td><?php echo $bdDistrict['bd_division_id']; ?></td>
			<td><?php echo $bdDistrict['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bd_districts', 'action' => 'view', $bdDistrict['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bd_districts', 'action' => 'edit', $bdDistrict['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bd_districts', 'action' => 'delete', $bdDistrict['id']), array(), __('Are you sure you want to delete # %s?', $bdDistrict['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bd Upozillas'); ?></h3>
	<?php if (!empty($bdDivision['BdUpozilla'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Bn'); ?></th>
		<th><?php echo __('Division En'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('District Bn'); ?></th>
		<th><?php echo __('District En'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Upozilla Bn'); ?></th>
		<th><?php echo __('Upozilla En'); ?></th>
		<th><?php echo __('Upozillaid'); ?></th>
		<th><?php echo __('Union Bn'); ?></th>
		<th><?php echo __('Union En'); ?></th>
		<th><?php echo __('Unionid'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdDivision['BdUpozilla'] as $bdUpozilla): ?>
		<tr>
			<td><?php echo $bdUpozilla['id']; ?></td>
			<td><?php echo $bdUpozilla['division_bn']; ?></td>
			<td><?php echo $bdUpozilla['division_en']; ?></td>
			<td><?php echo $bdUpozilla['bd_division_id']; ?></td>
			<td><?php echo $bdUpozilla['district_bn']; ?></td>
			<td><?php echo $bdUpozilla['district_en']; ?></td>
			<td><?php echo $bdUpozilla['bd_district_id']; ?></td>
			<td><?php echo $bdUpozilla['upozilla_bn']; ?></td>
			<td><?php echo $bdUpozilla['upozilla_en']; ?></td>
			<td><?php echo $bdUpozilla['upozillaid']; ?></td>
			<td><?php echo $bdUpozilla['union_bn']; ?></td>
			<td><?php echo $bdUpozilla['union_en']; ?></td>
			<td><?php echo $bdUpozilla['unionid']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bd_upozillas', 'action' => 'view', $bdUpozilla['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bd_upozillas', 'action' => 'edit', $bdUpozilla['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bd_upozillas', 'action' => 'delete', $bdUpozilla['id']), array(), __('Are you sure you want to delete # %s?', $bdUpozilla['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Service Data'); ?></h3>
	<?php if (!empty($bdDivision['ServiceData'])): ?>
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
	<?php foreach ($bdDivision['ServiceData'] as $serviceData): ?>
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
