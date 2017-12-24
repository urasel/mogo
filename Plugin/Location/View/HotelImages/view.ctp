<div class="hotelImages view">
<h2><?php echo __('Hotel Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelImage['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $hotelImage['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['location']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Image'), array('action' => 'edit', $hotelImage['HotelImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Image'), array('action' => 'delete', $hotelImage['HotelImage']['id']), array(), __('Are you sure you want to delete # %s?', $hotelImage['HotelImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	</ul>
</div>
