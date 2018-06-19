<?php
$this->Html->addCrumb(__('InfoMap24 Login'),  '' , array('class' => 'active'));
$currentLng = $this->Session->read('Config.language');
	echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">';
			echo '<div class="blog_about">';
				echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
				echo $this->Form->input('username', array('class'=>'form-control','label'=>__('Email'),'placeholder'=>__('Email')));
				echo $this->Form->input('password', array('class'=>'form-control','label'=>__('Password'),'placeholder'=>__('Password')));
				$options = array('label' => __('Sign in'), 'class' => 'btn btn-block bt-login siteloginbtn');
				echo '<br/>';
				echo $this->Form->end($options);
				//echo $this->Form->button('Sign in', array( 'id' => 'login_btn', 'value'=> 'Sign in', 'type'=> 'submit', 'class' =>'btn btn-block bt-login siteloginbtn') );
				echo '<h4 class="text-center login-txt-center">'.__('You can log in using bellow method').'</h4>'; 
				//echo $this->Html->link('Signin with Facebook',array(),array('class' =>'btn btn-default facebook'));
				?>
				<?php echo $this->Html->link(__d('croogo', __('<i class="fa fa-facebook modal-icons"></i> Signin with Facebook')), array('controller' => 'users', 'action' => 'social_login','site' => 'Facebook'),array('class'=>"btn btn-block bt-login facebookbtn",'escape' => false));?>
				<?php echo $this->Html->link(__d('croogo', __('<i class="fa fa-google-plus modal-icons"></i> Signin with Google')), array('controller' => 'users', 'action' => 'social_login','site' => 'Google'),array('class'=>"btn btn-block bt-login googlebtn",'escape' => false));?>
				<?php
				
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
		
		echo '<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">';
		
		echo '</div>';
	echo '</div>';
	echo '</div>';
?>
