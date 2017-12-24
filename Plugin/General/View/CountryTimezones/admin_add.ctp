<?php
$this->viewVars['title_for_layout'] = __d('general', 'Country Timezones');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Country Timezones'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['CountryTimezone']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('general', 'Country Timezones') . ': ' . $this->request->data['CountryTimezone']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('CountryTimezone'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('general', 'Country Timezone'), '#country-timezone');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('country-timezone');

		echo $this->Form->input('id');

		echo $this->Form->input('country', array(
			'label' =>  __d('general', 'Country'),
		));
		echo $this->Form->input('country_id', array(
			'label' =>  __d('general', 'Country'),
		));
		echo $this->Form->input('utc', array(
			'label' =>  __d('general', 'Utc'),
		));
		echo $this->Form->input('dst', array(
			'label' =>  __d('general', 'Dst'),
		));
		echo $this->Form->input('dst_period_start_end', array(
			'label' =>  __d('general', 'Dst Period Start End'),
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
