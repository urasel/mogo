<?php
//debug($zones);
echo $this->Form->unlockField('Address.bd_thana_id');
echo $this->Form->input('Address.bd_thana_id', array('id' => 'thanalist','label' =>'Thana','class'=>'input-block-level','placeholder'=>'Thana Name','empty' =>'Select Thana','tabindex'=> "4"));

?>
<script>
$(document).ready(function() {
		$('#thanalist').click(function(){
				
				$("#PlaceLocation").show();
				
				
		});
		
});
</script>
