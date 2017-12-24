<div class="bloodDonars index">
	<h2><?php echo __('Blood Donars'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('blood_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sex_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile_number'); ?></th>
			<th><?php echo $this->Paginator->sort('land_line_number'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zone_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_division_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_thanas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('permanent_address'); ?></th>
			<th><?php echo $this->Paginator->sort('availability_status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bloodDonars as $bloodDonar): ?>
	<tr>
		<td><?php echo h($bloodDonar['BloodDonar']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['User']['name'], array('controller' => 'users', 'action' => 'view', $bloodDonar['User']['id'])); ?>
		</td>
		<td><?php echo h($bloodDonar['BloodDonar']['name']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['bn_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['BloodGroup']['name'], array('controller' => 'blood_groups', 'action' => 'view', $bloodDonar['BloodGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $bloodDonar['Sex']['id'])); ?>
		</td>
		<td><?php echo h($bloodDonar['BloodDonar']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['mobile_number']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['land_line_number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['Country']['title'], array('controller' => 'countries', 'action' => 'view', $bloodDonar['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $bloodDonar['Zone']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bloodDonar['BdDivision']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bloodDonar['BdDistrict']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodDonar['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bloodDonar['BdThanas']['id'])); ?>
		</td>
		<td><?php echo h($bloodDonar['BloodDonar']['permanent_address']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['availability_status']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['created']); ?>&nbsp;</td>
		<td><?php echo h($bloodDonar['BloodDonar']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bloodDonar['BloodDonar']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bloodDonar['BloodDonar']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bloodDonar['BloodDonar']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bloodDonar['BloodDonar']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blood Donar'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Groups'), array('controller' => 'blood_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Group'), array('controller' => 'blood_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Donation Records'), array('controller' => 'blood_donation_records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Donation Record'), array('controller' => 'blood_donation_records', 'action' => 'add')); ?> </li>
	</ul>
</div>
