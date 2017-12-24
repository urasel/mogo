<div class="transportGalleries view">
<h2><?php echo __('Transport Gallery'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportGallery['TransportRoute']['id'], array('controller' => 'transport_routes', 'action' => 'view', $transportGallery['TransportRoute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Gallery'), array('action' => 'edit', $transportGallery['TransportGallery']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Gallery'), array('action' => 'delete', $transportGallery['TransportGallery']['id']), array(), __('Are you sure you want to delete # %s?', $transportGallery['TransportGallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Galleries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Gallery'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
