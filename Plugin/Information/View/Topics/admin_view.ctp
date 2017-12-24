<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Topics'), h($topic['Topic']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Topics'), array('action' => 'index'));

if (isset($topic['Topic']['id'])):
	$this->Html->addCrumb($topic['Topic']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Topic'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Topic'), array(
		'action' => 'edit',
		$topic['Topic']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Topic'), array(
		'action' => 'delete', $topic['Topic']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $topic['Topic']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Topics'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Data'), array('controller' => 'place_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Data'), array('controller' => 'place_data', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Topic Data'), array('controller' => 'topic_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic Data'), array('controller' => 'topic_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="topics view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['User']['name'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['Point']['name'], array('controller' => 'points', 'action' => 'view', $topic['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($topic['Topic']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($topic['Topic']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Popular'); ?></dt>
		<dd>
			<?php echo $this->Html->status($topic['Topic']['popular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo $this->Html->status($topic['Topic']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Verifiedby'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['verifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Reviewedby'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['reviewedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>