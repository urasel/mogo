<div class="hotels index">
	<h2><?php echo __('Hotels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('hotel_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zone_id'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('facilities'); ?></th>
			<th><?php echo $this->Paginator->sort('extrafacilities'); ?></th>
			<th><?php echo $this->Paginator->sort('facilitydata'); ?></th>
			<th><?php echo $this->Paginator->sort('extrafacilitydata'); ?></th>
			<th><?php echo $this->Paginator->sort('maplocation'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('policies'); ?></th>
			<th><?php echo $this->Paginator->sort('check_in_from'); ?></th>
			<th><?php echo $this->Paginator->sort('check_out_until'); ?></th>
			<th><?php echo $this->Paginator->sort('distance_from_city'); ?></th>
			<th><?php echo $this->Paginator->sort('number_of_floor'); ?></th>
			<th><?php echo $this->Paginator->sort('number_of_restaurant'); ?></th>
			<th><?php echo $this->Paginator->sort('total_rooms'); ?></th>
			<th><?php echo $this->Paginator->sort('build_year'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($hotels as $hotel): ?>
	<tr>
		<td><?php echo h($hotel['Hotel']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotel['HotelCategory']['name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
		</td>
		<td><?php echo h($hotel['Hotel']['name']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['image']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['address']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotel['Country']['name'], array('controller' => 'countries', 'action' => 'view', $hotel['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($hotel['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $hotel['Zone']['id'])); ?>
		</td>
		<td><?php echo h($hotel['Hotel']['postcode']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['facilities']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['extrafacilities']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['facilitydata']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['extrafacilitydata']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['maplocation']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['description']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['policies']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['check_in_from']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['check_out_until']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['distance_from_city']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['number_of_floor']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['number_of_restaurant']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['total_rooms']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['build_year']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['lat']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['lng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hotel['Hotel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hotel['Hotel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hotel['Hotel']['id']), array(), __('Are you sure you want to delete # %s?', $hotel['Hotel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Hotel'), array('action' => 'add')); ?></li>
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
