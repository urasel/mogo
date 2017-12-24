<div class="bloodDonationRecords view">
<h2><?php echo __('Blood Donation Record'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood Donar'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonationRecord['BloodDonar']['name'], array('controller' => 'blood_donars', 'action' => 'view', $bloodDonationRecord['BloodDonar']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bag'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['bag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donation Date'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['donation_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospital'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['hospital']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Phone'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Address'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blood Donation Record'), array('action' => 'edit', $bloodDonationRecord['BloodDonationRecord']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blood Donation Record'), array('action' => 'delete', $bloodDonationRecord['BloodDonationRecord']['id']), array(), __('Are you sure you want to delete # %s?', $bloodDonationRecord['BloodDonationRecord']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Donation Records'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Donation Record'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Donars'), array('controller' => 'blood_donars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Donar'), array('controller' => 'blood_donars', 'action' => 'add')); ?> </li>
	</ul>
</div>
