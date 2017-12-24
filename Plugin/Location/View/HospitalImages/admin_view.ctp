<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hospital Images'), h($hospitalImage['HospitalImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hospital Images'), array('action' => 'index'));

if (isset($hospitalImage['HospitalImage']['id'])):
	$this->Html->addCrumb($hospitalImage['HospitalImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hospital Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hospital Image'), array(
		'action' => 'edit',
		$hospitalImage['HospitalImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hospital Image'), array(
		'action' => 'delete', $hospitalImage['HospitalImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hospitalImage['HospitalImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospital Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hospitalImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hospitalImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $hospitalImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>