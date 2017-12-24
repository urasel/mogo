<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Galleries');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Galleries'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportGallery']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Galleries') . ': ' . $this->request->data['TransportGallery']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportGallery'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Gallery'), '#transport-gallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('transport-gallery');

		echo $this->Form->input('id');

		echo $this->Form->input('transport_route_id', array(
			'label' =>  __d('information', 'Transport Route'),
		));
		echo $this->Form->input('file', array(
			'label' =>  __d('information', 'File'),
		));
		echo $this->Form->input('description', array(
			'label' =>  __d('information', 'Description'),
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
