<?php
echo $this->Form->unlockField('transport_class_id');
//debug($transport_classes);exit;
echo $this->Form->input('transport_class_id', array(
			'label' =>  __d('information', 'Transport Class'),
			'name' => 'data[accomodation][trclassname][]',
			'empty' => 'Select Class',
			'class' => 'input-block-level'
		));
?>
