<div class="node-body">
	<?php 
	$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'en'){
		echo $this->Nodes->field('body'); 
	}else{
		echo $this->Nodes->field('bn_body'); 
	}
	
	
	?>
</div>