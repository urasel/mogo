<div class="locationImages view">
<h2><?php echo __('Location Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $locationImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($locationImage['LocationImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location Image'), array('action' => 'edit', $locationImage['LocationImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location Image'), array('action' => 'delete', $locationImage['LocationImage']['id']), array(), __('Are you sure you want to delete # %s?', $locationImage['LocationImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
