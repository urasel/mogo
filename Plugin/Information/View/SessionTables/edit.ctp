<?php
$this->viewVars['title_for_layout'] = __d('information', 'Session Tables');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Session Tables'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['SessionTable']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Session Tables') . ': ' . $this->request->data['SessionTable']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('SessionTable'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Session Table'), '#session-table');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('session-table');

		echo $this->Form->input('id');

		echo $this->Form->input('useragent', array(
			'label' =>  __d('information', 'Useragent'),
		));
		echo $this->Form->input('sessionName', array(
			'label' =>  __d('information', 'SessionName'),
		));
		echo $this->Form->input('userip', array(
			'label' =>  __d('information', 'Userip'),
		));
		echo $this->Form->input('clickcount', array(
			'label' =>  __d('information', 'Clickcount'),
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
