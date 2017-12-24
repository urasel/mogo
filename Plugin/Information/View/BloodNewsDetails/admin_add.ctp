<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood News Details');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood News Details'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BloodNewsDetail']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Blood News Details') . ': ' . $this->request->data['BloodNewsDetail']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BloodNewsDetail'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Blood News Detail'), '#blood-news-detail');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('blood-news-detail');

		echo $this->Form->input('id');

		echo $this->Form->input('language_id', array(
			'label' =>  __d('information', 'Language'),
		));
		echo $this->Form->input('blood_news_id', array(
			'label' =>  __d('information', 'Blood News'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('address', array(
			'label' =>  __d('information', 'Address'),
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
