<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycles');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycles'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Motorcycle']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Motorcycles') . ': ' . $this->request->data['Motorcycle']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Motorcycle'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Motorcycle'), '#motorcycle');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('motorcycle');

		echo $this->Form->input('id');

		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('engine', array(
			'label' =>  __d('information', 'Engine'),
		));
		echo $this->Form->input('maximum_power', array(
			'label' =>  __d('information', 'Maximum Power'),
		));
		echo $this->Form->input('maximum_torque', array(
			'label' =>  __d('information', 'Maximum Torque'),
		));
		echo $this->Form->input('top_speed', array(
			'label' =>  __d('information', 'Top Speed'),
		));
		echo $this->Form->input('mileage', array(
			'label' =>  __d('information', 'Mileage'),
		));
		echo $this->Form->input('curb_weight', array(
			'label' =>  __d('information', 'Curb Weight'),
		));
		echo $this->Form->input('remarks', array(
			'label' =>  __d('information', 'Remarks'),
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
