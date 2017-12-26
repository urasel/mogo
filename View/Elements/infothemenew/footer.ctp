<!-- Footer
    ================================================== -->
	<?php $currentLng = $this->Session->read('Config.language');?>
    <footer id="footer">
        <div class="container">
        	<div class="row">
        		<div class="col-md-4">
        			<div class="colInfo">
	        			<div class="footerLogo row">
							<div class="col-md-12">
								<a class="navbar-brand" href="<?php echo $this->webroot;?>"></a>	
							</div>
	        			</div>
	        			<p>
	        				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	        			</p>
	        			<div class="nino-followUs">
	        				<div class="totalFollow"><span>15k</span> followers</div>
	        				<div class="socialNetwork">
	        					<span class="text">Follow Us: </span>
	        					<a href="https://www.facebook.com/infomap24" class="nino-icon"><i class="mdi mdi-facebook"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-twitter"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-instagram"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-pinterest"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-google-plus"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-youtube-play"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-dribbble"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-tumblr"></i></a>
	        				</div>
	        			</div>
						<h4><?php echo __('Email Newsletters');?></h4>
						<?php 
						echo $this->Form->create('SubscriberList',array('url' => array('plugin' => 'information','controller' => 'subscriber_lists', 'action' => 'subscription','language' =>$currentLng),'class' =>'nino-subscribeForm'));
						echo '<div class="input-group input-group-lg">';
							echo $this->Form->input('email',array('placeholder'=>"Your Email",'label' =>false ,'div'=>false,'class' =>'form-control'));
							echo '<span class="input-group-btn">';
							echo $this->Form->button(__('Subscribe'),array('type'=>'submit','class'=>"btn btn-success"));
							echo '</span>';
						echo '</div>';
						echo $this->Form->end();
						?>
						
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">About Us</h3>
						<div class="footer-link">
							<ul class="listArticles">
							<?php 
							echo '<li layout="row" class="verticalCenter">';
							echo $this->Html->link(__('About Us'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'aboutus','language' =>$currentLng));
							echo '</li>';
							echo '<li layout="row" class="verticalCenter">';
							echo $this->Html->link(__('Terms & Condition'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'terms_condition','language' =>$currentLng));
							echo '</li>';
							echo '<li layout="row" class="verticalCenter">';
							echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
							echo '</li>';
							
							?>
							</ul>
						</div>
        			</div>
					<div class="colInfo">
	        			<h3 class="nino-colHeading">Help & Support</h3>
						<div class="footer-link">
							<ul class="listArticles">
							<?php 
							echo '<li layout="row" class="verticalCenter">';
							echo $this->Html->link(__('Log In'),array('plugin'=>'users','controller' => 'users', 'action' => 'login'));
							echo '</li>';
							echo '<li layout="row" class="verticalCenter">';
							echo $this->Html->link(__('Contact Us'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'contact','language' =>$currentLng));
							echo '</li>';
							?>
							</ul>
						</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">instagram</h3>
	        			<div class="instagramImages clearfix">
	        				<a href="#"><img src="images/instagram/img-1.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-2.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-3.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-4.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-5.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-6.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-7.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-8.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-9.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-3.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-4.jpg" alt=""></a>
	        				<a href="#"><img src="images/instagram/img-5.jpg" alt=""></a>
	        			</div>
	        			<a href="#" class="morePhoto">View more photos</a>
        			</div>
        		</div>
        	</div>
			<div class="nino-copyright">
			<p class="text-muted"><?php echo __('Copyright &copy; 2017'); ?> <a href="http://www.infomap24.com" alt="<?php echo __('Learn about your surroundings');?>">InfoMap24</a></p>
			</div>
        </div>
		<?php echo $this->Html->script('imageloader/echo.min'); ?>
		  <script>
		  echo.init({
			offset: 200,
			throttle: 250,
			unload: false,
			callback: function (element, op) {
			  console.log(element, 'has been', op + 'ed')
			}
		  });
		  </script>
    </footer><!--/#footer-->
	
	<!-- Search Form - Display when click magnify icon in menu
    ================================================== -->
		<?php 
			$currentLng = $this->Session->read('Config.language');
			echo $this->Form->create('Siteaction',array('name' =>'searchform','id' =>'nino-searchForm','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
				
						<?php 
						echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control nino-searchInput", 'id'=>"searchcontent1",'data-toggle'=>"tooltip", 'data-placement'=>"top",'div'=>false,'title'=> __("Type What You Want to Search, For language change press Ctrl+g and type Bangla"),'placeholder'=> __("I'm looking for...")));
						echo $this->Form->unlockField('Siteaction.place_id');
						echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
						?>
						<i class="mdi mdi-close nino-close"></i>
						</button>
					
		<?php echo $this->Form->end(); ?>
	
	
	
	
	<!-- Scroll to top
    ================================================== -->
<a href="#" id="nino-scrollToTop">Go to Top</a>