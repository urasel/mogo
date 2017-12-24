<div class="hotels view">
<h2><?php echo __('Hotel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['HotelCategory']['name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Country']['name'], array('controller' => 'countries', 'action' => 'view', $hotel['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $hotel['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facilities'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['facilities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extrafacilities'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['extrafacilities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facilitydata'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['facilitydata']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extrafacilitydata'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['extrafacilitydata']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maplocation'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['maplocation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policies'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['policies']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check In From'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_in_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check Out Until'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_out_until']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance From City'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['distance_from_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number Of Floor'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['number_of_floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number Of Restaurant'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['number_of_restaurant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Rooms'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['total_rooms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Build Year'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['build_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['lng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel'), array('action' => 'edit', $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel'), array('action' => 'delete', $hotel['Hotel']['id']), array(), __('Are you sure you want to delete # %s?', $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('controller' => 'hotel_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('controller' => 'hotel_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Details'), array('controller' => 'hotel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Images'), array('controller' => 'hotel_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Image'), array('controller' => 'hotel_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Rooms'), array('controller' => 'hotel_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Room'), array('controller' => 'hotel_rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Details'); ?></h3>
	<?php if (!empty($hotel['HotelDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Hotel Facility Id'); ?></th>
		<th><?php echo __('Hotel Extra Facility Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotel['HotelDetail'] as $hotelDetail): ?>
		<tr>
			<td><?php echo $hotelDetail['id']; ?></td>
			<td><?php echo $hotelDetail['hotel_id']; ?></td>
			<td><?php echo $hotelDetail['hotel_facility_id']; ?></td>
			<td><?php echo $hotelDetail['hotel_extra_facility_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotel_details', 'action' => 'view', $hotelDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotel_details', 'action' => 'edit', $hotelDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotel_details', 'action' => 'delete', $hotelDetail['id']), array(), __('Are you sure you want to delete # %s?', $hotelDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Images'); ?></h3>
	<?php if (!empty($hotel['HotelImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotel['HotelImage'] as $hotelImage): ?>
		<tr>
			<td><?php echo $hotelImage['id']; ?></td>
			<td><?php echo $hotelImage['hotel_id']; ?></td>
			<td><?php echo $hotelImage['file']; ?></td>
			<td><?php echo $hotelImage['location']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotel_images', 'action' => 'view', $hotelImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotel_images', 'action' => 'edit', $hotelImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotel_images', 'action' => 'delete', $hotelImage['id']), array(), __('Are you sure you want to delete # %s?', $hotelImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Image'), array('controller' => 'hotel_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Rooms'); ?></h3>
	<?php if (!empty($hotel['HotelRoom'])): ?>
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
	<?php foreach ($hotel['HotelRoom'] as $hotelRoom): ?>
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
