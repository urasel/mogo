<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Doctors'), h($doctor['Doctor']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Doctors'), array('action' => 'index'));

if (isset($doctor['Doctor']['name'])):
	$this->Html->addCrumb($doctor['Doctor']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Doctor'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Doctor'), array(
		'action' => 'edit',
		$doctor['Doctor']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Doctor'), array(
		'action' => 'delete', $doctor['Doctor']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $doctor['Doctor']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospitals'), array('controller' => 'hospitals', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital'), array('controller' => 'hospitals', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Sexes'), array('controller' => 'sexes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Sex'), array('controller' => 'sexes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Religions'), array('controller' => 'religions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Religion'), array('controller' => 'religions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctor Specializations'), array('controller' => 'doctor_specializations', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor Specialization'), array('controller' => 'doctor_specializations', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctor Expertises'), array('controller' => 'doctor_expertises', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor Expertise'), array('controller' => 'doctor_expertises', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="doctors view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Point']['name'], array('controller' => 'points', 'action' => 'view', $doctor['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hospital'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Hospital']['name'], array('controller' => 'hospitals', 'action' => 'view', $doctor['Hospital']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hospitalids'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['hospitalids']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Dob'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $doctor['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Religion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Religion']['name'], array('controller' => 'religions', 'action' => 'view', $doctor['Religion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Qualification'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['qualification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Degree'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['degree']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Doctor Specialization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['DoctorSpecialization']['name'], array('controller' => 'doctor_specializations', 'action' => 'view', $doctor['DoctorSpecialization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Doctor Expertise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['DoctorExpertise']['name'], array('controller' => 'doctor_expertises', 'action' => 'view', $doctor['DoctorExpertise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Expertiseids'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['expertiseids']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Designation'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Chamber'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['chamber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>