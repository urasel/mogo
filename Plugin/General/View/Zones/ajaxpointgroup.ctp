<?php
if($id == 11){
echo $this->Form->input('Point.point_group_id', array('class'=>'input-block-level','label' =>'Point Group','empty' =>'Select Group','tabindex'=> "2"));
echo $this->Form->input('Point.extone', array('class'=>'input-block-level','label' =>'SWIFT Code','empty' =>'Select Group','tabindex'=> "2"));
}else if($id == 14){
echo $this->Form->input('Point.point_group_id', array('class'=>'input-block-level','label' =>'Point Group','empty' =>'Select Group','tabindex'=> "2"));
}else{
echo $this->Form->input('Point.point_group_id', array('class'=>'input-block-level','label' =>'Point Group','empty' =>'Select Group','tabindex'=> "2"));
}
//debug($pointGroups);exit;
?>
