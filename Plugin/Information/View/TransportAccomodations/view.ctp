<div class="transportAccomodations view">
<h2><?php echo __('Transport Accomodation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportRoute']['name'], array('controller' => 'transport_routes', 'action' => 'view', $transportAccomodation['TransportRoute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportAccomodation['TransportClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportAccomodation['TransportService']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Images'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['images']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transport Accomodation'), array('action' => 'edit', $transportAccomodation['TransportAccomodation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transport Accomodation'), array('action' => 'delete', $transportAccomodation['TransportAccomodation']['id']), array(), __('Are you sure you want to delete # %s?', $transportAccomodation['TransportAccomodation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Accomodations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Accomodation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transport Services'), array('controller' => 'transport_services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transport Service'), array('controller' => 'transport_services', 'action' => 'add')); ?> </li>
	</ul>
</div>
