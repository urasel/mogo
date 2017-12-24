<?php
$this->viewVars['title_for_layout'] = __d('location', 'Institute Images');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Institute Images'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['InstituteImage']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Institute Images') . ': ' . $this->request->data['InstituteImage']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('InstituteImage'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Institute Image'), '#institute-image');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('institute-image');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('location', 'Point'),
		));
		echo $this->Form->input('file', array(
			'label' =>  __d('location', 'File'),
		));
		echo $this->Form->input('position', array(
			'label' =>  __d('location', 'Position'),
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
