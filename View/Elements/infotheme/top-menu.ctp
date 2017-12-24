<?php
$this->loadHelpers(array('Language'));
//debug($this->Session->read('Auth'));
$userData = $this->Session->read('Auth.User');
$userID = $userData['id'];
$currentLng = $this->Session->read('Config.language');

?>
<header class="header">
	<div class="container">
		<div class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<!--<a href="index.html" class="navbar-brand">ATLAS <br> <span class="slogo">CREATIVE <span></a>-->
					<a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a>
				</div><!-- end navbar-header -->
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li>
					<?php
					echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form navbar-right','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng)));
					echo $this->Form->input('searchname',array('label'=>false,'div'=>false,'class'=>"form-control navbarinputbox",'placeholder'=> __("I'm looking for...")));
					echo '&nbsp;<span class="searchNavem">Near</span>&nbsp;';
					echo $this->Form->input('locations',array('label'=>false,'div'=>false,'class'=>"form-control searchlocation navbarinputbox",'placeholder'=> __("Bangladesh")));
					echo $this->Form->unlockField('locationTypes');
					echo $this->Form->unlockField('locationId');
					echo $this->Form->input('locationTypes',array('type'=>'hidden'));
					echo $this->Form->input('locationId',array('type'=>'hidden'));
					
					echo $this->Form->input('&nbsp;', 
						array('type'=>"button",
							  'class'=>'btn btn-default search searchnavbtn',
							  'div'=>false, 
							  'label'=>false));
					echo $this->Form->end();
					
					?>
					</li>
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
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</div>
	</div><!-- end container -->
</header>