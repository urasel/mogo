<div class="countryDetails index">
	<h2><?php echo __('Country Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('update_by'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('geography'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_geography'); ?></th>
			<th><?php echo $this->Paginator->sort('history'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_history'); ?></th>
			<th><?php echo $this->Paginator->sort('map'); ?></th>
			<th><?php echo $this->Paginator->sort('flag'); ?></th>
			<th><?php echo $this->Paginator->sort('president'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_president'); ?></th>
			<th><?php echo $this->Paginator->sort('prime_minister'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_prime_minister'); ?></th>
			<th><?php echo $this->Paginator->sort('land_area'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_land_area'); ?></th>
			<th><?php echo $this->Paginator->sort('total_area'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_total_area'); ?></th>
			<th><?php echo $this->Paginator->sort('population'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_population'); ?></th>
			<th><?php echo $this->Paginator->sort('birth_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_birth_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('infant_mortality_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_infant_mortality_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('life_expectancy'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_life_expectancy'); ?></th>
			<th><?php echo $this->Paginator->sort('largest_cities'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_largest_cities'); ?></th>
			<th><?php echo $this->Paginator->sort('national_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_national_name'); ?></th>
			<th><?php echo $this->Paginator->sort('languages'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_languages'); ?></th>
			<th><?php echo $this->Paginator->sort('national_holiday'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_national_holiday'); ?></th>
			<th><?php echo $this->Paginator->sort('religions'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_religions'); ?></th>
			<th><?php echo $this->Paginator->sort('literacy_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_literacy_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('economic_summary'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_economic_summary'); ?></th>
			<th><?php echo $this->Paginator->sort('agriculture'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_agriculture'); ?></th>
			<th><?php echo $this->Paginator->sort('industries'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_industries'); ?></th>
			<th><?php echo $this->Paginator->sort('natural_resources'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_natural_resources'); ?></th>
			<th><?php echo $this->Paginator->sort('exports'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_exports'); ?></th>
			<th><?php echo $this->Paginator->sort('imports'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_imports'); ?></th>
			<th><?php echo $this->Paginator->sort('major_trading_partners'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_major_trading_partners'); ?></th>
			<th><?php echo $this->Paginator->sort('transportation'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_transportation'); ?></th>
			<th><?php echo $this->Paginator->sort('infosource'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countryDetails as $countryDetail): ?>
	<tr>
		<td><?php echo h($countryDetail['CountryDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryDetail['User']['name'], array('controller' => 'users', 'action' => 'view', $countryDetail['User']['id'])); ?>
		</td>
		<td><?php echo h($countryDetail['CountryDetail']['update_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryDetail['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryDetail['Country']['id'])); ?>
		</td>
		<td><?php echo h($countryDetail['CountryDetail']['geography']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_geography']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['history']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_history']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['map']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['flag']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['president']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_president']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['prime_minister']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_prime_minister']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['land_area']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_land_area']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['total_area']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_total_area']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['population']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_population']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['birth_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_birth_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['infant_mortality_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_infant_mortality_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['life_expectancy']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_life_expectancy']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['largest_cities']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_largest_cities']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['national_name']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_national_name']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['languages']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_languages']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['national_holiday']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_national_holiday']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['religions']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_religions']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['literacy_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_literacy_rate']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['economic_summary']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_economic_summary']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['agriculture']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_agriculture']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['industries']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_industries']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['natural_resources']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_natural_resources']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['exports']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_exports']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['imports']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_imports']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['major_trading_partners']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_major_trading_partners']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['transportation']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['bn_transportation']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['infosource']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['updated']); ?>&nbsp;</td>
		<td><?php echo h($countryDetail['CountryDetail']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $countryDetail['CountryDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $countryDetail['CountryDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $countryDetail['CountryDetail']['id']), array(), __('Are you sure you want to delete # %s?', $countryDetail['CountryDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
