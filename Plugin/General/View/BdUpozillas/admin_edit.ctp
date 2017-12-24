<?php
$this->viewVars['title_for_layout'] = __d('general', 'Bd Upozillas');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Bd Upozillas'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BdUpozilla']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Bd Upozillas') . ': ' . $this->request->data['BdUpozilla']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BdUpozilla'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Bd Upozilla'), '#bd-upozilla');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('bd-upozilla');

		echo $this->Form->input('id');

		echo $this->Form->input('division_bn', array(
			'label' =>  __d('general', 'Division Bn'),
		));
		echo $this->Form->input('division_en', array(
			'label' =>  __d('general', 'Division En'),
		));
		echo $this->Form->input('bd_division_id', array(
			'label' =>  __d('general', 'Bd Division'),
		));
		echo $this->Form->input('district_bn', array(
			'label' =>  __d('general', 'District Bn'),
		));
		echo $this->Form->input('district_en', array(
			'label' =>  __d('general', 'District En'),
		));
		echo $this->Form->input('bd_district_id', array(
			'label' =>  __d('general', 'Bd District'),
		));
		echo $this->Form->input('upozilla_bn', array(
			'label' =>  __d('general', 'Upozilla Bn'),
		));
		echo $this->Form->input('upozilla_en', array(
			'label' =>  __d('general', 'Upozilla En'),
		));
		echo $this->Form->input('upozillaid', array(
			'label' =>  __d('general', 'Upozillaid'),
		));
		echo $this->Form->input('union_bn', array(
			'label' =>  __d('general', 'Union Bn'),
		));
		echo $this->Form->input('union_en', array(
			'label' =>  __d('general', 'Union En'),
		));
		echo $this->Form->input('unionid', array(
			'label' =>  __d('general', 'Unionid'),
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
