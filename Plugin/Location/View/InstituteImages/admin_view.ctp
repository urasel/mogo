<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Institute Images'), h($instituteImage['InstituteImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Institute Images'), array('action' => 'index'));

if (isset($instituteImage['InstituteImage']['id'])):
	$this->Html->addCrumb($instituteImage['InstituteImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Institute Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Institute Image'), array(
		'action' => 'edit',
		$instituteImage['InstituteImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Institute Image'), array(
		'action' => 'delete', $instituteImage['InstituteImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $instituteImage['InstituteImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Institute Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Institute Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="instituteImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instituteImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $instituteImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>