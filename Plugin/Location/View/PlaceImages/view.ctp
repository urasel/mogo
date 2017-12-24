<div class="placeImages view">
<h2><?php echo __('Place Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $placeImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Image'), array('action' => 'edit', $placeImage['PlaceImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Image'), array('action' => 'delete', $placeImage['PlaceImage']['id']), array(), __('Are you sure you want to delete # %s?', $placeImage['PlaceImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
