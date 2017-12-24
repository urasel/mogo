<?php
$this->loadHelpers(array('Language'));
	  $currentLng = $this->Session->read('Config.language');
	  if($currentLng == 'bn'){
		$title_for_layout = $this->Language->banglanumber($title_for_layout); 
	  }
	  $this->Html->addCrumb(__('Blood Needed'),array('controller'=>'blood_news','action'=>'listing','params'=>'all_blood_informations','ext' => 'asp')) ;
      $this->Html->addCrumb($title_for_layout ,'', array('class' => 'active'));
?>
<div class="col-md-8">
<div class="row sectionblock">	
<div class="col-md-12">
<h1><?php echo $title_for_layout;?></h1>
<table>
<tr>
<td>
<?php echo __('Blood Group'); ?>:
</td>
<td>
<?php echo '&nbsp;<b>'.$bloodNews['BloodGroup']['name'].'</b>'; ?>
</td> 
</tr>
<tr>
<td>
<?php echo __('Date'); ?>:
</td>
<td>
<?php 
if($currentLng == 'bn'){
echo $requireddate = $this->Language->bangladate(date('d F Y',strtotime($bloodNews['BloodNews']['required_date']))); 
}else{
echo date('d F Y',strtotime($bloodNews['BloodNews']['required_date']));
}
?>
</td> 
</tr>
<tr>
<td>
<?php echo __('Quantity'); ?>:
</td>
<td>
<?php 
if($currentLng == 'bn'){
echo $this->Language->banglanumber($bloodNews['BloodNews']['quantity']).' '.__('Bag');  
}else{
echo $bloodNews['BloodNews']['quantity'].' '.__('Bag'); 
}
?>
</td> 
</tr>
</table>
<?php 

echo '<div class="row">';
		echo '<div class="col-md-12">';
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$languageID = 2;
		}else{
			$languageID = 1;
		}
		//debug($bloodNews);
		
			echo '<p>';
			echo '<b>'.__('Contact Info').'</b><br/>';
			if(!empty($bloodNews['User']['firstname'])){
			echo $bloodNews['User']['firstname'].',';
			}
			if(!empty($bloodNews['User']['lastname'])){
			echo $bloodNews['User']['lastname'].',';
			}
			echo __('Mobile').': ';
			if($currentLng == 'bn'){
			echo $this->Language->banglanumber($bloodNews['BloodNews']['mobile']);
			}else{
			echo $bloodNews['BloodNews']['mobile'];
			}
			echo '<p>'.$bloodNews['BloodNewsDetail']['address'].'</p>';
			echo '</p>';
			echo '<p>';
			echo '<b>'.__('Details').'</b>';
			echo '<p>'.$bloodNews['BloodNewsDetail']['details'].'</p>';
			echo '</p>';
		
		echo '</div>';
		
echo '</div>';

?>

</div>
</div>
</div>
<div class="col-md-4">
<div class="row sectionblock">	
<div class="col-md-12">

</div>
</div>
</div>
