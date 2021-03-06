<?php
$currentLng = $this->Session->read('Config.language');
?>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
<div class="footer">
      <div class="container">
	  <div id="row">
	  <div class="footerheader">
		<div class="col-md-12 nopadding">
			<div id="row">
				<div class="col-md-6 col-sm-6 col-xs-12 nopadding">
				<a class="navbar-brand navfooter" href="<?php echo $this->webroot;?>">&nbsp;</a>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 nopadding">
				
				</div>
			 </div>
		</div>
		</div>
	  </div>
	  <div id="row">
		<div class="col-md-3 col-sm-6 col-xs-12 socialpagelinks nopadding margintop15px">
		
		<section class="oximap-links">
		<h4><?php echo __('Social Media');?></h4>
		<a href="https://www.facebook.com/infomap24" class="footer-icon-button facebook"><i class="fa fa-facebook"></i><span></span></a>
		<a href="http://twitter.com" class="footer-icon-button twitter"><i class="fa fa-twitter"></i><span></span></a>
		<a href="http://plus.google.com" class="footer-icon-button google-plus"><i class="fa fa-google-plus"></i><span></span></a>
		<h4><?php echo __('About Us');?></h4>
		<div>
		<?php 
		echo $this->Html->link(__('About Us'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'aboutus','language' =>$currentLng));
		echo $this->Html->link(__('Terms & Condition'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'terms_condition','language' =>$currentLng));
		echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
		
		?>
		</div>
		
		</section>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 nopadding margintop15px">
		<section class="directory-links">
		<h4><?php echo __('Help & Support');?></h4>
		<div>
		<?php 
		echo $this->Html->link(__('Log In'),array('plugin'=>'users','controller' => 'users', 'action' => 'login'));
		echo $this->Html->link(__('Contact Us'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'contact','language' =>$currentLng));
		?>
		</div>
		<div>
		<?php 
		
		?>
		</div>
		</section>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12 socialpagelinks nopadding margintop15px">
		<h4><?php echo __('Email Newsletters');?></h4>
		<div>
		<p><?php echo __('Sign up for new InfoMap24 content, updates, surveys & offers.');?></p>
		<?php 
		echo $this->Form->create('SubscriberList',array('url' => array('plugin' => 'information','controller' => 'subscriber_lists', 'action' => 'subscription','language' =>$currentLng)));
		echo $this->Form->input('email',array('label' =>false ,'class' =>'subscribebox'));
		echo $this->Form->button(__('Submit'), array( 'id' => 'login_btn', 'value'=> 'Submit', 'type'=> 'submit', 'class' =>'btn btn-block bt-login') );
		?>
		</div>
		</div>
	  </div>
	  </div>
	  <div class="container">
	  <div id="row">
		<div class="col-md-12 nopadding">
			<div id="row">
				<div class="col-md-12 nopadding">
				<p class="text-muted"><?php echo __('Copyright &copy; 2015'); ?> <a href="http://www.infomap24.com" alt="<?php echo __('Learn about your surroundings');?>">InfoMap24</a></p>
				</div>
			 </div>
		</div>
	  </div>
	  </div>
</div>
