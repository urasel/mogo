<?php
$this->viewVars['title_for_layout'] = __d('information', 'Home Categories');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Home Categories'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['HomeCategory']['title'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Home Categories') . ': ' . $this->request->data['HomeCategory']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('HomeCategory'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Home Category'), '#home-category');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('home-category');

		echo $this->Form->input('id');

		echo $this->Form->input('title', array(
			'label' =>  __d('information', 'Title'),
		));
		echo $this->Form->input('bn_title', array(
			'label' =>  __d('information', 'Bn Title'),
		));
		echo $this->Form->input('isActive', array(
			'label' =>  __d('information', 'IsActive'),
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
