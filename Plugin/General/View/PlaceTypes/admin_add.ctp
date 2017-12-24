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

$this->append('form-start', $this->Form->create('PlaceType',array('type'=>'file')));

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
		/*
		echo $this->Form->input('type_image', array(
			'label' =>  __d('general', 'Type Image'),
		));
		*/
		echo $this->Form->unlockField('Crop.x1');
		echo $this->Form->unlockField('Crop.y1');
		echo $this->Form->unlockField('Crop.x2');
		echo $this->Form->unlockField('Crop.y2');
		echo $this->Form->unlockField('Crop.w');
		echo $this->Form->unlockField('Crop.h');
		echo $this->Form->input('Crop.x1', array('type'=>'hidden','id'=>'x1'));		
		echo $this->Form->input('Crop.y1', array('type'=>'hidden','id'=>'y1'));
		echo $this->Form->input('Crop.x2', array('type'=>'hidden','id'=>'x2'));		
		echo $this->Form->input('Crop.y2', array('type'=>'hidden','id'=>'y2'));
		echo $this->Form->input('Crop.w', array('type'=>'hidden','id'=>'w'));		
		echo $this->Form->input('Crop.h', array('type'=>'hidden','id'=>'h'));
		echo '<p class="error"></p>';
		echo $this->Form->unlockField('PlaceType.type_image');
		echo $this->Form->input('PlaceType.type_image', array('type'=>'file','id'=>'image_file','onchange'=>'fileSelectHandler()'));
		echo '<img id="preview" />';
		
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
