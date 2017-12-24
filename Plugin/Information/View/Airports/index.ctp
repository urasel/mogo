<div class="airports index">
	<h2><?php echo __('Airports'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ident'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('airport_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('elevation_ft'); ?></th>
			<th><?php echo $this->Paginator->sort('continent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('iso_region'); ?></th>
			<th><?php echo $this->Paginator->sort('municipality'); ?></th>
			<th><?php echo $this->Paginator->sort('scheduled_service'); ?></th>
			<th><?php echo $this->Paginator->sort('gps_code'); ?></th>
			<th><?php echo $this->Paginator->sort('iata_code'); ?></th>
			<th><?php echo $this->Paginator->sort('local_code'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($airports as $airport): ?>
	<tr>
		<td><?php echo h($airport['Airport']['id']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['ident']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($airport['Point']['name'], array('controller' => 'points', 'action' => 'view', $airport['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($airport['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $airport['PlaceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($airport['AirportType']['name'], array('controller' => 'airport_types', 'action' => 'view', $airport['AirportType']['id'])); ?>
		</td>
		<td><?php echo h($airport['Airport']['name']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['lat']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['lng']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['address']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['elevation_ft']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($airport['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $airport['Continent']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($airport['Country']['name'], array('controller' => 'countries', 'action' => 'view', $airport['Country']['id'])); ?>
		</td>
		<td><?php echo h($airport['Airport']['iso_region']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['municipality']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['scheduled_service']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['gps_code']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['iata_code']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['local_code']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['web']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['email']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['image']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['keywords']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $airport['Airport']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $airport['Airport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $airport['Airport']['id']), array(), __('Are you sure you want to delete # %s?', $airport['Airport']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Airport'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Airport Types'), array('controller' => 'airport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport Type'), array('controller' => 'airport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Continents'), array('controller' => 'continents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Continent'), array('controller' => 'continents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
