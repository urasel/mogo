<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood News');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood News'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['BloodNews']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Blood News') . ': ' . $this->request->data['BloodNews']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('BloodNews'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Blood News'), '#blood-news');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');
	//debug($this->data);
	echo $this->Html->tabStart('blood-news');

		echo $this->Form->input('id');

		echo $this->Form->input('blood_group_id', array(
			'label' =>  __d('information', 'Blood Group'),
		));
		
		echo $this->Form->input('requireddate', array(
			'id'=>"datetimepicker",
			'label' =>  __d('information', 'Required Date'),
		));
		?>
		<script>
		$(document).ready(function(){
			$('#datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			value:'<?php echo $this->data['BloodNews']['required_date']; ?>',
			format:'Y-m-d H:i:s',
			lang:'en'
			});
		});
		</script>
		<?php
		echo $this->Form->input('quantity', array(
			'label' =>  __d('information', 'Quantity'),
		));
		echo $this->Form->input('mobile', array(
			'label' =>  __d('information', 'Mobile'),
		));
		echo $this->Form->input('BloodNewsDetail.id', array(
			'type' =>  'hidden',
		));
		echo $this->Form->input('BloodNewsDetail.details', array(
			'type' => 'textarea',
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('BloodNewsDetail.address', array(
			'label' =>  __d('information', 'Address'),
		));
		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
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


