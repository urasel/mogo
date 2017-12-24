<?php
$this->viewVars['title_for_layout'] = __d('general', 'Continents');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Continents'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Continent']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Continents') . ': ' . $this->request->data['Continent']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Continent'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Continent'), '#continent');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('continent');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('general', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('general', 'Place Type'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('general', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('general', 'Bn Name'),
		));
		echo $this->Form->input('title', array(
			'label' =>  __d('general', 'Title'),
		));
		echo $this->Form->input('bn_title', array(
			'label' =>  __d('general', 'Bn Title'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('general', 'Seo Name'),
		));
		echo $this->Form->input('area', array(
			'label' =>  __d('general', 'Area'),
		));
		echo $this->Form->input('population', array(
			'label' =>  __d('general', 'Population'),
		));
		echo $this->Form->input('countries', array(
			'label' =>  __d('general', 'Countries'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('general', 'Details'),
		));
		echo $this->Form->input('bn_details', array(
			'label' =>  __d('general', 'Bn Details'),
		));
		echo $this->Form->input('ranking', array(
			'label' =>  __d('general', 'Ranking'),
		));
		echo $this->Form->input('major_biomes', array(
			'label' =>  __d('general', 'Major Biomes'),
		));
		echo $this->Form->input('bn_major_biomes', array(
			'label' =>  __d('general', 'Bn Major Biomes'),
		));
		echo $this->Form->input('major_cities', array(
			'label' =>  __d('general', 'Major Cities'),
		));
		echo $this->Form->input('bn_major_cities', array(
			'label' =>  __d('general', 'Bn Major Cities'),
		));
		echo $this->Form->input('bordering_bodies_of_water', array(
			'label' =>  __d('general', 'Bordering Bodies Of Water'),
		));
		echo $this->Form->input('bn_bordering_bodies_of_water', array(
			'label' =>  __d('general', 'Bn Bordering Bodies Of Water'),
		));
		echo $this->Form->input('major_rivers_and_lakes', array(
			'label' =>  __d('general', 'Major Rivers And Lakes'),
		));
		echo $this->Form->input('bn_major_rivers_and_lakes', array(
			'label' =>  __d('general', 'Bn Major Rivers And Lakes'),
		));
		echo $this->Form->input('major_geographical_features', array(
			'label' =>  __d('general', 'Major Geographical Features'),
		));
		echo $this->Form->input('bn_major_geographical_features', array(
			'label' =>  __d('general', 'Bn Major Geographical Features'),
		));
		echo $this->Form->input('facts_about_asia', array(
			'label' =>  __d('general', 'Facts About Asia'),
		));
		echo $this->Form->input('bn_facts_about_asia', array(
			'label' =>  __d('general', 'Bn Facts About Asia'),
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
