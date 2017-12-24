<?php
$this->viewVars['title_for_layout'] = __d('information', 'Locations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Locations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Location']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Locations') . ': ' . $this->request->data['Location']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Location'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Location'), '#location');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('location');

		echo $this->Form->input('id');

		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('area1', array(
			'label' =>  __d('information', 'Area1'),
		));
		echo $this->Form->input('area2', array(
			'label' =>  __d('information', 'Area2'),
		));
		echo $this->Form->input('area3', array(
			'label' =>  __d('information', 'Area3'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('population', array(
			'label' =>  __d('information', 'Population'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('information', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('information', 'Lng'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('northeast_lat', array(
			'label' =>  __d('information', 'Northeast Lat'),
		));
		echo $this->Form->input('northeast_lng', array(
			'label' =>  __d('information', 'Northeast Lng'),
		));
		echo $this->Form->input('southwest_lat', array(
			'label' =>  __d('information', 'Southwest Lat'),
		));
		echo $this->Form->input('southwest_lng', array(
			'label' =>  __d('information', 'Southwest Lng'),
		));
		echo $this->Form->input('updateflag', array(
			'label' =>  __d('information', 'Updateflag'),
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
