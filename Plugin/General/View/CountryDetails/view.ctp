<div class="countryDetails view">
<h2><?php echo __('Country Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDetail['User']['name'], array('controller' => 'users', 'action' => 'view', $countryDetail['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Update By'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['update_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDetail['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryDetail['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geography'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['geography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Geography'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_geography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('History'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn History'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flag'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('President'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['president']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn President'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_president']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prime Minister'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['prime_minister']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Prime Minister'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_prime_minister']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['land_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Land Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_land_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['total_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Total Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_total_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Population'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['birth_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Birth Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_birth_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infant Mortality Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['infant_mortality_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Infant Mortality Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_infant_mortality_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Life Expectancy'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['life_expectancy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Life Expectancy'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_life_expectancy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Largest Cities'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['largest_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Largest Cities'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_largest_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('National Name'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['national_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn National Name'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_national_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Languages'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['languages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Languages'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_languages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('National Holiday'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['national_holiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn National Holiday'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_national_holiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Religions'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['religions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Religions'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_religions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Literacy Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['literacy_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Literacy Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_literacy_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Economic Summary'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['economic_summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Economic Summary'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_economic_summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agriculture'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['agriculture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Agriculture'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_agriculture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industries'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['industries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Industries'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_industries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Natural Resources'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['natural_resources']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Natural Resources'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_natural_resources']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['exports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Exports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_exports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['imports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Imports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_imports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Trading Partners'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['major_trading_partners']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Major Trading Partners'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_major_trading_partners']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transportation'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['transportation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Transportation'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_transportation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infosource'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['infosource']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Detail'), array('action' => 'edit', $countryDetail['CountryDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Detail'), array('action' => 'delete', $countryDetail['CountryDetail']['id']), array(), __('Are you sure you want to delete # %s?', $countryDetail['CountryDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
