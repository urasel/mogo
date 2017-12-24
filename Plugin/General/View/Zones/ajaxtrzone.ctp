<?php
echo $this->Form->unlockField($fieldname);
echo $this->Form->input('TransportRoute.'.$fieldname, array('options'=>$divisions,'class'=>"input-block-level",'empty' =>'Select Route','name' => "data[TransportRoute][$fieldname][]",'tabindex'=> "2"));
?>

