<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Topic Data'), h($topicData['TopicData']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Topic Data'), array('action' => 'index'));

if (isset($topicData['TopicData']['name'])):
	$this->Html->addCrumb($topicData['TopicData']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Topic Data'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Topic Data'), array(
		'action' => 'edit',
		$topicData['TopicData']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Topic Data'), array(
		'action' => 'delete', $topicData['TopicData']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $topicData['TopicData']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Topic Data'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic Data'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Topics'), array('controller' => 'topics', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic'), array('controller' => 'topics', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="topicData view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topicData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $topicData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topicData['Topic']['id'], array('controller' => 'topics', 'action' => 'view', $topicData['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Description'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>