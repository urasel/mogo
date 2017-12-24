<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Routes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Routes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportRoute']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Routes') . ': ' . $this->request->data['TransportRoute']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportRoute'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Route'), '#transport-route');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('transport-route');

		echo $this->Form->input('id');

		echo $this->Form->input('transport_service_id', array(
			'label' =>  __d('information', 'Transport Service'),
		));
		echo $this->Form->input('transport_class_id', array(
			'label' =>  __d('information', 'Transport Class'),
		));
		echo $this->Form->input('route_fromcountryid', array(
			'label' =>  __d('information', 'Route Fromcountryid'),
		));
		echo $this->Form->input('route_fromid', array(
			'label' =>  __d('information', 'Route Fromid'),
		));
		echo $this->Form->input('route_tocountryid', array(
			'label' =>  __d('information', 'Route Tocountryid'),
		));
		echo $this->Form->input('route_toid', array(
			'label' =>  __d('information', 'Route Toid'),
		));
		echo $this->Form->input('route_details', array(
			'label' =>  __d('information', 'Route Details'),
		));
		echo $this->Form->input('fare', array(
			'label' =>  __d('information', 'Fare'),
		));
		echo $this->Form->input('departure_time', array(
			'label' =>  __d('information', 'Departure Time'),
		));
		echo $this->Form->input('estimated_reach_time', array(
			'label' =>  __d('information', 'Estimated Reach Time'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('information', 'Isactive'),
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
