<?php
$this->viewVars['title_for_layout'] = __d('information', 'Place Type Slugs');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Place Type Slugs'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['PlaceTypeSlug']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Place Type Slugs') . ': ' . $this->request->data['PlaceTypeSlug']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('PlaceTypeSlug'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Place Type Slug'), '#place-type-slug');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place-type-slug');

		echo $this->Form->input('id');

		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('title', array(
			'label' =>  __d('information', 'Title of Search'),
		));
		echo $this->Form->input('seo_title', array(
			'label' =>  __d('information', 'Title of Search'),
		));
		echo $this->Form->input('slug', array(
			'label' =>  __d('information', 'Slug'),
		));
		echo $this->Form->input('params', array(
			'label' =>  __d('information', 'Params of Search'),
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
