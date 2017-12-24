<div class="bloodNewsDetails view">
<h2><?php echo __('Blood News Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNewsDetail['Language']['title'], array('controller' => 'languages', 'action' => 'view', $bloodNewsDetail['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood News'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bloodNewsDetail['BloodNews']['id'], array('controller' => 'blood_news', 'action' => 'view', $bloodNewsDetail['BloodNews']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($bloodNewsDetail['BloodNewsDetail']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blood News Detail'), array('action' => 'edit', $bloodNewsDetail['BloodNewsDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blood News Detail'), array('action' => 'delete', $bloodNewsDetail['BloodNewsDetail']['id']), array(), __('Are you sure you want to delete # %s?', $bloodNewsDetail['BloodNewsDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood News Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood News Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood News'), array('controller' => 'blood_news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood News'), array('controller' => 'blood_news', 'action' => 'add')); ?> </li>
	</ul>
</div>
