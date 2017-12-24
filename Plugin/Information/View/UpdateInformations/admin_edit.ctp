<?php
$this->viewVars['title_for_layout'] = __d('information', 'Update Informations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Update Informations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['UpdateInformation']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Update Informations') . ': ' . $this->request->data['UpdateInformation']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('UpdateInformation'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Update Information'), '#update-information');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('update-information');

		echo $this->Form->input('id');

		echo $this->Form->input('itemid', array(
			'label' =>  __d('information', 'Itemid'),
		));
		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
		));
		echo $this->Form->input('classname', array(
			'label' =>  __d('information', 'Classname'),
		));
		echo $this->Form->input('feedback', array(
			'label' =>  __d('information', 'Feedback'),
		));
		echo $this->Form->input('verifiedby', array(
			'label' =>  __d('information', 'Verifiedby'),
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
