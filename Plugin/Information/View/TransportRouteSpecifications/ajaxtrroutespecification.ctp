<?php
echo $this->Form->unlockField('transport_route_specification_id');
//debug($transport_classes);exit;
echo $this->Form->input('transport_route_specification_id', array(
			'label' =>  __d('information', 'Transport Route Specification'),
			'name' => 'data[accomodation][transport_route_specification][]',
			'empty' => 'Select Route Specification',
			'class' => 'input-block-level'
		));
?>
