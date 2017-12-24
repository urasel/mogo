<div class="subscriberLists view">
<h2><?php echo __('Subscriber List'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subscriberList['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $subscriberList['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($subscriberList['SubscriberList']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subscriber List'), array('action' => 'edit', $subscriberList['SubscriberList']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subscriber List'), array('action' => 'delete', $subscriberList['SubscriberList']['id']), array(), __('Are you sure you want to delete # %s?', $subscriberList['SubscriberList']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscriber Lists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscriber List'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
	</ul>
</div>
