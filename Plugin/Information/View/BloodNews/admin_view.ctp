<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Blood News'), h($bloodNews['BloodNews']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Blood News'), array('action' => 'index'));

if (isset($bloodNews['BloodNews']['id'])):
	$this->Html->addCrumb($bloodNews['BloodNews']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Blood News'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Blood News'), array(
		'action' => 'edit',
		$bloodNews['BloodNews']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Blood News'), array(
		'action' => 'delete', $bloodNews['BloodNews']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bloodNews['BloodNews']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood News'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood News'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Groups'), array('controller' => 'blood_groups', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Group'), array('controller' => 'blood_groups', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bloodNews view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bloodNews['BloodNews']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Blood Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNews['BloodGroup']['name'], array('controller' => 'blood_groups', 'action' => 'view', $bloodNews['BloodGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Required Date'); ?></dt>
		<dd>
			<?php echo h($bloodNews['BloodNews']['required_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Quantity'); ?></dt>
		<dd>
			<?php echo h($bloodNews['BloodNews']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($bloodNews['BloodNews']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodNews['BloodNews']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($bloodNews['BloodNews']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNews['User']['name'], array('controller' => 'users', 'action' => 'view', $bloodNews['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($bloodNews['BloodNews']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>