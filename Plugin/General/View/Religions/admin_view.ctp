<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Religions'), h($religion['Religion']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Religions'), array('action' => 'index'));

if (isset($religion['Religion']['name'])):
	$this->Html->addCrumb($religion['Religion']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Religion'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Religion'), array(
		'action' => 'edit',
		$religion['Religion']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Religion'), array(
		'action' => 'delete', $religion['Religion']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $religion['Religion']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Religions'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Religion'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="religions view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Icon'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($religion['Religion']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>