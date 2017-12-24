<?php
$this->viewVars['title_for_layout'] = __d('profession', 'Doctors');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('profession', 'Doctors'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Doctor']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('profession', 'Doctors') . ': ' . $this->request->data['Doctor']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Doctor'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('profession', 'Doctor'), '#doctor');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('doctor');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('profession', 'Point'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('profession', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('profession', 'Seo Name'),
		));
		echo $this->Form->input('hospital_id', array(
			'label' =>  __d('profession', 'Hospital'),
		));
		echo $this->Form->input('hospitalids', array(
			'label' =>  __d('profession', 'Hospitalids'),
		));
		echo $this->Form->input('dob', array(
			'label' =>  __d('profession', 'Dob'),
		));
		echo $this->Form->input('sex_id', array(
			'label' =>  __d('profession', 'Sex'),
		));
		echo $this->Form->input('religion_id', array(
			'label' =>  __d('profession', 'Religion'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('profession', 'Details'),
		));
		echo $this->Form->input('qualification', array(
			'label' =>  __d('profession', 'Qualification'),
		));
		echo $this->Form->input('degree', array(
			'label' =>  __d('profession', 'Degree'),
		));
		echo $this->Form->input('doctor_specialization_id', array(
			'label' =>  __d('profession', 'Doctor Specialization'),
		));
		echo $this->Form->input('doctor_expertise_id', array(
			'label' =>  __d('profession', 'Doctor Expertise'),
		));
		echo $this->Form->input('expertiseids', array(
			'label' =>  __d('profession', 'Expertiseids'),
		));
		echo $this->Form->input('designation', array(
			'label' =>  __d('profession', 'Designation'),
		));
		echo $this->Form->input('chamber', array(
			'label' =>  __d('profession', 'Chamber'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('profession', 'Address'),
		));
		echo $this->Form->input('phone', array(
			'label' =>  __d('profession', 'Phone'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('profession', 'Email'),
		));
		echo $this->Form->input('website', array(
			'label' =>  __d('profession', 'Website'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('profession', 'Image'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('profession', 'Keyword'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('profession', 'Metatag'),
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
