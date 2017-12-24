<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Professional Studies'), h($professionalStudy['ProfessionalStudy']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Professional Studies'), array('action' => 'index'));

if (isset($professionalStudy['ProfessionalStudy']['name'])):
	$this->Html->addCrumb($professionalStudy['ProfessionalStudy']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Professional Study'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Professional Study'), array(
		'action' => 'edit',
		$professionalStudy['ProfessionalStudy']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Professional Study'), array(
		'action' => 'delete', $professionalStudy['ProfessionalStudy']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $professionalStudy['ProfessionalStudy']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Professional Studies'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Professional Study'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Professional Educations'), array('controller' => 'professional_educations', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Professional Education'), array('controller' => 'professional_educations', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="professionalStudies view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($professionalStudy['ProfessionalStudy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($professionalStudy['ProfessionalStudy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($professionalStudy['ProfessionalStudy']['details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>