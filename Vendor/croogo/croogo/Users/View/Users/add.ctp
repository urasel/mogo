<?php
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
?>
<?php
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<div class="col-md-12">';
echo '<div class="row">';
	echo '<div class="col-md-12  sectionblock">';
		
			echo '<div class="row"><div class="col-md-6">';
			echo $this->Form->create('User');
			echo $this->Form->input('name', array('class'=>'form-control ','label'=>__('Your Name'),'placeholder'=>__('Your Name'),'tabindex'=> "1"));
			echo $this->Form->input('username', array('class'=>'form-control ','label'=>__('Username'),'placeholder'=>__('Username'),'tabindex'=> "1"));
			echo $this->Form->input('password', array('class'=>'form-control ','label'=>__('Password'),'placeholder'=>__('Password'),'tabindex'=> "1"));
			echo $this->Form->input('verify_password', array('class'=>'form-control ','label'=>__('Verifying Password'),'placeholder'=>__('Verifying Password'),'tabindex'=> "1"));
			echo $this->Form->input('email', array('class'=>'form-control ','label'=>__('Your Email'),'placeholder'=>__('Your Email'),'tabindex'=> "2"));
			echo $this->Form->input('website', array('class'=>'form-control ','label'=>__('Website'),'placeholder'=>__('Website'),'tabindex'=> "3"));
			$options = array('label' => __('Register'), 'class' => 'btn btn-default');
			echo $this->Form->end($options); 
			echo '</div>';
			echo '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
	
?>
