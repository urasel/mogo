<div class="hotelRoomCategories view">
<h2><?php echo __('Hotel Room Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelRoomCategory['HotelRoomCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hotelRoomCategory['HotelRoomCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Room Category'), array('action' => 'edit', $hotelRoomCategory['HotelRoomCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Room Category'), array('action' => 'delete', $hotelRoomCategory['HotelRoomCategory']['id']), array(), __('Are you sure you want to delete # %s?', $hotelRoomCategory['HotelRoomCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Room Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Room Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Rooms'), array('controller' => 'hotel_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Room'), array('controller' => 'hotel_rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Rooms'); ?></h3>
	<?php if (!empty($hotelRoomCategory['HotelRoom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Hotel Room Category Id'); ?></th>
		<th><?php echo __('Room Size'); ?></th>
		<th><?php echo __('Bed'); ?></th>
		<th><?php echo __('Hotel Views'); ?></th>
		<th><?php echo __('Room Features'); ?></th>
		<th><?php echo __('Rules Conditions'); ?></th>
		<th><?php echo __('Offers'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotelRoomCategory['HotelRoom'] as $hotelRoom): ?>
		<tr>
			<td><?php echo $hotelRoom['id']; ?></td>
			<td><?php echo $hotelRoom['hotel_id']; ?></td>
			<td><?php echo $hotelRoom['hotel_room_category_id']; ?></td>
			<td><?php echo $hotelRoom['room_size']; ?></td>
			<td><?php echo $hotelRoom['bed']; ?></td>
			<td><?php echo $hotelRoom['hotel_views']; ?></td>
			<td><?php echo $hotelRoom['room_features']; ?></td>
			<td><?php echo $hotelRoom['rules_conditions']; ?></td>
			<td><?php echo $hotelRoom['offers']; ?></td>
			<td><?php echo $hotelRoom['price']; ?></td>
			<td><?php echo $hotelRoom['number']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotel_rooms', 'action' => 'view', $hotelRoom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotel_rooms', 'action' => 'edit', $hotelRoom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotel_rooms', 'action' => 'delete', $hotelRoom['id']), array(), __('Are you sure you want to delete # %s?', $hotelRoom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Room'), array('controller' => 'hotel_rooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
