<?php
$this->viewVars['title_for_layout'] = __d('information', 'Postcodes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Postcodes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Postcode']['title'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Postcodes') . ': ' . $this->request->data['Postcode']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Postcode'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Postcode'), '#postcode');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('postcode');

		echo $this->Form->input('id');

		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('information', 'Country'),
		));
		echo $this->Form->input('divisions', array(
			'label' =>  __d('information', 'Divisions'),
		));
		echo $this->Form->input('bd_division_id', array(
			'label' =>  __d('information', 'Bd Division'),
		));
		echo $this->Form->input('districts', array(
			'label' =>  __d('information', 'Districts'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('information', 'Bd District'),
		));
		echo $this->Form->input('thanas', array(
			'label' =>  __d('information', 'Thanas'),
		));
		echo $this->Form->input('newthanas', array(
			'label' =>  __d('information', 'Newthanas'),
		));
		echo $this->Form->input('bd_thanas_id', array(
			'label' =>  __d('information', 'Bd Thanas'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('title', array(
			'label' =>  __d('information', 'Title'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('post_code', array(
			'label' =>  __d('information', 'Post Code'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('lat', array(
			'label' =>  __d('information', 'Lat'),
		));
		echo $this->Form->input('lng', array(
			'label' =>  __d('information', 'Lng'),
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
