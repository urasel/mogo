<div class="countries index">
	<h2><?php echo __('Countries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('continent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('iso_code_2'); ?></th>
			<th><?php echo $this->Paginator->sort('iso_code_3'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countries as $country): ?>
	<tr>
		<td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($country['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $country['Continent']['id'])); ?>
		</td>
		<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['iso_code_2']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['iso_code_3']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $country['Country']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['id']), array(), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?></li>
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
