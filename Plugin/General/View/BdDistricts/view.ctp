<div class="bdDistricts view">
<h2><?php echo __('Bd District'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdDistrict['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdDistrict['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bd District'), array('action' => 'edit', $bdDistrict['BdDistrict']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bd District'), array('action' => 'delete', $bdDistrict['BdDistrict']['id']), array(), __('Are you sure you want to delete # %s?', $bdDistrict['BdDistrict']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thana'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Upozillas'), array('controller' => 'bd_upozillas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boothes'), array('controller' => 'boothes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Boothe'), array('controller' => 'boothes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holy Places'), array('controller' => 'holy_places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holy Place'), array('controller' => 'holy_places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Data'), array('controller' => 'service_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bd Thanas'); ?></h3>
	<?php if (!empty($bdDistrict['BdThana'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdDistrict['BdThana'] as $bdThana): ?>
		<tr>
			<td><?php echo $bdThana['id']; ?></td>
			<td><?php echo $bdThana['name']; ?></td>
			<td><?php echo $bdThana['bn_name']; ?></td>
			<td><?php echo $bdThana['bd_district_id']; ?></td>
			<td><?php echo $bdThana['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bd_thanas', 'action' => 'view', $bdThana['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bd_thanas', 'action' => 'edit', $bdThana['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bd_thanas', 'action' => 'delete', $bdThana['id']), array(), __('Are you sure you want to delete # %s?', $bdThana['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bd Thana'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bd Upozillas'); ?></h3>
	<?php if (!empty($bdDistrict['BdUpozilla'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Bn'); ?></th>
		<th><?php echo __('Division En'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('District Bn'); ?></th>
		<th><?php echo __('District En'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Upozilla Bn'); ?></th>
		<th><?php echo __('Upozilla En'); ?></th>
		<th><?php echo __('Upozillaid'); ?></th>
		<th><?php echo __('Union Bn'); ?></th>
		<th><?php echo __('Union En'); ?></th>
		<th><?php echo __('Unionid'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdDistrict['BdUpozilla'] as $bdUpozilla): ?>
		<tr>
			<td><?php echo $bdUpozilla['id']; ?></td>
			<td><?php echo $bdUpozilla['division_bn']; ?></td>
			<td><?php echo $bdUpozilla['division_en']; ?></td>
			<td><?php echo $bdUpozilla['bd_division_id']; ?></td>
			<td><?php echo $bdUpozilla['district_bn']; ?></td>
			<td><?php echo $bdUpozilla['district_en']; ?></td>
			<td><?php echo $bdUpozilla['bd_district_id']; ?></td>
			<td><?php echo $bdUpozilla['upozilla_bn']; ?></td>
			<td><?php echo $bdUpozilla['upozilla_en']; ?></td>
			<td><?php echo $bdUpozilla['upozillaid']; ?></td>
			<td><?php echo $bdUpozilla['union_bn']; ?></td>
			<td><?php echo $bdUpozilla['union_en']; ?></td>
			<td><?php echo $bdUpozilla['unionid']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bd_upozillas', 'action' => 'view', $bdUpozilla['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bd_upozillas', 'action' => 'edit', $bdUpozilla['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bd_upozillas', 'action' => 'delete', $bdUpozilla['id']), array(), __('Are you sure you want to delete # %s?', $bdUpozilla['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Boothes'); ?></h3>
	<?php if (!empty($bdDistrict['Boothe'])): ?>
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
	<?php foreach ($bdDistrict['Boothe'] as $boothe): ?>
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
	<?php if (!empty($bdDistrict['HolyPlace'])): ?>
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
	<?php foreach ($bdDistrict['HolyPlace'] as $holyPlace): ?>
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
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($bdDistrict['Place'])): ?>
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
	<?php foreach ($bdDistrict['Place'] as $place): ?>
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
	<?php if (!empty($bdDistrict['Point'])): ?>
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
	<?php foreach ($bdDistrict['Point'] as $point): ?>
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
	<?php if (!empty($bdDistrict['School'])): ?>
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
	<?php foreach ($bdDistrict['School'] as $school): ?>
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
<div class="related">
	<h3><?php echo __('Related Service Data'); ?></h3>
	<?php if (!empty($bdDistrict['ServiceData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usi'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Spclocation'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Bd Thana Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bdDistrict['ServiceData'] as $serviceData): ?>
		<tr>
			<td><?php echo $serviceData['id']; ?></td>
			<td><?php echo $serviceData['usi']; ?></td>
			<td><?php echo $serviceData['title']; ?></td>
			<td><?php echo $serviceData['details']; ?></td>
			<td><?php echo $serviceData['price']; ?></td>
			<td><?php echo $serviceData['spclocation']; ?></td>
			<td><?php echo $serviceData['type']; ?></td>
			<td><?php echo $serviceData['category']; ?></td>
			<td><?php echo $serviceData['filename']; ?></td>
			<td><?php echo $serviceData['email']; ?></td>
			<td><?php echo $serviceData['phone']; ?></td>
			<td><?php echo $serviceData['bd_thana_id']; ?></td>
			<td><?php echo $serviceData['bd_district_id']; ?></td>
			<td><?php echo $serviceData['bd_division_id']; ?></td>
			<td><?php echo $serviceData['country']; ?></td>
			<td><?php echo $serviceData['isactive']; ?></td>
			<td><?php echo $serviceData['created']; ?></td>
			<td><?php echo $serviceData['updated']; ?></td>
			<td><?php echo $serviceData['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'service_data', 'action' => 'view', $serviceData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'service_data', 'action' => 'edit', $serviceData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'service_data', 'action' => 'delete', $serviceData['id']), array(), __('Are you sure you want to delete # %s?', $serviceData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
