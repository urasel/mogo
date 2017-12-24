<div class="airportImages view">
<h2><?php echo __('Airport Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $airportImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Airport Image'), array('action' => 'edit', $airportImage['AirportImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Airport Image'), array('action' => 'delete', $airportImage['AirportImage']['id']), array(), __('Are you sure you want to delete # %s?', $airportImage['AirportImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Airport Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
