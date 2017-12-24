<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Subscriber Lists'), h($subscriberList['SubscriberList']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Subscriber Lists'), array('action' => 'index'));

if (isset($subscriberList['SubscriberList']['name'])):
	$this->Html->addCrumb($subscriberList['SubscriberList']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Subscriber List'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Subscriber List'), array(
		'action' => 'edit',
		$subscriberList['SubscriberList']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Subscriber List'), array(
		'action' => 'delete', $subscriberList['SubscriberList']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $subscriberList['SubscriberList']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Subscriber Lists'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Subscriber List'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Sexes'), array('controller' => 'sexes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Sex'), array('controller' => 'sexes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="subscriberLists view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subscriberList['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $subscriberList['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Dob'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($subscriberList['SubscriberList']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($subscriberList['SubscriberList']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($subscriberList['SubscriberList']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>