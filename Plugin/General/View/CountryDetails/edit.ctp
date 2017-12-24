<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Details');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Details'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['CountryDetail']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Country Details') . ': ' . $this->request->data['CountryDetail']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('CountryDetail'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Country Detail'), '#country-detail');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('country-detail');

		echo $this->Form->input('id');

		echo $this->Form->input('user_id', array(
			'label' =>  __d('general', 'User'),
		));
		echo $this->Form->input('update_by', array(
			'label' =>  __d('general', 'Update By'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('general', 'Country'),
		));
		echo $this->Form->input('geography', array(
			'label' =>  __d('general', 'Geography'),
		));
		echo $this->Form->input('bn_geography', array(
			'label' =>  __d('general', 'Bn Geography'),
		));
		echo $this->Form->input('history', array(
			'label' =>  __d('general', 'History'),
		));
		echo $this->Form->input('bn_history', array(
			'label' =>  __d('general', 'Bn History'),
		));
		echo $this->Form->input('map', array(
			'label' =>  __d('general', 'Map'),
		));
		echo $this->Form->input('flag', array(
			'label' =>  __d('general', 'Flag'),
		));
		echo $this->Form->input('president', array(
			'label' =>  __d('general', 'President'),
		));
		echo $this->Form->input('bn_president', array(
			'label' =>  __d('general', 'Bn President'),
		));
		echo $this->Form->input('prime_minister', array(
			'label' =>  __d('general', 'Prime Minister'),
		));
		echo $this->Form->input('bn_prime_minister', array(
			'label' =>  __d('general', 'Bn Prime Minister'),
		));
		echo $this->Form->input('land_area', array(
			'label' =>  __d('general', 'Land Area'),
		));
		echo $this->Form->input('bn_land_area', array(
			'label' =>  __d('general', 'Bn Land Area'),
		));
		echo $this->Form->input('total_area', array(
			'label' =>  __d('general', 'Total Area'),
		));
		echo $this->Form->input('bn_total_area', array(
			'label' =>  __d('general', 'Bn Total Area'),
		));
		echo $this->Form->input('population', array(
			'label' =>  __d('general', 'Population'),
		));
		echo $this->Form->input('bn_population', array(
			'label' =>  __d('general', 'Bn Population'),
		));
		echo $this->Form->input('birth_rate', array(
			'label' =>  __d('general', 'Birth Rate'),
		));
		echo $this->Form->input('bn_birth_rate', array(
			'label' =>  __d('general', 'Bn Birth Rate'),
		));
		echo $this->Form->input('infant_mortality_rate', array(
			'label' =>  __d('general', 'Infant Mortality Rate'),
		));
		echo $this->Form->input('bn_infant_mortality_rate', array(
			'label' =>  __d('general', 'Bn Infant Mortality Rate'),
		));
		echo $this->Form->input('life_expectancy', array(
			'label' =>  __d('general', 'Life Expectancy'),
		));
		echo $this->Form->input('bn_life_expectancy', array(
			'label' =>  __d('general', 'Bn Life Expectancy'),
		));
		echo $this->Form->input('largest_cities', array(
			'label' =>  __d('general', 'Largest Cities'),
		));
		echo $this->Form->input('bn_largest_cities', array(
			'label' =>  __d('general', 'Bn Largest Cities'),
		));
		echo $this->Form->input('national_name', array(
			'label' =>  __d('general', 'National Name'),
		));
		echo $this->Form->input('bn_national_name', array(
			'label' =>  __d('general', 'Bn National Name'),
		));
		echo $this->Form->input('languages', array(
			'label' =>  __d('general', 'Languages'),
		));
		echo $this->Form->input('bn_languages', array(
			'label' =>  __d('general', 'Bn Languages'),
		));
		echo $this->Form->input('national_holiday', array(
			'label' =>  __d('general', 'National Holiday'),
		));
		echo $this->Form->input('bn_national_holiday', array(
			'label' =>  __d('general', 'Bn National Holiday'),
		));
		echo $this->Form->input('religions', array(
			'label' =>  __d('general', 'Religions'),
		));
		echo $this->Form->input('bn_religions', array(
			'label' =>  __d('general', 'Bn Religions'),
		));
		echo $this->Form->input('literacy_rate', array(
			'label' =>  __d('general', 'Literacy Rate'),
		));
		echo $this->Form->input('bn_literacy_rate', array(
			'label' =>  __d('general', 'Bn Literacy Rate'),
		));
		echo $this->Form->input('economic_summary', array(
			'label' =>  __d('general', 'Economic Summary'),
		));
		echo $this->Form->input('bn_economic_summary', array(
			'label' =>  __d('general', 'Bn Economic Summary'),
		));
		echo $this->Form->input('agriculture', array(
			'label' =>  __d('general', 'Agriculture'),
		));
		echo $this->Form->input('bn_agriculture', array(
			'label' =>  __d('general', 'Bn Agriculture'),
		));
		echo $this->Form->input('industries', array(
			'label' =>  __d('general', 'Industries'),
		));
		echo $this->Form->input('bn_industries', array(
			'label' =>  __d('general', 'Bn Industries'),
		));
		echo $this->Form->input('natural_resources', array(
			'label' =>  __d('general', 'Natural Resources'),
		));
		echo $this->Form->input('bn_natural_resources', array(
			'label' =>  __d('general', 'Bn Natural Resources'),
		));
		echo $this->Form->input('exports', array(
			'label' =>  __d('general', 'Exports'),
		));
		echo $this->Form->input('bn_exports', array(
			'label' =>  __d('general', 'Bn Exports'),
		));
		echo $this->Form->input('imports', array(
			'label' =>  __d('general', 'Imports'),
		));
		echo $this->Form->input('bn_imports', array(
			'label' =>  __d('general', 'Bn Imports'),
		));
		echo $this->Form->input('major_trading_partners', array(
			'label' =>  __d('general', 'Major Trading Partners'),
		));
		echo $this->Form->input('bn_major_trading_partners', array(
			'label' =>  __d('general', 'Bn Major Trading Partners'),
		));
		echo $this->Form->input('transportation', array(
			'label' =>  __d('general', 'Transportation'),
		));
		echo $this->Form->input('bn_transportation', array(
			'label' =>  __d('general', 'Bn Transportation'),
		));
		echo $this->Form->input('infosource', array(
			'label' =>  __d('general', 'Infosource'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('general', 'Isactive'),
		));

	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());
