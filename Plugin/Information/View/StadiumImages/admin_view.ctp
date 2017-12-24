<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Stadium Images'), h($stadiumImage['StadiumImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Stadium Images'), array('action' => 'index'));

if (isset($stadiumImage['StadiumImage']['id'])):
	$this->Html->addCrumb($stadiumImage['StadiumImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Stadium Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Stadium Image'), array(
		'action' => 'edit',
		$stadiumImage['StadiumImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Stadium Image'), array(
		'action' => 'delete', $stadiumImage['StadiumImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $stadiumImage['StadiumImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Stadium Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Stadium Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="stadiumImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $stadiumImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>