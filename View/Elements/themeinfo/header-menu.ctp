<!--header menu wrapper-->
<?php
	$this->loadHelpers(array('Language'));
	//debug($this->Session->read('Auth'));
	$userData = $this->Session->read('Auth.User');
	$userID = $userData['id'];
	$currentLng = $this->Session->read('Config.language');

?>
    <div class="menu_wrapper header-area hidden-menu-bar stick">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 wow bounceInDown" data-wow-delay="0.6s">
                    <div class="header_logo">
                        <!--<a href="index-2.html" class="hidden-xs"><?php //echo $this->Html->image('logo.png',array(class="img-responsive")); ?></a>-->
						<a class="navbar-brand hidden-xs" href="<?php echo $this->webroot;?>">&nbsp;</a>
						<?php //echo $this->Html->image('logo.png', array('url' => array('controller'=>'topics','action'=>'home','class' =>'hidden-xs')); ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
                    <nav class="navbar hidden-xs">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse respose_nav" id="bs-example-navbar-collapse-1">
							 <div class="et_navbar_search_wrapper hidden-xs">
                                    <div class="et_search_bar" id="search_button">
                                         <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                    <div id="search_open" class="et_search_box">
										
										<?php 
											$currentLng = $this->Session->read('Config.language');
											echo $this->Form->create('Siteaction',array('name' =>'searchform','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
											
													
															<?php 
															echo $this->Form->input('searchname',array('label'=>false, 'id'=>"searchcontent",'data-toggle'=>"tooltip", 'data-placement'=>"top",'title'=> __("Type What You Want to Search"),'placeholder'=> __("I'm looking for...")));
															echo $this->Form->unlockField('Siteaction.place_id');
															echo $this->Form->input('place_id', array('type'=>'hidden','placeholder'=>__('Location'))); 
															?>
															<button><i class="fa fa-search" aria-hidden="true"></i></button>
													
										<?php echo $this->Form->end(); ?>
										
                                    </div>
                                </div>
                                <ul class="nav navbar-nav" id="nav_filter">
									<li><a href="<?php echo $this->webroot;?>">Home</a></li>
									<li>
										<?php
										if($queryCountry != 'all'){
											echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry)));
										}else{
											echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng));
										}
										?>
									</li>
									<li>
										<?php 
										if($currentLng == 'bn'){
										echo $this->Html->link(__('English'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'en'));
										}else{
										echo $this->Html->link(__('বাংলা'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'bn'));
										}
										
										?>
									</li>
									<?php
										if(empty($userID)){
										echo '<li>';
										echo $this->Html->link(__('Sign Up'),array('plugin'=>'users','controller'=>'users','action'=>'add'));
										echo '</li>';
										echo '<li>';
										echo $this->Html->link(__('Log In'),array('plugin'=>'users','controller'=>'users','action'=>'login'));
										echo '</li>';
										}else{
										echo '<li>';
										echo $this->Html->link(__('Logout'),array('plugin'=>'users','controller'=>'users','action'=>'logout'));
										echo '</li>';
										}
									?>
                                    
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                    </nav>
                    <div class="rp_mobail_menu_main_wrapper visible-xs">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="gc_logo logo_hidn">
                                    <a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div id="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#333" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#333" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#333" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#333" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#333" />
                                            </g>
                                        </g>
                                    </svg>
                                </div>
								<div class="et_search_bar_2" id="search_button_second">
									 <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
								</div>
								
                            </div>
							<div id="search_open_second" class="et_search_box">
								<input type="text" placeholder="Search here">
								<button><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
                        </div>

                        <div id="sidebar">
                            <h2><a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a></h2>
							
                            <div id="toggle_close">&times;</div>
                            <div id='cssmenu' class="wd_single_index_menu">
                               
								 <ul>
									<li><a href="<?php echo $this->webroot;?>">Home</a></li>
									<li>
										<?php
										if($queryCountry != 'all'){
											echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry)));
										}else{
											echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng));
										}
										?>
									</li>
									<li>
										<?php 
										if($currentLng == 'bn'){
										echo $this->Html->link(__('English'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'en'));
										}else{
										echo $this->Html->link(__('বাংলা'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'bn'));
										}
										
										?>
									</li>
									<?php
										if(empty($userID)){
										echo '<li>';
										echo $this->Html->link(__('Register'),array('plugin'=>'users','controller'=>'users','action'=>'add'));
										echo '</li>';
										echo '<li>';
										echo $this->Html->link(__('Login'),array('plugin'=>'users','controller'=>'users','action'=>'login'));
										echo '</li>';
										}else{
										echo '<li>';
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
        </div>
    </div>
    <!--header wrapper end-->