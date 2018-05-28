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
                                        <input type="text" placeholder="Search here">
                                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
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
										echo $this->Html->link(__('Register'),array('plugin'=>'users','controller'=>'users','action'=>'add','language' => $currentLng));
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
                                    <li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">contact</a>
									  <ul class="dropdown-menu hovr_nav_tab">
										<li><a href="contact_us.html">contact us</a></li>
										<li><a href="appointment.html">Social Media</a></li>
									  </ul>
									</li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                    </nav>
                    <div class="rp_mobail_menu_main_wrapper visible-xs">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="gc_logo logo_hidn">
                                    <!--<h1><a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a></h1>-->
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
                            <h1><a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a></h1>
							
                            <div id="toggle_close">&times;</div>
                            <div id='cssmenu' class="wd_single_index_menu">
                                <ul>
                                    <li class='has-sub'><a href='#'>index</a>
                                       <ul>
                                           <li><a href="index-2.html">index 1</a></li>
                                           <li><a href="index_2.html">index 2</a></li>
                                        </ul>
                                     </li>
									 <li><a href="about_us.html">about us</a></li>
									 <li class='has-sub'><a href='#'>services</a>
                                       <ul>
                                           <li><a href="services.html">services</a></li>
                                           <li><a href="event.html">events</a></li>
                                           <li><a href="pricing.html">pricing</a></li>
                                        </ul>
                                     </li>
									  <li class='has-sub'><a href='#'>doctors</a>
                                       <ul>
                                           <li><a href="doctor.html">doctor single</a></li>
                                           <li><a href="our_doctors.html">our doctors</a></li>
                                        </ul>
                                     </li>
									 <li class='has-sub'><a href='#'>gallery</a>
                                       <ul>
                                           <li><a href="gallery_2.html">gallery 2</a></li>
                                           <li><a href="gallery_3.html">gallery 3</a></li>
                                           <li><a href="gallery_4.html">gallery 4</a></li>
                                        </ul>
                                     </li>
                                    <li class='has-sub'><a href='#'>blog</a>
                                       <ul>
                                           <li><a href="blog_category.html">blog category</a></li>
                                           <li><a href="blog_single.html">blog single</a></li>
                                        </ul>
                                     </li>
                                    <li class='has-sub'><a href='#'>contact</a>
                                       <ul>
                                           <li><a href="contact_us.html">contact us</a></li>
                                           <li><a href="appointment.html">appointment </a></li>
                                        </ul>
                                     </li>
                                    <li><a href="#">Log In / Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header wrapper end-->