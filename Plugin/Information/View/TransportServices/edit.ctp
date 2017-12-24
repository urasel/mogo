<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Services');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Services'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportService']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Services') . ': ' . $this->request->data['TransportService']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportService'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Service'), '#transport-service');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('transport-service');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('transport_type_id', array(
			'label' =>  __d('information', 'Transport Type'),
		));
		echo $this->Form->input('transport_service_provider_id', array(
			'label' =>  __d('information', 'Transport Service Provider'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('bn_details', array(
			'label' =>  __d('information', 'Bn Details'),
		));
		echo $this->Form->input('contact', array(
			'label' =>  __d('information', 'Contact'),
		));
		echo $this->Form->input('website', array(
			'label' =>  __d('information', 'Website'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('information', 'Email'),
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
