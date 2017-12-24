<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Blood Donars'), h($bloodDonar['BloodDonar']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Blood Donars'), array('action' => 'index'));

if (isset($bloodDonar['BloodDonar']['name'])):
	$this->Html->addCrumb($bloodDonar['BloodDonar']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Blood Donar'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Blood Donar'), array(
		'action' => 'edit',
		$bloodDonar['BloodDonar']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Blood Donar'), array(
		'action' => 'delete', $bloodDonar['BloodDonar']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bloodDonar['BloodDonar']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Donars'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Donar'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Groups'), array('controller' => 'blood_groups', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Group'), array('controller' => 'blood_groups', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Sexes'), array('controller' => 'sexes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Sex'), array('controller' => 'sexes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('controller' => 'zones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('controller' => 'zones', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Donation Records'), array('controller' => 'blood_donation_records', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Donation Record'), array('controller' => 'blood_donation_records', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bloodDonars view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['User']['name'], array('controller' => 'users', 'action' => 'view', $bloodDonar['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Blood Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BloodGroup']['name'], array('controller' => 'blood_groups', 'action' => 'view', $bloodDonar['BloodGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $bloodDonar['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile Number'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['mobile_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Land Line Number'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['land_line_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Country']['title'], array('controller' => 'countries', 'action' => 'view', $bloodDonar['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $bloodDonar['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bloodDonar['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bloodDonar['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodDonar['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bloodDonar['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Permanent Address'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['permanent_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Availability Status'); ?></dt>
		<dd>
			<?php echo h($bloodDonar['BloodDonar']['availability_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodDonar['BloodDonar']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodDonar['BloodDonar']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>