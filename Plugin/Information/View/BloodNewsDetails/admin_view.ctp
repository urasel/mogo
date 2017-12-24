<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Blood News Details'), h($bloodNewsDetail['BloodNewsDetail']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Blood News Details'), array('action' => 'index'));

if (isset($bloodNewsDetail['BloodNewsDetail']['id'])):
	$this->Html->addCrumb($bloodNewsDetail['BloodNewsDetail']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Blood News Detail'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Blood News Detail'), array(
		'action' => 'edit',
		$bloodNewsDetail['BloodNewsDetail']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Blood News Detail'), array(
		'action' => 'delete', $bloodNewsDetail['BloodNewsDetail']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bloodNewsDetail['BloodNewsDetail']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood News Details'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood News Detail'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood News'), array('controller' => 'blood_news', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood News'), array('controller' => 'blood_news', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bloodNewsDetails view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNewsDetail['Language']['title'], array('controller' => 'languages', 'action' => 'view', $bloodNewsDetail['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Blood News'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNewsDetail['BloodNews']['id'], array('controller' => 'blood_news', 'action' => 'view', $bloodNewsDetail['BloodNews']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>