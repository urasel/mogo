<?php
$this->viewVars['title_for_layout'] = __d('information', 'Yellow Pages');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Yellow Pages'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['YellowPage']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Yellow Pages') . ': ' . $this->request->data['YellowPage']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('YellowPage'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Yellow Page'), '#yellow-page');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('yellow-page');

		echo $this->Form->input('id');

		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('logo', array(
			'label' =>  __d('information', 'Logo'),
		));
		echo $this->Form->input('parent', array(
			'label' =>  __d('information', 'Parent'),
		));
		echo $this->Form->input('subparent', array(
			'label' =>  __d('information', 'Subparent'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('bn_address', array(
			'label' =>  __d('information', 'Bn Address'),
		));
		echo $this->Form->input('phone', array(
			'label' =>  __d('information', 'Phone'),
		));
		echo $this->Form->input('fax', array(
			'label' =>  __d('information', 'Fax'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('information', 'Email'),
		));
		echo $this->Form->input('contact_person', array(
			'label' =>  __d('information', 'Contact Person'),
		));
		echo $this->Form->input('website', array(
			'label' =>  __d('information', 'Website'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
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
