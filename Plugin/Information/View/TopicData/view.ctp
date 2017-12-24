<div class="topicData view">
<h2><?php echo __('Topic Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topicData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $topicData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topicData['Topic']['id'], array('controller' => 'topics', 'action' => 'view', $topicData['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($topicData['TopicData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Topic Data'), array('action' => 'edit', $topicData['TopicData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Topic Data'), array('action' => 'delete', $topicData['TopicData']['id']), array(), __('Are you sure you want to delete # %s?', $topicData['TopicData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Topic Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>
