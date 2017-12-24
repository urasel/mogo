<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipe Images');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipe Images'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['RecipeImage']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Recipe Images') . ': ' . $this->request->data['RecipeImage']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('RecipeImage'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Recipe Image'), '#recipe-image');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('recipe-image');

		echo $this->Form->input('id');

		echo $this->Form->input('recipe_id', array(
			'label' =>  __d('information', 'Recipe'),
		));
		echo $this->Form->input('file', array(
			'label' =>  __d('information', 'File'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('source', array(
			'label' =>  __d('information', 'Source'),
		));
		echo $this->Form->input('position', array(
			'label' =>  __d('information', 'Position'),
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
