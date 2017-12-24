<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Professional Degrees'), h($professionalDegree['ProfessionalDegree']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Professional Degrees'), array('action' => 'index'));

if (isset($professionalDegree['ProfessionalDegree']['name'])):
	$this->Html->addCrumb($professionalDegree['ProfessionalDegree']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Professional Degree'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Professional Degree'), array(
		'action' => 'edit',
		$professionalDegree['ProfessionalDegree']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Professional Degree'), array(
		'action' => 'delete', $professionalDegree['ProfessionalDegree']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $professionalDegree['ProfessionalDegree']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Professional Degrees'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Professional Degree'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Professional Educations'), array('controller' => 'professional_educations', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Professional Education'), array('controller' => 'professional_educations', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="professionalDegrees view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($professionalDegree['ProfessionalDegree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($professionalDegree['ProfessionalDegree']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>