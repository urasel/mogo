<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Blood Donation Records'), h($bloodDonationRecord['BloodDonationRecord']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Blood Donation Records'), array('action' => 'index'));

if (isset($bloodDonationRecord['BloodDonationRecord']['id'])):
	$this->Html->addCrumb($bloodDonationRecord['BloodDonationRecord']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Blood Donation Record'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Blood Donation Record'), array(
		'action' => 'edit',
		$bloodDonationRecord['BloodDonationRecord']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Blood Donation Record'), array(
		'action' => 'delete', $bloodDonationRecord['BloodDonationRecord']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bloodDonationRecord['BloodDonationRecord']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Donation Records'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Donation Record'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Donars'), array('controller' => 'blood_donars', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Donar'), array('controller' => 'blood_donars', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bloodDonationRecords view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Blood Donar'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonationRecord['BloodDonar']['name'], array('controller' => 'blood_donars', 'action' => 'view', $bloodDonationRecord['BloodDonar']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Patient Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bag'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['bag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Donation Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodDonationRecord['BloodDonationRecord']['donation_date'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hospital'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['hospital']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Patient Phone'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Patient Address'); ?></dt>
		<dd>
			<?php echo h($bloodDonationRecord['BloodDonationRecord']['patient_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodDonationRecord['BloodDonationRecord']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodDonationRecord['BloodDonationRecord']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($bloodDonationRecord['BloodDonationRecord']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>