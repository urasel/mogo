<?php
$this->viewVars['title_for_layout'] = __d('location', 'Place Datas');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Place Datas'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['PlaceData']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('location', 'Place Datas') . ': ' . $this->request->data['PlaceData']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('PlaceData'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('location', 'Place Data'), '#place-data');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place-data');

		echo $this->Form->input('id');

		echo $this->Form->input('language_id', array(
			'label' =>  __d('location', 'Language'),
		));
		echo $this->Form->input('topic_id', array(
			'label' =>  __d('location', 'Topic'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('location', 'Name'),
		));
		echo $this->Form->input('short_description', array(
			'label' =>  __d('location', 'Short Description'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('location', 'Details'),
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
