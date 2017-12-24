<?php
$this->viewVars['title_for_layout'] = __d('location', 'Institutes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Institutes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Institute']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Institutes') . ': ' . $this->request->data['Institute']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Institute'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Institute'), '#institute');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('institute');

		echo $this->Form->input('id');

		echo $this->Form->input('user_id', array(
			'label' =>  __d('location', 'User'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('location', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('location', 'Place Type'),
		));
		echo $this->Form->input('type', array(
			'label' =>  __d('location', 'Type'),
		));
		echo $this->Form->input('level', array(
			'label' =>  __d('location', 'Level'),
		));
		echo $this->Form->input('eiin_no', array(
			'label' =>  __d('location', 'Eiin No'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('location', 'Seo Name'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('location', 'Name'),
		));
		echo $this->Form->input('post_office', array(
			'label' =>  __d('location', 'Post Office'),
		));
		echo $this->Form->input('location', array(
			'label' =>  __d('location', 'Location'),
		));
		echo $this->Form->input('mobile', array(
			'label' =>  __d('location', 'Mobile'),
		));
		echo $this->Form->input('web', array(
			'label' =>  __d('location', 'Web'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('location', 'Email'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('location', 'Address'),
		));
		echo $this->Form->input('founded', array(
			'label' =>  __d('location', 'Founded'),
		));
		echo $this->Form->input('teaching_staff', array(
			'label' =>  __d('location', 'Teaching Staff'),
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
		echo $this->Form->input('metatag', array(
			'label' =>  __d('location', 'Metatag'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('location', 'Keyword'),
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
