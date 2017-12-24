<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Recipe']['title'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Recipes') . ': ' . $this->request->data['Recipe']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Recipe'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Recipe'), '#recipe');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('recipe');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('title', array(
			'label' =>  __d('information', 'Title'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('short_note', array(
			'label' =>  __d('information', 'Short Note'),
		));
		echo $this->Form->input('ingredients', array(
			'label' =>  __d('information', 'Ingredients'),
		));
		echo $this->Form->input('instructions', array(
			'label' =>  __d('information', 'Instructions'),
		));
		echo $this->Form->input('recipe_notes', array(
			'label' =>  __d('information', 'Recipe Notes'),
		));
		echo $this->Form->input('recipe_cuisine_id', array(
			'label' =>  __d('information', 'Recipe Cuisine'),
		));
		echo $this->Form->input('skill_level', array(
			'label' =>  __d('information', 'Skill Level'),
		));
		echo $this->Form->input('prep_time', array(
			'label' =>  __d('information', 'Prep Time'),
		));
		echo $this->Form->input('cook_time', array(
			'label' =>  __d('information', 'Cook Time'),
		));
		echo $this->Form->input('passive_time', array(
			'label' =>  __d('information', 'Passive Time'),
		));
		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
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
