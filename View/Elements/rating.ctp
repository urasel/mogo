<!-- Button trigger modal -->

<button type="button" class="btn btn-primary btn-lg reviewbtn" data-toggle="modal" data-target="#myModal"><?php echo __("Write a Review"); ?></button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <?php 
	$userData = $this->Session->read('Auth.User');
	$userID = $userData['id'];
	if(!empty($userID))
	
	{
	?>
    <div class="modal-content">
	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo __("Your first-hand experiences really help other travellers. Thanks!"); ?></h4>
      </div>
      <div class="modal-body">
	  
	  <form id="form4">
		   <div class="Clear">
		   <h2>Your Overall Ratings of This place</h2>
		   <p>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="0.5"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="1.0"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="1.5"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="2.0"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="2.5"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="3.0"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="3.5"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="4.0"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="4.5"/>
			<input class="star {split:2}" type="radio" name="test-4-rating-3" value="5.0"/>
			</p>
		   </div>
		   <input type="submit" value="Submit scores!" />  </td>

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  <?php } else{ 
?>
	<div class="modal-content">
	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo __("InfoMap24 Login"); ?></h4>
      </div>
      <div class="modal-body">
<?php
$currentLng = $this->Session->read('Config.language');
	echo '<div class="row">';
		//echo $this->Session->flash('auth');
		echo '<div class="col-md-6">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-body">';
		echo $this->Form->create('User', array('url' => array('plugin' => 'users','controller' => 'users', 'action' => 'login')));
		echo $this->Form->input('username', array('class'=>'form-control','label'=>__('Email'),'placeholder'=>__('Email')));
		echo $this->Form->input('password', array('class'=>'form-control','label'=>__('Password'),'placeholder'=>__('Password')));
		$options = array('label' => __('Sign in'), 'class' => 'btn btn-block bt-login siteloginbtn');
		echo $this->Form->end($options);
		//echo $this->Form->button('Sign in', array( 'id' => 'login_btn', 'value'=> 'Sign in', 'type'=> 'submit', 'class' =>'btn btn-block bt-login siteloginbtn') );
		echo '<h4 class="text-center login-txt-center">'.__('You can log in using bellow method').'</h4>'; 
		//echo $this->Html->link('Signin with Facebook',array(),array('class' =>'btn btn-default facebook'));
		?>
		<?php echo $this->Html->link(__d('croogo', __('<i class="fa fa-facebook modal-icons"></i> Signin with Facebook')), array('controller' => 'users', 'action' => 'social_login','site' => 'Facebook'),array('class'=>"btn btn-block bt-login facebookbtn",'escape' => false));?>
		<?php echo $this->Html->link(__d('croogo', __('<i class="fa fa-google-plus modal-icons"></i> Signin with Google')), array('controller' => 'users', 'action' => 'social_login','site' => 'Google'),array('class'=>"btn btn-block bt-login googlebtn",'escape' => false));?>
		<?php
		echo '<br/>';
		$options = array('label' => __('Login'), 'class' => 'btn btn-default');
		//echo $this->Form->end($options);
		//echo '<a href="' . $fb_login_url . '">Log in with Facebook!</a>';
		/*
		echo $this->Html->link(__d('croogo', __('Forgot password ?')), array(
			'controller' => 'users', 'action' => 'forgot',
		));
		*/
		?>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<i class="fa fa-lock"></i>
				<?php echo $this->Html->link(__d('croogo', __('Forgot password ?')), array('controller' => 'users', 'action' => 'forgot'));?>
			
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6">
				<i class="fa fa-check"></i>
				<?php echo $this->Html->link(__d('croogo', __('Sign Up')), array('plugin'=>'users','controller'=>'users','action'=>'add','language' => $currentLng));?>
			</div>
		</div>
		<?php
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	echo '</div>';
	echo '</div>';
	echo '</div>';
  ?>
  
   <?php }?>
  </div>
</div>