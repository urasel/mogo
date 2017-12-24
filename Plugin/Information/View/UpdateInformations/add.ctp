<?php
$this->viewVars['title_for_layout'] = __d('information', 'Update Informations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Update Informations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['UpdateInformation']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Update Informations') . ': ' . $this->request->data['UpdateInformation']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('UpdateInformation');


		echo $this->Form->input('id');

		echo $this->Form->input('itemid', array(
			'class'=>'form-control',
			'value' => $itemid,
			'type' => 'hidden'
		));
		echo $this->Form->input('classname', array(
			'class'=>'form-control',
			'value' => $class,
			'type' => 'hidden'
		));
		echo $this->Form->input('itemname', array(
			'class'=>'form-control',
			'value' => $itemname,
			'type' => 'hidden'
		));
		echo $this->Form->input('feedback', array(
			'class'=>'form-control',
			'label' =>  __d('information', 'Feedback'),
		));

$options = array('label' => __('Send Feedback'), 'class' => 'btn btn-primary');
echo $this->Form->end($options); 