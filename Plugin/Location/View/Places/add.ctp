<?php
$this->viewVars['title_for_layout'] = __d('location', 'Places');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Places'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Place']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Places') . ': ' . $this->request->data['Place']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Place'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Place'), '#place');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place');

		echo $this->Form->input('id');

		echo $this->Form->input('user_id', array(
			'label' =>  __d('location', 'User'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('location', 'Point'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('location', 'Name'),
		));
		echo $this->Form->input('mobile', array(
			'label' =>  __d('location', 'Mobile'),
		));
		echo $this->Form->input('fax', array(
			'label' =>  __d('location', 'Fax'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('location', 'Email'),
		));
		echo $this->Form->input('web', array(
			'label' =>  __d('location', 'Web'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('location', 'Seo Name'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('location', 'Keyword'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('location', 'Metatag'),
		));
		echo $this->Form->input('bangla_name', array(
			'label' =>  __d('location', 'Bangla Name'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('location', 'Place Type'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('location', 'Image'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('location', 'Country'),
		));
		echo $this->Form->input('zone_id', array(
			'label' =>  __d('location', 'Zone'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('location', 'Bd District'),
		));
		echo $this->Form->input('bd_thanas_id', array(
			'label' =>  __d('location', 'Bd Thanas'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('location', 'Address'),
		));
		echo $this->Form->input('location', array(
			'label' =>  __d('location', 'Location'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('location', 'Details'),
		));
		echo $this->Form->input('establish', array(
			'label' =>  __d('location', 'Establish'),
		));
		echo $this->Form->input('history', array(
			'label' =>  __d('location', 'History'),
		));
		echo $this->Form->input('capacity', array(
			'label' =>  __d('location', 'Capacity'),
		));
		echo $this->Form->input('holiday', array(
			'label' =>  __d('location', 'Holiday'),
		));
		echo $this->Form->input('hours', array(
			'label' =>  __d('location', 'Hours'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('location', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('location', 'Lng'),
		));
		echo $this->Form->input('status', array(
			'label' =>  __d('location', 'Status'),
		));
		echo $this->Form->input('popular', array(
			'label' =>  __d('location', 'Popular'),
		));
		echo $this->Form->input('private', array(
			'label' =>  __d('location', 'Private'),
		));
		echo $this->Form->input('active', array(
			'label' =>  __d('location', 'Active'),
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
