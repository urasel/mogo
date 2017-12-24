<div class="bloodDonars view">
<h2><?php echo __('Blood Donar'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['User']['name'], array('controller' => 'users', 'action' => 'view', $bloodDonar['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BloodGroup']['name'], array('controller' => 'blood_groups', 'action' => 'view', $bloodDonar['BloodGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $bloodDonar['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile Number'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['mobile_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Line Number'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['land_line_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Country']['title'], array('controller' => 'countries', 'action' => 'view', $bloodDonar['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $bloodDonar['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bloodDonar['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bloodDonar['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bloodDonar['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permanent Address'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['permanent_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Availability Status'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['availability_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blood Donar'), array('action' => 'edit', $bloodDonar['BloodDonar']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blood Donar'), array('action' => 'delete', $bloodDonar['BloodDonar']['id']), array(), __('Are you sure you want to delete # %s?', $bloodDonar['BloodDonar']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Donars'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Donar'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Blood Donation Records'); ?></h3>
	<?php if (!empty($bloodDonar['BloodDonationRecord'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Blood Donar Id'); ?></th>
		<th><?php echo __('Patient Name'); ?></th>
		<th><?php echo __('Bag'); ?></th>
		<th><?php echo __('Donation Date'); ?></th>
		<th><?php echo __('Hospital'); ?></th>
		<th><?php echo __('Patient Phone'); ?></th>
		<th><?php echo __('Patient Address'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bloodDonar['BloodDonationRecord'] as $bloodDonationRecord): ?>
		<tr>
			<td><?php echo $bloodDonationRecord['id']; ?></td>
			<td><?php echo $bloodDonationRecord['blood_donar_id']; ?></td>
			<td><?php echo $bloodDonationRecord['patient_name']; ?></td>
			<td><?php echo $bloodDonationRecord['bag']; ?></td>
			<td><?php echo $bloodDonationRecord['donation_date']; ?></td>
			<td><?php echo $bloodDonationRecord['hospital']; ?></td>
			<td><?php echo $bloodDonationRecord['patient_phone']; ?></td>
			<td><?php echo $bloodDonationRecord['patient_address']; ?></td>
			<td><?php echo $bloodDonationRecord['created']; ?></td>
			<td><?php echo $bloodDonationRecord['updated']; ?></td>
			<td><?php echo $bloodDonationRecord['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'blood_donation_records', 'action' => 'view', $bloodDonationRecord['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'blood_donation_records', 'action' => 'edit', $bloodDonationRecord['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'blood_donation_records', 'action' => 'delete', $bloodDonationRecord['id']), array(), __('Are you sure you want to delete # %s?', $bloodDonationRecord['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Blood Donation Record'), array('controller' => 'blood_donation_records', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
