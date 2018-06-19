<!-- preloader Start -->
    <div id="preloader">
        <div id="status"><?php echo $this->Html->image('page-loader003.gif',array('id' => 'preloader_image'));?></div>
    </div>
    <!--top header start-->
	<?php
	$userData = $this->Session->read('Auth.User');
	$userID = $userData['id'];
	$currentLng = $this->Session->read('Config.language');
	
	?>
    <div class="top_header_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="top_header_add">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us :</span> +61 5001444-122</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> info@infomap24.com</a></li>
                        </ul>
                    </div>
                    <div class="top_login">
					
                        <ul>
							<?php
								if(empty($userID)){
								echo '<li><i class="fa fa-user" aria-hidden="true"></i>';
								echo $this->Html->link(__('Sign Up'),array('plugin'=>'users','controller'=>'users','action'=>'add'));
								echo '</li>';
								echo '<li><i class="fa fa-sign-in" aria-hidden="true"></i>';
								echo $this->Html->link(__('Log In'),array('plugin'=>'users','controller'=>'users','action'=>'login'));
								echo '</li>';
								}else{
								echo '<li><i class="fa fa-sign-in" aria-hidden="true"></i>';
								echo $this->Html->link(__('Logout'),array('plugin'=>'users','controller'=>'users','action'=>'logout'));
								echo '</li>';
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>