<div class="transportStopages view">
<h2><?php echo __('Transport Stopage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportStopage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportStopage['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportStopage['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Address'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Stopage'), array('action' => 'edit', $transportStopage['TransportStopage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Stopage'), array('action' => 'delete', $transportStopage['TransportStopage']['id']), array(), __('Are you sure you want to delete # %s?', $transportStopage['TransportStopage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Stopages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Stopage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Types'), array('controller' => 'transport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Type'), array('controller' => 'transport_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
