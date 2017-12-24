<div class="instituteImages view">
<h2><?php echo __('Institute Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instituteImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $instituteImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($instituteImage['InstituteImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Institute Image'), array('action' => 'edit', $instituteImage['InstituteImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Institute Image'), array('action' => 'delete', $instituteImage['InstituteImage']['id']), array(), __('Are you sure you want to delete # %s?', $instituteImage['InstituteImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Institute Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
