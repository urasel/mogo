<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Update Informations'), h($updateInformation['UpdateInformation']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Update Informations'), array('action' => 'index'));

if (isset($updateInformation['UpdateInformation']['id'])):
	$this->Html->addCrumb($updateInformation['UpdateInformation']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Update Information'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Update Information'), array(
		'action' => 'edit',
		$updateInformation['UpdateInformation']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Update Information'), array(
		'action' => 'delete', $updateInformation['UpdateInformation']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $updateInformation['UpdateInformation']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Update Informations'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Update Information'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="updateInformations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Itemid'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['itemid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($updateInformation['User']['name'], array('controller' => 'users', 'action' => 'view', $updateInformation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Classname'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['classname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Feedback'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['feedback']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($updateInformation['UpdateInformation']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($updateInformation['UpdateInformation']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Verifiedby'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['verifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($updateInformation['UpdateInformation']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>