<div class="prizes view">
<h2><?php echo __('Prize'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prize['Point']['name'], array('controller' => 'points', 'action' => 'view', $prize['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($prize['Prize']['logo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prize'), array('action' => 'edit', $prize['Prize']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prize'), array('action' => 'delete', $prize['Prize']['id']), array(), __('Are you sure you want to delete # %s?', $prize['Prize']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prizes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prize'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
