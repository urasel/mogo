<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood Donation Records');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood Donation Records'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BloodDonationRecord']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Blood Donation Records') . ': ' . $this->request->data['BloodDonationRecord']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BloodDonationRecord'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Blood Donation Record'), '#blood-donation-record');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('blood-donation-record');

		echo $this->Form->input('id');

		echo $this->Form->input('blood_donar_id', array(
			'label' =>  __d('information', 'Blood Donar'),
		));
		echo $this->Form->input('patient_name', array(
			'label' =>  __d('information', 'Patient Name'),
		));
		echo $this->Form->input('bag', array(
			'label' =>  __d('information', 'Bag'),
		));
		echo $this->Form->input('donation_date', array(
			'label' =>  __d('information', 'Donation Date'),
			'type' => 'text',
			'id'=>"donationdate",
		));
		echo $this->Form->input('hospital', array(
			'label' =>  __d('information', 'Hospital'),
		));
		echo $this->Form->input('patient_phone', array(
			'label' =>  __d('information', 'Patient Phone'),
		));
		echo $this->Form->input('patient_address', array(
			'label' =>  __d('information', 'Patient Address'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('information', 'Isactive'),
		));
	?>
	<script>
	$(document).ready(function(){
		$('#donationdate').datetimepicker({
		dayOfWeekStart : 1,
		format:'Y-m-d H:i:s',
		lang:'en'
		});
	});
	</script>
	<?php
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
