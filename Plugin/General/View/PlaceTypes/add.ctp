<?php
$this->viewVars['title_for_layout'] = __d('general', 'Place Types');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Place Types'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['PlaceType']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Place Types') . ': ' . $this->request->data['PlaceType']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('PlaceType'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Place Type'), '#place-type');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place-type');

		echo $this->Form->input('id');

		echo $this->Form->input('parentid', array(
			'label' =>  __d('general', 'Parentid'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('general', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('general', 'Bn Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('general', 'Seo Name'),
		));
		echo $this->Form->input('codeblock', array(
			'label' =>  __d('general', 'Codeblock'),
		));
		echo $this->Form->input('singlename', array(
			'label' =>  __d('general', 'Singlename'),
		));
		echo $this->Form->input('pluralname', array(
			'label' =>  __d('general', 'Pluralname'),
		));
		echo $this->Form->input('icon', array(
			'label' =>  __d('general', 'Icon'),
		));
		echo $this->Form->input('type_image', array(
			'label' =>  __d('general', 'Type Image'),
		));
		echo $this->Form->input('groupname', array(
			'label' =>  __d('general', 'Groupname'),
		));
		echo $this->Form->input('order', array(
			'label' =>  __d('general', 'Order'),
		));
		echo $this->Form->input('topcat', array(
			'label' =>  __d('general', 'Topcat'),
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
