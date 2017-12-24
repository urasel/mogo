<div class="countries view">
<h2><?php echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Continent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($country['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $country['Continent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso Code 2'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso Code 3'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($country['Country']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), array(), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Continents'), array('controller' => 'continents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Continent'), array('controller' => 'continents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banks'), array('controller' => 'banks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank'), array('controller' => 'banks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boothes'), array('controller' => 'boothes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Boothe'), array('controller' => 'boothes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Calling Codes'), array('controller' => 'country_calling_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Calling Code'), array('controller' => 'country_calling_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Capitals'), array('controller' => 'country_capitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Capital'), array('controller' => 'country_capitals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Cities'), array('controller' => 'country_cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country City'), array('controller' => 'country_cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Currencies'), array('controller' => 'country_currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Currency'), array('controller' => 'country_currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Domains'), array('controller' => 'country_domains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Domain'), array('controller' => 'country_domains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Timezones'), array('controller' => 'country_timezones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Timezone'), array('controller' => 'country_timezones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holy Places'), array('controller' => 'holy_places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holy Place'), array('controller' => 'holy_places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postcodes'), array('controller' => 'postcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postcode'), array('controller' => 'postcodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Banks'); ?></h3>
	<?php if (!empty($country['Bank'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Bank'] as $bank): ?>
		<tr>
			<td><?php echo $bank['id']; ?></td>
			<td><?php echo $bank['name']; ?></td>
			<td><?php echo $bank['address']; ?></td>
			<td><?php echo $bank['country_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'banks', 'action' => 'view', $bank['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'banks', 'action' => 'edit', $bank['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'banks', 'action' => 'delete', $bank['id']), array(), __('Are you sure you want to delete # %s?', $bank['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bank'), array('controller' => 'banks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Boothes'); ?></h3>
	<?php if (!empty($country['Boothe'])): ?>
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
	<?php foreach ($country['Boothe'] as $boothe): ?>
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
	<h3><?php echo __('Related Country Calling Codes'); ?></h3>
	<?php if (!empty($country['CountryCallingCode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Calling Code'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Exit Prefix Idd'); ?></th>
		<th><?php echo __('National Prefix Ndd'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryCallingCode'] as $countryCallingCode): ?>
		<tr>
			<td><?php echo $countryCallingCode['id']; ?></td>
			<td><?php echo $countryCallingCode['calling_code']; ?></td>
			<td><?php echo $countryCallingCode['country']; ?></td>
			<td><?php echo $countryCallingCode['country_id']; ?></td>
			<td><?php echo $countryCallingCode['exit_prefix_idd']; ?></td>
			<td><?php echo $countryCallingCode['national_prefix_ndd']; ?></td>
			<td><?php echo $countryCallingCode['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_calling_codes', 'action' => 'view', $countryCallingCode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_calling_codes', 'action' => 'edit', $countryCallingCode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_calling_codes', 'action' => 'delete', $countryCallingCode['id']), array(), __('Are you sure you want to delete # %s?', $countryCallingCode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Calling Code'), array('controller' => 'country_calling_codes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Country Capitals'); ?></h3>
	<?php if (!empty($country['CountryCapital'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryCapital'] as $countryCapital): ?>
		<tr>
			<td><?php echo $countryCapital['id']; ?></td>
			<td><?php echo $countryCapital['country']; ?></td>
			<td><?php echo $countryCapital['country_id']; ?></td>
			<td><?php echo $countryCapital['name']; ?></td>
			<td><?php echo $countryCapital['bn_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_capitals', 'action' => 'view', $countryCapital['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_capitals', 'action' => 'edit', $countryCapital['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_capitals', 'action' => 'delete', $countryCapital['id']), array(), __('Are you sure you want to delete # %s?', $countryCapital['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Capital'), array('controller' => 'country_capitals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Country Cities'); ?></h3>
	<?php if (!empty($country['CountryCity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryCity'] as $countryCity): ?>
		<tr>
			<td><?php echo $countryCity['id']; ?></td>
			<td><?php echo $countryCity['country_id']; ?></td>
			<td><?php echo $countryCity['name']; ?></td>
			<td><?php echo $countryCity['bn_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_cities', 'action' => 'view', $countryCity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_cities', 'action' => 'edit', $countryCity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_cities', 'action' => 'delete', $countryCity['id']), array(), __('Are you sure you want to delete # %s?', $countryCity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country City'), array('controller' => 'country_cities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Country Currencies'); ?></h3>
	<?php if (!empty($country['CountryCurrency'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Iso 4217'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryCurrency'] as $countryCurrency): ?>
		<tr>
			<td><?php echo $countryCurrency['id']; ?></td>
			<td><?php echo $countryCurrency['country']; ?></td>
			<td><?php echo $countryCurrency['country_id']; ?></td>
			<td><?php echo $countryCurrency['name']; ?></td>
			<td><?php echo $countryCurrency['bn_name']; ?></td>
			<td><?php echo $countryCurrency['iso_4217']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_currencies', 'action' => 'view', $countryCurrency['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_currencies', 'action' => 'edit', $countryCurrency['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_currencies', 'action' => 'delete', $countryCurrency['id']), array(), __('Are you sure you want to delete # %s?', $countryCurrency['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Currency'), array('controller' => 'country_currencies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Country Domains'); ?></h3>
	<?php if (!empty($country['CountryDomain'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Sitecountry'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryDomain'] as $countryDomain): ?>
		<tr>
			<td><?php echo $countryDomain['id']; ?></td>
			<td><?php echo $countryDomain['name']; ?></td>
			<td><?php echo $countryDomain['country']; ?></td>
			<td><?php echo $countryDomain['sitecountry']; ?></td>
			<td><?php echo $countryDomain['country_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_domains', 'action' => 'view', $countryDomain['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_domains', 'action' => 'edit', $countryDomain['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_domains', 'action' => 'delete', $countryDomain['id']), array(), __('Are you sure you want to delete # %s?', $countryDomain['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Domain'), array('controller' => 'country_domains', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Country Timezones'); ?></h3>
	<?php if (!empty($country['CountryTimezone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Utc'); ?></th>
		<th><?php echo __('Dst'); ?></th>
		<th><?php echo __('Dst Period Start End'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['CountryTimezone'] as $countryTimezone): ?>
		<tr>
			<td><?php echo $countryTimezone['id']; ?></td>
			<td><?php echo $countryTimezone['country']; ?></td>
			<td><?php echo $countryTimezone['country_id']; ?></td>
			<td><?php echo $countryTimezone['utc']; ?></td>
			<td><?php echo $countryTimezone['dst']; ?></td>
			<td><?php echo $countryTimezone['dst_period_start_end']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_timezones', 'action' => 'view', $countryTimezone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_timezones', 'action' => 'edit', $countryTimezone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_timezones', 'action' => 'delete', $countryTimezone['id']), array(), __('Are you sure you want to delete # %s?', $countryTimezone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Timezone'), array('controller' => 'country_timezones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Holy Places'); ?></h3>
	<?php if (!empty($country['HolyPlace'])): ?>
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
	<?php foreach ($country['HolyPlace'] as $holyPlace): ?>
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
	<?php if (!empty($country['Hotel'])): ?>
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
	<?php foreach ($country['Hotel'] as $hotel): ?>
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
	<?php if (!empty($country['Place'])): ?>
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
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
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
	<?php foreach ($country['Place'] as $place): ?>
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
			<td><?php echo $place['bn_name']; ?></td>
			<td><?php echo $place['place_type_id']; ?></td>
			<td><?php echo $place['image']; ?></td>
			<td><?php echo $place['country_id']; ?></td>
			<td><?php echo $place['zone_id']; ?></td>
			<td><?php echo $place['bd_division_id']; ?></td>
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
	<?php if (!empty($country['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
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
	<?php foreach ($country['Point'] as $point): ?>
		<tr>
			<td><?php echo $point['id']; ?></td>
			<td><?php echo $point['name']; ?></td>
			<td><?php echo $point['bn_name']; ?></td>
			<td><?php echo $point['seo_name']; ?></td>
			<td><?php echo $point['country_id']; ?></td>
			<td><?php echo $point['zone_id']; ?></td>
			<td><?php echo $point['bd_division_id']; ?></td>
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
	<h3><?php echo __('Related Postcodes'); ?></h3>
	<?php if (!empty($country['Postcode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Divisions'); ?></th>
		<th><?php echo __('Bd Division Id'); ?></th>
		<th><?php echo __('Districts'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Thanas'); ?></th>
		<th><?php echo __('Newthanas'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Post Code'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Postcode'] as $postcode): ?>
		<tr>
			<td><?php echo $postcode['id']; ?></td>
			<td><?php echo $postcode['place_type_id']; ?></td>
			<td><?php echo $postcode['point_id']; ?></td>
			<td><?php echo $postcode['user_id']; ?></td>
			<td><?php echo $postcode['country_id']; ?></td>
			<td><?php echo $postcode['divisions']; ?></td>
			<td><?php echo $postcode['bd_division_id']; ?></td>
			<td><?php echo $postcode['districts']; ?></td>
			<td><?php echo $postcode['bd_district_id']; ?></td>
			<td><?php echo $postcode['thanas']; ?></td>
			<td><?php echo $postcode['newthanas']; ?></td>
			<td><?php echo $postcode['bd_thanas_id']; ?></td>
			<td><?php echo $postcode['name']; ?></td>
			<td><?php echo $postcode['title']; ?></td>
			<td><?php echo $postcode['seo_name']; ?></td>
			<td><?php echo $postcode['metatag']; ?></td>
			<td><?php echo $postcode['post_code']; ?></td>
			<td><?php echo $postcode['address']; ?></td>
			<td><?php echo $postcode['web']; ?></td>
			<td><?php echo $postcode['mobile']; ?></td>
			<td><?php echo $postcode['email']; ?></td>
			<td><?php echo $postcode['lat']; ?></td>
			<td><?php echo $postcode['lng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'postcodes', 'action' => 'view', $postcode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'postcodes', 'action' => 'edit', $postcode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'postcodes', 'action' => 'delete', $postcode['id']), array(), __('Are you sure you want to delete # %s?', $postcode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Postcode'), array('controller' => 'postcodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Profiles'); ?></h3>
	<?php if (!empty($country['Profile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Profile Name'); ?></th>
		<th><?php echo __('About'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Businesstype Id'); ?></th>
		<th><?php echo __('Companyname'); ?></th>
		<th><?php echo __('Factorypicture'); ?></th>
		<th><?php echo __('Product'); ?></th>
		<th><?php echo __('Registrationaddress'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Registrationnumber'); ?></th>
		<th><?php echo __('Registrationdate'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Birth Date'); ?></th>
		<th><?php echo __('Profile Picture'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Profile'] as $profile): ?>
		<tr>
			<td><?php echo $profile['id']; ?></td>
			<td><?php echo $profile['user_id']; ?></td>
			<td><?php echo $profile['profile_name']; ?></td>
			<td><?php echo $profile['about']; ?></td>
			<td><?php echo $profile['logo']; ?></td>
			<td><?php echo $profile['businesstype_id']; ?></td>
			<td><?php echo $profile['companyname']; ?></td>
			<td><?php echo $profile['factorypicture']; ?></td>
			<td><?php echo $profile['product']; ?></td>
			<td><?php echo $profile['registrationaddress']; ?></td>
			<td><?php echo $profile['url']; ?></td>
			<td><?php echo $profile['registrationnumber']; ?></td>
			<td><?php echo $profile['registrationdate']; ?></td>
			<td><?php echo $profile['phone_number']; ?></td>
			<td><?php echo $profile['country_id']; ?></td>
			<td><?php echo $profile['birth_date']; ?></td>
			<td><?php echo $profile['profile_picture']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'profiles', 'action' => 'view', $profile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'profiles', 'action' => 'edit', $profile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profiles', 'action' => 'delete', $profile['id']), array(), __('Are you sure you want to delete # %s?', $profile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Schools'); ?></h3>
	<?php if (!empty($country['School'])): ?>
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
	<?php foreach ($country['School'] as $school): ?>
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
	<h3><?php echo __('Related Zones'); ?></h3>
	<?php if (!empty($country['Zone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Zone'] as $zone): ?>
		<tr>
			<td><?php echo $zone['id']; ?></td>
			<td><?php echo $zone['country_id']; ?></td>
			<td><?php echo $zone['name']; ?></td>
			<td><?php echo $zone['code']; ?></td>
			<td><?php echo $zone['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'zones', 'action' => 'view', $zone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'zones', 'action' => 'edit', $zone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'zones', 'action' => 'delete', $zone['id']), array(), __('Are you sure you want to delete # %s?', $zone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
