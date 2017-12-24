<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Thanas');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Thanas'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BdThana']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Bd Thanas') . ': ' . $this->request->data['BdThana']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BdThana'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Bd Thana'), '#bd-thana');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('bd-thana');

		echo $this->Form->input('id');

		echo $this->Form->input('name', array(
			'label' =>  __d('general', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('general', 'Bn Name'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('general', 'Bd District'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('general', 'Isactive'),
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
