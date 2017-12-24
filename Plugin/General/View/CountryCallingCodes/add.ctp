<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Calling Codes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Calling Codes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['CountryCallingCode']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Country Calling Codes') . ': ' . $this->request->data['CountryCallingCode']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('CountryCallingCode'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Country Calling Code'), '#country-calling-code');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('country-calling-code');

		echo $this->Form->input('id');

		echo $this->Form->input('calling_code', array(
			'label' =>  __d('general', 'Calling Code'),
		));
		echo $this->Form->input('country', array(
			'label' =>  __d('general', 'Country'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('general', 'Country'),
		));
		echo $this->Form->input('exit_prefix_idd', array(
			'label' =>  __d('general', 'Exit Prefix '),
		));
		echo $this->Form->input('national_prefix_ndd', array(
			'label' =>  __d('general', 'National Prefix Ndd'),
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
