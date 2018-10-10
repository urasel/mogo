<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recent Posts');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recent Posts'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['RecentPost']['pointname'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Recent Posts') . ': ' . $this->request->data['RecentPost']['pointname'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('RecentPost'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Recent Post'), '#recent-post');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('recent-post');

		echo $this->Form->input('id');

		echo $this->Form->input('pointid', array(
			'label' =>  __d('information', 'Pointid'),
		));
		echo $this->Form->input('pointname', array(
			'label' =>  __d('information', 'Pointname'),
		));
		echo $this->Form->input('pointcreated', array(
			'label' =>  __d('information', 'Point Create Date'),
			'type' => 'text',
			'id'=>"pointcreatedate",
		));
		echo $this->Form->input('point_seoname', array(
			'label' =>  __d('information', 'Point Seoname'),
		));
		echo $this->Form->input('classid', array(
			'label' =>  __d('information', 'Classid'),
		));
		echo $this->Form->input('class_bntitle', array(
			'label' =>  __d('information', 'Class Bntitle'),
		));
		echo $this->Form->input('class_title', array(
			'label' =>  __d('information', 'Class Title'),
		));
		echo $this->Form->input('class_metatag', array(
			'label' =>  __d('information', 'Class Metatag'),
		));
		echo $this->Form->input('class_bn_details', array(
			'label' =>  __d('information', 'Class Bn Details'),
		));
		echo $this->Form->input('class_details', array(
			'label' =>  __d('information', 'Class Details'),
		));
		echo $this->Form->input('class_image', array(
			'type' => 'text',
			'label' =>  __d('information', 'Class Image'),
		));
		echo $this->Form->input('placetype_icon', array(
			'label' =>  __d('information', 'Placetype Icon'),
		));
		echo $this->Form->input('placetype_pluralname', array(
			'label' =>  __d('information', 'Placetype Pluralname'),
		));
		echo $this->Form->input('placetype_seoname', array(
			'label' =>  __d('information', 'Placetype Seoname'),
		));
		echo $this->Form->input('publishdate', array(
			'label' =>  __d('information', 'Publish Date'),
			'type' => 'text',
			'id'=>"publishdate",
		));
		echo $this->Form->input('unpublishdate', array(
			'label' =>  __d('information', 'Unpublish Date'),
			'type' => 'text',
			'id'=>"unpublishdate",
		));
		echo $this->Form->input('language', array(
			'label' =>  __d('information', 'Language'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('information', 'Isactive'),
		));
	?>
	
	<script>
	$(document).ready(function(){
		$('#publishdate').datetimepicker({
		dayOfWeekStart : 1,
		format:'Y-m-d H:i:s',
		lang:'en'
		});
		$('#unpublishdate').datetimepicker({
		dayOfWeekStart : 1,
		format:'Y-m-d H:i:s',
		lang:'en'
		});
		$('#pointcreatedate').datetimepicker({
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
