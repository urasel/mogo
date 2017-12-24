<div class="airportTypes view">
<h2><?php echo __('Airport Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($airportType['AirportType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($airportType['AirportType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($airportType['AirportType']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Airport Type'), array('action' => 'edit', $airportType['AirportType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Airport Type'), array('action' => 'delete', $airportType['AirportType']['id']), array(), __('Are you sure you want to delete # %s?', $airportType['AirportType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Airport Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Airports'), array('controller' => 'country_airports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Airport'), array('controller' => 'country_airports', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Country Airports'); ?></h3>
	<?php if (!empty($airportType['CountryAirport'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ident'); ?></th>
		<th><?php echo __('Airport Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Elevation Ft'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Iso Region'); ?></th>
		<th><?php echo __('Municipality'); ?></th>
		<th><?php echo __('Scheduled Service'); ?></th>
		<th><?php echo __('Gps Code'); ?></th>
		<th><?php echo __('Iata Code'); ?></th>
		<th><?php echo __('Local Code'); ?></th>
		<th><?php echo __('Home Link'); ?></th>
		<th><?php echo __('Wikipedia Link'); ?></th>
		<th><?php echo __('Keywords'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($airportType['CountryAirport'] as $countryAirport): ?>
		<tr>
			<td><?php echo $countryAirport['id']; ?></td>
			<td><?php echo $countryAirport['ident']; ?></td>
			<td><?php echo $countryAirport['airport_type_id']; ?></td>
			<td><?php echo $countryAirport['name']; ?></td>
			<td><?php echo $countryAirport['seo_name']; ?></td>
			<td><?php echo $countryAirport['lat']; ?></td>
			<td><?php echo $countryAirport['lng']; ?></td>
			<td><?php echo $countryAirport['address']; ?></td>
			<td><?php echo $countryAirport['elevation_ft']; ?></td>
			<td><?php echo $countryAirport['country_id']; ?></td>
			<td><?php echo $countryAirport['iso_region']; ?></td>
			<td><?php echo $countryAirport['municipality']; ?></td>
			<td><?php echo $countryAirport['scheduled_service']; ?></td>
			<td><?php echo $countryAirport['gps_code']; ?></td>
			<td><?php echo $countryAirport['iata_code']; ?></td>
			<td><?php echo $countryAirport['local_code']; ?></td>
			<td><?php echo $countryAirport['home_link']; ?></td>
			<td><?php echo $countryAirport['wikipedia_link']; ?></td>
			<td><?php echo $countryAirport['keywords']; ?></td>
			<td><?php echo $countryAirport['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'country_airports', 'action' => 'view', $countryAirport['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'country_airports', 'action' => 'edit', $countryAirport['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'country_airports', 'action' => 'delete', $countryAirport['id']), array(), __('Are you sure you want to delete # %s?', $countryAirport['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Country Airport'), array('controller' => 'country_airports', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
