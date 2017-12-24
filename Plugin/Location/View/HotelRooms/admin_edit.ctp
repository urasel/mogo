<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hotel Rooms');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hotel Rooms'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['HotelRoom']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Hotel Rooms') . ': ' . $this->request->data['HotelRoom']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('HotelRoom'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Hotel Room'), '#hotel-room');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('hotel-room');

		echo $this->Form->input('id');

		echo $this->Form->input('hotel_id', array(
			'label' =>  __d('location', 'Hotel'),
		));
		echo $this->Form->input('hotel_room_category_id', array(
			'label' =>  __d('location', 'Hotel Room Category'),
		));
		echo $this->Form->input('room_size', array(
			'label' =>  __d('location', 'Room Size'),
		));
		echo $this->Form->input('bed', array(
			'label' =>  __d('location', 'Bed'),
		));
		echo $this->Form->input('hotel_views', array(
			'label' =>  __d('location', 'Hotel Views'),
		));
		echo $this->Form->input('room_features', array(
			'label' =>  __d('location', 'Room Features'),
		));
		echo $this->Form->input('rules_conditions', array(
			'label' =>  __d('location', 'Rules Conditions'),
		));
		echo $this->Form->input('offers', array(
			'label' =>  __d('location', 'Offers'),
		));
		echo $this->Form->input('price', array(
			'label' =>  __d('location', 'Price'),
		));
		echo $this->Form->input('number', array(
			'label' =>  __d('location', 'Number'),
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
