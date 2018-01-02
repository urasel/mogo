<?php
	$this->loadHelpers(array('Language'));
	//debug($this->Session->read('Auth'));
	$userData = $this->Session->read('Auth.User');
	$userID = $userData['id'];
	$currentLng = $this->Session->read('Config.language');

?>
<!-- Header
    ================================================== -->
<header id="nino-header">
		<div id="nino-headerInner">					
			<nav id="nino-navbar" class="navbar navbar-default" role="navigation">
				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nino-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="nino-menuItem pull-right">
						<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo $this->webroot;?>">Home</a></li>
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
							</ul>
						</div><!-- /.navbar-collapse -->
						<ul class="nino-iconsGroup nav navbar-nav">
							<li><a href="#"><i class="mdi mdi-cart-outline nino-icon"></i></a></li>
							<li><a href="#" class="nino-search"><i class="mdi mdi-magnify nino-icon"></i></a></li>
						</ul>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
			

		</div>
	</header><!--/#header-->