<div class="hotelExtraFacilities view">
<h2><?php echo __('Hotel Extra Facility'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelExtraFacility['HotelExtraFacility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hotelExtraFacility['HotelExtraFacility']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Extra Facility'), array('action' => 'edit', $hotelExtraFacility['HotelExtraFacility']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Extra Facility'), array('action' => 'delete', $hotelExtraFacility['HotelExtraFacility']['id']), array(), __('Are you sure you want to delete # %s?', $hotelExtraFacility['HotelExtraFacility']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Extra Facilities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Extra Facility'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Details'), array('controller' => 'hotel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Details'); ?></h3>
	<?php if (!empty($hotelExtraFacility['HotelDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Hotel Facility Id'); ?></th>
		<th><?php echo __('Hotel Extra Facility Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotelExtraFacility['HotelDetail'] as $hotelDetail): ?>
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
