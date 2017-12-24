<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Stadium Data'), h($stadiumData['StadiumData']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Stadium Data'), array('action' => 'index'));

if (isset($stadiumData['StadiumData']['name'])):
	$this->Html->addCrumb($stadiumData['StadiumData']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Stadium Data'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Stadium Data'), array(
		'action' => 'edit',
		$stadiumData['StadiumData']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Stadium Data'), array(
		'action' => 'delete', $stadiumData['StadiumData']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $stadiumData['StadiumData']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Stadium Data'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Stadium Data'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Stadia'), array('controller' => 'stadia', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Stadium'), array('controller' => 'stadia', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="stadiumData view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $stadiumData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Stadium'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumData['Stadium']['name'], array('controller' => 'stadia', 'action' => 'view', $stadiumData['Stadium']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Description'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>