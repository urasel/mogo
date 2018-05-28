<!-- footer wrapper start-->
	<?php $currentLng = $this->Session->read('Config.language');?>
    <div class="footer_wrapper">
        <div class="container">
            <div class="box_1_wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="address_main">
                            <div class="footer_widget_add">
								<!--<a href="<?php echo $this->webroot;?>"><img src="images/footer_logo.png" class="img-responsive" alt="footer_logo" />-->
								<?php echo $this->Html->image('logo.png',array('url' => '/','class' => 'img-responsive')); ?>
                                <p style="text-align="justify">Infomap24 , is your daily online reference guide where you can get information starting from education ,history , lifestyle & places to health , banking , fooding , travelling and what not.</p>
                                
                            </div>
                            <div class="footer_box_add">
                                <ul>
                                    <!--<li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address : </span>-512/fonia,canada</li>-->
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us : </span>+61 5001444-122</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> info@infomap24.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer_1-->
            <div class="booking_box_div">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_main_wrapper">
                           <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 gallary_response hidden-sm">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10"><?php echo __('Popular Categories');?></h1>
                                </div>
								<div class="footer_ul_wrapper">
									<ul class="listArticles">
									<?php 
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('About Us'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'aboutus','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Terms & Condition'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'terms_condition','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										
										?>
									</ul>
								</div>
							</div>
                            <!--footer_2-->
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 gallary_response hidden-sm">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10"><?php echo __('Userful Links');?></h1>
                                </div>
                                <div class="footer_ul_wrapper">
									<ul class="listArticles">
									<?php 
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('About Us'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'aboutus','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Terms & Condition'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'terms_condition','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>';
										echo $this->Html->link(__('Privacy & Policy'),array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=> 'privacy_policy','language' =>$currentLng));
										echo '</li>';
										
										?>
									</ul>
                                </div>
                            </div>
                            <!--footer_3-->
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 contact_last_div">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10"><?php echo __('Email Newsletters');?></h1>
                                </div>
                                <div class="footer_cnct">
								<?php 
								echo $this->Form->create('SubscriberList',array('url' => array('plugin' => 'information','controller' => 'subscriber_lists', 'action' => 'subscription','language' =>$currentLng),'class' =>'nino-subscribeForm'));
								echo '<div class="input-group input-group-lg">';
									echo '<div class="row">';
									echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
									echo $this->Form->input('email',array('placeholder'=>"Your Email",'label' =>false ,'div'=>false,'class' =>'form-control'));
									echo '</div>';
									echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
									echo '<span class="input-group-btn">';
									echo $this->Form->button(__('Subscribe'),array('type'=>'submit','class'=>"btn btn-success btn-block"));
									echo '</span>';
									echo '</div>';
									echo '</div>';
								echo '</div>';
								echo $this->Form->end();
								?>
                                </div>
                            </div>
                            <!--footer_4-->
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_botm_wrapper">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="bottom_footer_copy_wrapper">
									<span>Copyright &copy; 2018- <a href="<?php echo $this->webroot;?>">Infomap24.Com</a></span>
								</div>
                                <div class="footer_btm_icon">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.facebook.com/infomap24"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer_5-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="up_wrapper">
				<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--footer wrapper end-->