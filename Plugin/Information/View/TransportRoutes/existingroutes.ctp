<?php
$lis = '<ul>';
	if(!empty($transportRoutes)){
		foreach($transportRoutes as $k => $v){
			$lis .= '<li>'.$v.$this->Html->link('Edit',array('controller' => 'transport_routes','action'=>'edit',$k)).'</li>'; 
		}
		
	$lis .= '</ul>';
	echo $lis;
}


?>