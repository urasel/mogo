<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hotels');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hotels'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Hotel']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Hotels') . ': ' . $this->request->data['Hotel']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Hotel'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Hotel'), '#hotel');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('hotel');

		echo $this->Form->input('id');

		echo $this->Form->input('hotel_category_id', array(
			'label' =>  __d('location', 'Hotel Category'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('location', 'Name'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('location', 'Image'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('location', 'Address'),
		));
		echo $this->Form->input('city', array(
			'label' =>  __d('location', 'City'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('location', 'Country'),
		));
		echo $this->Form->input('zone_id', array(
			'label' =>  __d('location', 'Zone'),
		));
		echo $this->Form->input('postcode', array(
			'label' =>  __d('location', 'Postcode'),
		));
		echo $this->Form->input('facilities', array(
			'label' =>  __d('location', 'Facilities'),
		));
		echo $this->Form->input('extrafacilities', array(
			'label' =>  __d('location', 'Extrafacilities'),
		));
		echo $this->Form->input('facilitydata', array(
			'label' =>  __d('location', 'Facilitydata'),
		));
		echo $this->Form->input('extrafacilitydata', array(
			'label' =>  __d('location', 'Extrafacilitydata'),
		));
		echo $this->Form->input('maplocation', array(
			'label' =>  __d('location', 'Maplocation'),
		));
		echo $this->Form->input('description', array(
			'label' =>  __d('location', 'Description'),
		));
		echo $this->Form->input('policies', array(
			'label' =>  __d('location', 'Policies'),
		));
		echo $this->Form->input('check_in_from', array(
			'label' =>  __d('location', 'Check In From'),
		));
		echo $this->Form->input('check_out_until', array(
			'label' =>  __d('location', 'Check Out Until'),
		));
		echo $this->Form->input('distance_from_city', array(
			'label' =>  __d('location', 'Distance From City'),
		));
		echo $this->Form->input('number_of_floor', array(
			'label' =>  __d('location', 'Number Of Floor'),
		));
		echo $this->Form->input('number_of_restaurant', array(
			'label' =>  __d('location', 'Number Of Restaurant'),
		));
		echo $this->Form->input('total_rooms', array(
			'label' =>  __d('location', 'Total Rooms'),
		));
		echo $this->Form->input('build_year', array(
			'label' =>  __d('location', 'Build Year'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('location', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('location', 'Lng'),
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
