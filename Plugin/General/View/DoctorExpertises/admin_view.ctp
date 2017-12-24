<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Doctor Expertises'), h($doctorExpertise['DoctorExpertise']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Doctor Expertises'), array('action' => 'index'));

if (isset($doctorExpertise['DoctorExpertise']['name'])):
	$this->Html->addCrumb($doctorExpertise['DoctorExpertise']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Doctor Expertise'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Doctor Expertise'), array(
		'action' => 'edit',
		$doctorExpertise['DoctorExpertise']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Doctor Expertise'), array(
		'action' => 'delete', $doctorExpertise['DoctorExpertise']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $doctorExpertise['DoctorExpertise']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctor Expertises'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor Expertise'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="doctorExpertises view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($doctorExpertise['DoctorExpertise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($doctorExpertise['DoctorExpertise']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Expertise Details'); ?></dt>
		<dd>
			<?php echo h($doctorExpertise['DoctorExpertise']['expertise_details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>