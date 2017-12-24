<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Details'), h($countryDetail['CountryDetail']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Details'), array('action' => 'index'));

if (isset($countryDetail['CountryDetail']['id'])):
	$this->Html->addCrumb($countryDetail['CountryDetail']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Detail'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Detail'), array(
		'action' => 'edit',
		$countryDetail['CountryDetail']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Detail'), array(
		'action' => 'delete', $countryDetail['CountryDetail']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryDetail['CountryDetail']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Details'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Detail'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryDetails view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDetail['User']['name'], array('controller' => 'users', 'action' => 'view', $countryDetail['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Update By'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['update_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDetail['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryDetail['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Geography'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['geography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Geography'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_geography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'History'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn History'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Map'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Flag'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'President'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['president']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn President'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_president']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Prime Minister'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['prime_minister']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Prime Minister'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_prime_minister']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Land Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['land_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Land Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_land_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Total Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['total_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Total Area'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_total_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Population'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Population'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Birth Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['birth_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Birth Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_birth_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Infant Mortality Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['infant_mortality_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Infant Mortality Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_infant_mortality_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Life Expectancy'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['life_expectancy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Life Expectancy'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_life_expectancy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Largest Cities'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['largest_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Largest Cities'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_largest_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'National Name'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['national_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn National Name'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_national_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Languages'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['languages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Languages'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_languages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'National Holiday'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['national_holiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn National Holiday'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_national_holiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Religions'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['religions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Religions'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_religions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Literacy Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['literacy_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Literacy Rate'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_literacy_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Economic Summary'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['economic_summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Economic Summary'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_economic_summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Agriculture'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['agriculture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Agriculture'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_agriculture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Industries'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['industries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Industries'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_industries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Natural Resources'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['natural_resources']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Natural Resources'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_natural_resources']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Exports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['exports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Exports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_exports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Imports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['imports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Imports'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_imports']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Major Trading Partners'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['major_trading_partners']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Major Trading Partners'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_major_trading_partners']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transportation'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['transportation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Transportation'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['bn_transportation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Infosource'); ?></dt>
		<dd>
			<?php echo h($countryDetail['CountryDetail']['infosource']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($countryDetail['CountryDetail']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($countryDetail['CountryDetail']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($countryDetail['CountryDetail']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>