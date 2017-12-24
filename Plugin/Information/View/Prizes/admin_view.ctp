<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Prizes'), h($prize['Prize']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Prizes'), array('action' => 'index'));

if (isset($prize['Prize']['name'])):
	$this->Html->addCrumb($prize['Prize']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Prize'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Prize'), array(
		'action' => 'edit',
		$prize['Prize']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Prize'), array(
		'action' => 'delete', $prize['Prize']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $prize['Prize']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Prizes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Prize'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="prizes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prize['Point']['name'], array('controller' => 'points', 'action' => 'view', $prize['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Logo'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['logo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>