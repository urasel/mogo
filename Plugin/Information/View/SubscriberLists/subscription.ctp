<?php
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
	  $currentLng = $this->Session->read('Config.language');
?>
<div class="container">
<div class="row placeview">
<?php
echo '<div class="col-md-12">';
echo '<div class="row">';
	echo '<div class="col-md-12  sectionblock">';
	$pageTitle = 'Free Informap24 Newsletters';
	echo '<h1>'.$pageTitle.'</h1>';
		echo '<div class="row"><div class="col-md-12">';
		echo '<p>';
		echo __('To subscribe to Informap24.com free daily emails, please complete the form below.');
		echo '</p>';
		echo '</div>';
		echo '</div>';
		
			echo '<div class="row"><div class="col-md-6">';
			echo $this->Form->create('Information.SubscriberList',array('url' => array('plugin' => 'information','controller' => 'subscriber_lists', 'action' => 'add','language' =>$currentLng)));
			echo $this->Form->input('email', array('class'=>'form-control ','label'=>__('Your Email'),'placeholder'=>__('Your Email'),'tabindex'=> "1"));
			echo $this->Form->input('name', array('class'=>'form-control ','label'=>__('Your Name'),'placeholder'=>__('Your Name'),'tabindex'=> "2"));
			echo $this->Form->input('sex_id', array('class'=>'form-control ','label'=>__('Your Gender'),'placeholder'=>__('Mail/Femail'),'tabindex'=> "3"));
			echo $this->Form->input('dob', array('class'=>'form-control','type' =>'text','label'=>__('Your birth date'),'placeholder'=>__(''),'tabindex'=> "4"));
			$options = array('label' => __('Subscribe'), 'class' => 'btn btn-default');
			echo '<p>You are currently subscribed to all the FREE email subscriptions that have a Yes button checked. To subscribe, please click on the Yes button. To unsubscribe, please click on the No button.</p>';
			$termsLink  	= $this->Html->link(__('Terms & Condition'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'terms_condition','language' =>$currentLng));
			$privacyLink  	= $this->Html->link(__('Privacy & Policy'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'privacy_policy','language' =>$currentLng));
			echo $this->Form->input('acknowledge', array('type'=>'checkbox','required' => 'required','class'=>'form-control ','label'=>__("I acknowledge that I have read the $termsLink and $privacyLink and that I agree to be bound
by the Terms of Service and the rules and policies"),'placeholder'=>__(''),'tabindex'=> "4"));
			
			echo $this->Form->end($options); 
			echo '</div>';
			echo '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
	
?>
</div>
<script>
$(document).ready(function(){
	$('#SubscriberListDob').datetimepicker({
	dayOfWeekStart : 1,
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d',
	lang:'en'
	});
});
</script>
