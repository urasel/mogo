<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Location Images'), h($locationImage['LocationImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Location Images'), array('action' => 'index'));

if (isset($locationImage['LocationImage']['id'])):
	$this->Html->addCrumb($locationImage['LocationImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Location Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Location Image'), array(
		'action' => 'edit',
		$locationImage['LocationImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Location Image'), array(
		'action' => 'delete', $locationImage['LocationImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $locationImage['LocationImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Location Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Location Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="locationImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $locationImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>