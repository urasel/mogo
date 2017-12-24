<?php
$this->viewVars['title_for_layout'] = __d('information', 'Places');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Places'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Place']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Places') . ': ' . $this->request->data['Place']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Place'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Place'), '#place');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place');

		echo $this->Form->input('id');

		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('mobile', array(
			'label' =>  __d('information', 'Mobile'),
		));
		echo $this->Form->input('fax', array(
			'label' =>  __d('information', 'Fax'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('information', 'Email'),
		));
		echo $this->Form->input('web', array(
			'label' =>  __d('information', 'Web'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('information', 'Keyword'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('information', 'Metatag'),
		));
		echo $this->Form->input('bangla_name', array(
			'label' =>  __d('information', 'Bangla Name'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('information', 'Image'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('zone_id', array(
			'label' =>  __d('information', 'Zone'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('information', 'Bd District'),
		));
		echo $this->Form->input('bd_thanas_id', array(
			'label' =>  __d('information', 'Bd Thanas'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('location', array(
			'label' =>  __d('information', 'Location'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('establish', array(
			'label' =>  __d('information', 'Establish'),
		));
		echo $this->Form->input('history', array(
			'label' =>  __d('information', 'History'),
		));
		echo $this->Form->input('capacity', array(
			'label' =>  __d('information', 'Capacity'),
		));
		echo $this->Form->input('holiday', array(
			'label' =>  __d('information', 'Holiday'),
		));
		echo $this->Form->input('hours', array(
			'label' =>  __d('information', 'Hours'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('information', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('information', 'Lng'),
		));
		echo $this->Form->input('status', array(
			'label' =>  __d('information', 'Status'),
		));
		echo $this->Form->input('popular', array(
			'label' =>  __d('information', 'Popular'),
		));
		echo $this->Form->input('private', array(
			'label' =>  __d('information', 'Private'),
		));
		echo $this->Form->input('active', array(
			'label' =>  __d('information', 'Active'),
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
