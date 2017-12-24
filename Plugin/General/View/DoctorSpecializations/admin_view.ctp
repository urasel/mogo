<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Doctor Specializations'), h($doctorSpecialization['DoctorSpecialization']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Doctor Specializations'), array('action' => 'index'));

if (isset($doctorSpecialization['DoctorSpecialization']['name'])):
	$this->Html->addCrumb($doctorSpecialization['DoctorSpecialization']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Doctor Specialization'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Doctor Specialization'), array(
		'action' => 'edit',
		$doctorSpecialization['DoctorSpecialization']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Doctor Specialization'), array(
		'action' => 'delete', $doctorSpecialization['DoctorSpecialization']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $doctorSpecialization['DoctorSpecialization']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctor Specializations'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor Specialization'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="doctorSpecializations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($doctorSpecialization['DoctorSpecialization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($doctorSpecialization['DoctorSpecialization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($doctorSpecialization['DoctorSpecialization']['details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>