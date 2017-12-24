<?php
$this->viewVars['title_for_layout'] = __d('information', 'Stadia');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Stadia'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Stadium']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Stadia') . ': ' . $this->request->data['Stadium']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Stadium'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Stadium'), '#stadium');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('stadium');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('tenant_or_use', array(
			'label' =>  __d('information', 'Tenant Or Use'),
		));
		echo $this->Form->input('city', array(
			'label' =>  __d('information', 'City'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('capacity', array(
			'label' =>  __d('information', 'Capacity'),
		));
		echo $this->Form->input('builton', array(
			'label' =>  __d('information', 'Builton'),
		));
		echo $this->Form->input('seats', array(
			'label' =>  __d('information', 'Seats'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('information', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('information', 'Lng'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('web', array(
			'label' =>  __d('information', 'Web'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('information', 'Email'),
		));
		echo $this->Form->input('mobile', array(
			'label' =>  __d('information', 'Mobile'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('information', 'Image'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('information', 'Metatag'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('information', 'Keyword'),
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
