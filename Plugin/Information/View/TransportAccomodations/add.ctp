<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Accomodations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Accomodations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportAccomodation']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Accomodations') . ': ' . $this->request->data['TransportAccomodation']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportAccomodation'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Accomodation'), '#transport-accomodation');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('transport-accomodation');

		echo $this->Form->input('id');

		echo $this->Form->input('transport_route_id', array(
			'label' =>  __d('information', 'Transport Route'),
		));
		echo $this->Form->input('transport_class_id', array(
			'label' =>  __d('information', 'Transport Class'),
		));
		echo $this->Form->input('transport_service_id', array(
			'label' =>  __d('information', 'Transport Service'),
		));
		echo $this->Form->input('fare', array(
			'label' =>  __d('information', 'Fare'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('images', array(
			'label' =>  __d('information', 'Images'),
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
