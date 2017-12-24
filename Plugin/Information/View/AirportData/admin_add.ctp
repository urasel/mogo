<?php
$this->viewVars['title_for_layout'] = __d('information', 'Airport Data');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Airport Data'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['AirportData']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Airport Data') . ': ' . $this->request->data['AirportData']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('AirportData'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Airport Data'), '#airport-data');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('airport-data');

		echo $this->Form->input('id');

		echo $this->Form->input('language_id', array(
			'label' =>  __d('information', 'Language'),
		));
		echo $this->Form->input('airport_id', array(
			'label' =>  __d('information', 'Airport'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('short_description', array(
			'label' =>  __d('information', 'Short Description'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('information', 'Keyword'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('information', 'Metatag'),
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
