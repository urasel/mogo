<div class="hospitalImages view">
<h2><?php echo __('Hospital Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hospitalImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $hospitalImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($hospitalImage['HospitalImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hospital Image'), array('action' => 'edit', $hospitalImage['HospitalImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hospital Image'), array('action' => 'delete', $hospitalImage['HospitalImage']['id']), array(), __('Are you sure you want to delete # %s?', $hospitalImage['HospitalImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospital Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
