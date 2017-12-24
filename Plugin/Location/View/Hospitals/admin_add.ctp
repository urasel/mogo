<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hospitals');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hospitals'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Hospital']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Hospitals') . ': ' . $this->request->data['Hospital']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Hospital'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Hospital'), '#hospital');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('hospital');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('location', 'Point'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('location', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('location', 'Seo Name'),
		));
		echo $this->Form->input('hospital_category_id', array(
			'label' =>  __d('location', 'Hospital Category'),
		));
		echo $this->Form->input('speciality', array(
			'label' =>  __d('location', 'Speciality'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('location', 'Details'),
		));
		echo $this->Form->input('hours', array(
			'label' =>  __d('location', 'Hours'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('location', 'Address'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('location', 'Email'),
		));
		echo $this->Form->input('web', array(
			'label' =>  __d('location', 'Web'),
		));
		echo $this->Form->input('fax', array(
			'label' =>  __d('location', 'Fax'),
		));
		echo $this->Form->input('phone', array(
			'label' =>  __d('location', 'Phone'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('location', 'Image'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('location', 'Keyword'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('location', 'Metatag'),
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
