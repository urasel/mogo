<div class="zones view">
<h2><?php echo __('Zone'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($zone['Country']['name'], array('controller' => 'countries', 'action' => 'view', $zone['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Zone'), array('action' => 'edit', $zone['Zone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Zone'), array('action' => 'delete', $zone['Zone']['id']), array(), __('Are you sure you want to delete # %s?', $zone['Zone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boothes'), array('controller' => 'boothes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Boothe'), array('controller' => 'boothes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holy Places'), array('controller' => 'holy_places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holy Place'), array('controller' => 'holy_places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Boothes'); ?></h3>
	<?php if (!empty($zone['Boothe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bank Id'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Maplocation'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['Boothe'] as $boothe): ?>
		<tr>
			<td><?php echo $boothe['id']; ?></td>
			<td><?php echo $boothe['bank_id']; ?></td>
			<td><?php echo $boothe['location']; ?></td>
			<td><?php echo $boothe['address']; ?></td>
			<td><?php echo $boothe['maplocation']; ?></td>
			<td><?php echo $boothe['country_id']; ?></td>
			<td><?php echo $boothe['zone_id']; ?></td>
			<td><?php echo $boothe['bd_district_id']; ?></td>
			<td><?php echo $boothe['bd_thanas_id']; ?></td>
			<td><?php echo $boothe['lat']; ?></td>
			<td><?php echo $boothe['lng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'boothes', 'action' => 'view', $boothe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'boothes', 'action' => 'edit', $boothe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'boothes', 'action' => 'delete', $boothe['id']), array(), __('Are you sure you want to delete # %s?', $boothe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Boothe'), array('controller' => 'boothes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Holy Places'); ?></h3>
	<?php if (!empty($zone['HolyPlace'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bangla Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Establish'); ?></th>
		<th><?php echo __('Architect'); ?></th>
		<th><?php echo __('Affiliation Id'); ?></th>
		<th><?php echo __('Administration'); ?></th>
		<th><?php echo __('Architectural Style Id'); ?></th>
		<th><?php echo __('History'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Capacity'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['HolyPlace'] as $holyPlace): ?>
		<tr>
			<td><?php echo $holyPlace['id']; ?></td>
			<td><?php echo $holyPlace['name']; ?></td>
			<td><?php echo $holyPlace['bangla_name']; ?></td>
			<td><?php echo $holyPlace['image']; ?></td>
			<td><?php echo $holyPlace['country_id']; ?></td>
			<td><?php echo $holyPlace['zone_id']; ?></td>
			<td><?php echo $holyPlace['bd_district_id']; ?></td>
			<td><?php echo $holyPlace['bd_thanas_id']; ?></td>
			<td><?php echo $holyPlace['address']; ?></td>
			<td><?php echo $holyPlace['location']; ?></td>
			<td><?php echo $holyPlace['details']; ?></td>
			<td><?php echo $holyPlace['establish']; ?></td>
			<td><?php echo $holyPlace['architect']; ?></td>
			<td><?php echo $holyPlace['affiliation_id']; ?></td>
			<td><?php echo $holyPlace['administration']; ?></td>
			<td><?php echo $holyPlace['architectural_style_id']; ?></td>
			<td><?php echo $holyPlace['history']; ?></td>
			<td><?php echo $holyPlace['height']; ?></td>
			<td><?php echo $holyPlace['capacity']; ?></td>
			<td><?php echo $holyPlace['lat']; ?></td>
			<td><?php echo $holyPlace['lng']; ?></td>
			<td><?php echo $holyPlace['status']; ?></td>
			<td><?php echo $holyPlace['created']; ?></td>
			<td><?php echo $holyPlace['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'holy_places', 'action' => 'view', $holyPlace['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'holy_places', 'action' => 'edit', $holyPlace['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'holy_places', 'action' => 'delete', $holyPlace['id']), array(), __('Are you sure you want to delete # %s?', $holyPlace['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Holy Place'), array('controller' => 'holy_places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotels'); ?></h3>
	<?php if (!empty($zone['Hotel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Category Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Facilities'); ?></th>
		<th><?php echo __('Extrafacilities'); ?></th>
		<th><?php echo __('Facilitydata'); ?></th>
		<th><?php echo __('Extrafacilitydata'); ?></th>
		<th><?php echo __('Maplocation'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Policies'); ?></th>
		<th><?php echo __('Check In From'); ?></th>
		<th><?php echo __('Check Out Until'); ?></th>
		<th><?php echo __('Distance From City'); ?></th>
		<th><?php echo __('Number Of Floor'); ?></th>
		<th><?php echo __('Number Of Restaurant'); ?></th>
		<th><?php echo __('Total Rooms'); ?></th>
		<th><?php echo __('Build Year'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['Hotel'] as $hotel): ?>
		<tr>
			<td><?php echo $hotel['id']; ?></td>
			<td><?php echo $hotel['hotel_category_id']; ?></td>
			<td><?php echo $hotel['name']; ?></td>
			<td><?php echo $hotel['image']; ?></td>
			<td><?php echo $hotel['address']; ?></td>
			<td><?php echo $hotel['city']; ?></td>
			<td><?php echo $hotel['country_id']; ?></td>
			<td><?php echo $hotel['zone_id']; ?></td>
			<td><?php echo $hotel['postcode']; ?></td>
			<td><?php echo $hotel['facilities']; ?></td>
			<td><?php echo $hotel['extrafacilities']; ?></td>
			<td><?php echo $hotel['facilitydata']; ?></td>
			<td><?php echo $hotel['extrafacilitydata']; ?></td>
			<td><?php echo $hotel['maplocation']; ?></td>
			<td><?php echo $hotel['description']; ?></td>
			<td><?php echo $hotel['policies']; ?></td>
			<td><?php echo $hotel['check_in_from']; ?></td>
			<td><?php echo $hotel['check_out_until']; ?></td>
			<td><?php echo $hotel['distance_from_city']; ?></td>
			<td><?php echo $hotel['number_of_floor']; ?></td>
			<td><?php echo $hotel['number_of_restaurant']; ?></td>
			<td><?php echo $hotel['total_rooms']; ?></td>
			<td><?php echo $hotel['build_year']; ?></td>
			<td><?php echo $hotel['lat']; ?></td>
			<td><?php echo $hotel['lng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotels', 'action' => 'view', $hotel['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotels', 'action' => 'edit', $hotel['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotels', 'action' => 'delete', $hotel['id']), array(), __('Are you sure you want to delete # %s?', $hotel['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($zone['Place'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Bangla Name'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Establish'); ?></th>
		<th><?php echo __('History'); ?></th>
		<th><?php echo __('Capacity'); ?></th>
		<th><?php echo __('Holiday'); ?></th>
		<th><?php echo __('Hours'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Popular'); ?></th>
		<th><?php echo __('Private'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['Place'] as $place): ?>
		<tr>
			<td><?php echo $place['id']; ?></td>
			<td><?php echo $place['user_id']; ?></td>
			<td><?php echo $place['point_id']; ?></td>
			<td><?php echo $place['name']; ?></td>
			<td><?php echo $place['mobile']; ?></td>
			<td><?php echo $place['fax']; ?></td>
			<td><?php echo $place['email']; ?></td>
			<td><?php echo $place['web']; ?></td>
			<td><?php echo $place['seo_name']; ?></td>
			<td><?php echo $place['keyword']; ?></td>
			<td><?php echo $place['metatag']; ?></td>
			<td><?php echo $place['bangla_name']; ?></td>
			<td><?php echo $place['place_type_id']; ?></td>
			<td><?php echo $place['image']; ?></td>
			<td><?php echo $place['country_id']; ?></td>
			<td><?php echo $place['zone_id']; ?></td>
			<td><?php echo $place['bd_district_id']; ?></td>
			<td><?php echo $place['bd_thanas_id']; ?></td>
			<td><?php echo $place['address']; ?></td>
			<td><?php echo $place['location']; ?></td>
			<td><?php echo $place['details']; ?></td>
			<td><?php echo $place['establish']; ?></td>
			<td><?php echo $place['history']; ?></td>
			<td><?php echo $place['capacity']; ?></td>
			<td><?php echo $place['holiday']; ?></td>
			<td><?php echo $place['hours']; ?></td>
			<td><?php echo $place['lat']; ?></td>
			<td><?php echo $place['lng']; ?></td>
			<td><?php echo $place['status']; ?></td>
			<td><?php echo $place['popular']; ?></td>
			<td><?php echo $place['private']; ?></td>
			<td><?php echo $place['created']; ?></td>
			<td><?php echo $place['updated']; ?></td>
			<td><?php echo $place['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'places', 'action' => 'view', $place['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'places', 'action' => 'edit', $place['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'places', 'action' => 'delete', $place['id']), array(), __('Are you sure you want to delete # %s?', $place['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Points'); ?></h3>
	<?php if (!empty($zone['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Icon'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Map'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Private'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['Point'] as $point): ?>
		<tr>
			<td><?php echo $point['id']; ?></td>
			<td><?php echo $point['name']; ?></td>
			<td><?php echo $point['bn_name']; ?></td>
			<td><?php echo $point['seo_name']; ?></td>
			<td><?php echo $point['country_id']; ?></td>
			<td><?php echo $point['zone_id']; ?></td>
			<td><?php echo $point['bd_district_id']; ?></td>
			<td><?php echo $point['bd_thanas_id']; ?></td>
			<td><?php echo $point['location']; ?></td>
			<td><?php echo $point['address']; ?></td>
			<td><?php echo $point['icon']; ?></td>
			<td><?php echo $point['image']; ?></td>
			<td><?php echo $point['map']; ?></td>
			<td><?php echo $point['place_type_id']; ?></td>
			<td><?php echo $point['contact']; ?></td>
			<td><?php echo $point['email']; ?></td>
			<td><?php echo $point['lat']; ?></td>
			<td><?php echo $point['lng']; ?></td>
			<td><?php echo $point['private']; ?></td>
			<td><?php echo $point['active']; ?></td>
			<td><?php echo $point['created']; ?></td>
			<td><?php echo $point['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'points', 'action' => 'view', $point['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'points', 'action' => 'edit', $point['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'points', 'action' => 'delete', $point['id']), array(), __('Are you sure you want to delete # %s?', $point['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Schools'); ?></h3>
	<?php if (!empty($zone['School'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Syllabus'); ?></th>
		<th><?php echo __('Establish'); ?></th>
		<th><?php echo __('Levels'); ?></th>
		<th><?php echo __('Admission Period'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['School'] as $school): ?>
		<tr>
			<td><?php echo $school['id']; ?></td>
			<td><?php echo $school['country_id']; ?></td>
			<td><?php echo $school['zone_id']; ?></td>
			<td><?php echo $school['bd_district_id']; ?></td>
			<td><?php echo $school['bd_thanas_id']; ?></td>
			<td><?php echo $school['name']; ?></td>
			<td><?php echo $school['location']; ?></td>
			<td><?php echo $school['address']; ?></td>
			<td><?php echo $school['syllabus']; ?></td>
			<td><?php echo $school['establish']; ?></td>
			<td><?php echo $school['levels']; ?></td>
			<td><?php echo $school['admission_period']; ?></td>
			<td><?php echo $school['lat']; ?></td>
			<td><?php echo $school['lng']; ?></td>
			<td><?php echo $school['created']; ?></td>
			<td><?php echo $school['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'schools', 'action' => 'view', $school['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'schools', 'action' => 'edit', $school['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'schools', 'action' => 'delete', $school['id']), array(), __('Are you sure you want to delete # %s?', $school['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
