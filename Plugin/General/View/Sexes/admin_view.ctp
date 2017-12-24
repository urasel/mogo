<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Sexes'), h($sex['Sex']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Sexes'), array('action' => 'index'));

if (isset($sex['Sex']['name'])):
	$this->Html->addCrumb($sex['Sex']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Sex'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Sex'), array(
		'action' => 'edit',
		$sex['Sex']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Sex'), array(
		'action' => 'delete', $sex['Sex']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $sex['Sex']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Sexes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Sex'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="sexes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($sex['Sex']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($sex['Sex']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Icon'); ?></dt>
		<dd>
			<?php echo h($sex['Sex']['icon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>