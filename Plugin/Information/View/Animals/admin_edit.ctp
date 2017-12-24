<?php
$this->viewVars['title_for_layout'] = __d('information', 'Animals');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Animals'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Animal']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Animals') . ': ' . $this->request->data['Animal']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Animal'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Animal'), '#animal');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('animal');

		echo $this->Form->input('id');

		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('kingdom', array(
			'label' =>  __d('information', 'Kingdom'),
		));
		echo $this->Form->input('rank', array(
			'label' =>  __d('information', 'Rank'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('metatag', array(
			'label' =>  __d('information', 'Metatag'),
		));
		echo $this->Form->input('bn_metatag', array(
			'label' =>  __d('information', 'Bn Metatag'),
		));
		echo $this->Form->input('keyword', array(
			'label' =>  __d('information', 'Keyword'),
		));
		echo $this->Form->input('counters', array(
			'label' =>  __d('information', 'Counters'),
		));
		echo $this->Form->input('family', array(
			'label' =>  __d('information', 'Family'),
		));
		echo $this->Form->input('species', array(
			'label' =>  __d('information', 'Species'),
		));
		echo $this->Form->input('genus', array(
			'label' =>  __d('information', 'Genus'),
		));
		echo $this->Form->input('replacetext', array(
			'label' =>  __d('information', 'Replacetext'),
		));
		echo $this->Form->input('modified_scientific_name', array(
			'label' =>  __d('information', 'Modified Scientific Name'),
		));
		echo $this->Form->input('scientific_name', array(
			'label' =>  __d('information', 'Scientific Name'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('bn_details', array(
			'label' =>  __d('information', 'Bn Details'),
		));
		echo $this->Form->input('image', array(
			'label' =>  __d('information', 'Image'),
		));
		echo $this->Form->input('authority', array(
			'label' =>  __d('information', 'Authority'),
		));
		echo $this->Form->input('breeding_range', array(
			'label' =>  __d('information', 'Breeding Range'),
		));
		echo $this->Form->input('nonbreeding_range', array(
			'label' =>  __d('information', 'Nonbreeding Range'),
		));
		echo $this->Form->input('code', array(
			'label' =>  __d('information', 'Code'),
		));
		echo $this->Form->input('comment', array(
			'label' =>  __d('information', 'Comment'),
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
