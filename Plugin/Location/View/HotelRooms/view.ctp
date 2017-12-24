<div class="hotelRooms view">
<h2><?php echo __('Hotel Room'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRoom['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $hotelRoom['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel Room Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRoom['HotelRoomCategory']['name'], array('controller' => 'hotel_room_categories', 'action' => 'view', $hotelRoom['HotelRoomCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Size'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['room_size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bed'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['bed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel Views'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['hotel_views']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Features'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['room_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rules Conditions'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['rules_conditions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Offers'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['offers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['number']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Room'), array('action' => 'edit', $hotelRoom['HotelRoom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Room'), array('action' => 'delete', $hotelRoom['HotelRoom']['id']), array(), __('Are you sure you want to delete # %s?', $hotelRoom['HotelRoom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Room Categories'), array('controller' => 'hotel_room_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Room Category'), array('controller' => 'hotel_room_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
