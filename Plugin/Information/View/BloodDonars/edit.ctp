<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood Donars');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood Donars'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BloodDonar']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Blood Donars') . ': ' . $this->request->data['BloodDonar']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BloodDonar'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Blood Donar'), '#blood-donar');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('blood-donar');

		echo $this->Form->input('id');

		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('blood_group_id', array(
			'label' =>  __d('information', 'Blood Group'),
		));
		echo $this->Form->input('sex_id', array(
			'label' =>  __d('information', 'Sex'),
		));
		echo $this->Form->input('date_of_birth', array(
			'label' =>  __d('information', 'Date Of Birth'),
		));
		echo $this->Form->input('mobile_number', array(
			'label' =>  __d('information', 'Mobile Number'),
		));
		echo $this->Form->input('land_line_number', array(
			'label' =>  __d('information', 'Land Line Number'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('zone_id', array(
			'label' =>  __d('information', 'Zone'),
		));
		echo $this->Form->input('bd_division_id', array(
			'label' =>  __d('information', 'Bd Division'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('information', 'Bd District'),
		));
		echo $this->Form->input('bd_thanas_id', array(
			'label' =>  __d('information', 'Bd Thanas'),
		));
		echo $this->Form->input('permanent_address', array(
			'label' =>  __d('information', 'Permanent Address'),
		));
		echo $this->Form->input('availability_status', array(
			'label' =>  __d('information', 'Availability Status'),
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
