<?php
echo $this->Form->unlockField('transport_service_id');
//echo $this->Form->input('transport_service_id', array('id'=>'addresszoneid','class'=>'input-block-level','label' => true,'empty' =>'Select Service','tabindex'=> "2"));
echo $this->Form->input('TransportRoute.transport_service_id', array( 'label' =>  __d('information', 'Transport Service'),'class'=>'input-block-level','empty' =>'Select Service'));
?>