<?php
$this->loadHelpers(array('Language'));
$userData = $this->Session->read('Auth.User');
$userID = $userData['id'];
$currentLng = $this->Session->read('Config.language');
?>
<div class="col-md-12">
<div class="row">

<div class="bannercontainer" style="display:none">
<nav class="navbar navtop navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
		
			<li>
				<?php echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng));?>
			</li>
			<li>
				<?php 
				if($currentLng == 'bn'){
				echo $this->Html->link(__('English'),array('controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'en'));
				}else{
				echo $this->Html->link(__('বাংলা'),array('controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'bn'));
				}
				
				?>
			</li>
			
		  </ul>
		  
			
          <ul class="nav navbar-nav navbar-right">
			<?php
			if(empty($userID)){
			echo '<li>';
			echo $this->Html->link(__('Register'),array('plugin'=>'users','controller'=>'users','action'=>'add','language' => $currentLng));
			echo '</li>';
			
			echo '<li>';
			echo '<i class="fa fa-user profileicon"></i>';
			echo $this->Html->link(__('Login'),array('plugin'=>'users','controller'=>'users','action'=>'login'));
			echo '</li>';
			
			}else{
			echo '<li class="dropdown">';
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.__('Admin Menu').'<strong class="caret"></strong></a>';
						echo '<ul class="dropdown-menu">';
							echo '<li>';
								echo $this->Html->link(__('Site Pages'),array('controller'=>'frontpages','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('All Points'),array('controller'=>'points','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Quiz Management'),array('controller'=>'quiz_questions','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Access Information'),array('controller'=>'accesslogs','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Place Add'),array('controller'=>'points','action'=>'placeadd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Hospital Add'),array('controller'=>'points','action'=>'hospitaladd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Doctor Add'),array('controller'=>'points','action'=>'doctoradd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link(__('Topic Add'),array('controller'=>'points','action'=>'topicadd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Blood News',array('controller'=>'blood_news','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Blood Groups',array('controller'=>'blood_groups','action'=>'index'));
							echo '</li>';
							
						echo '</ul>';
			echo '</li>';
			echo '<li>|';
			echo '</li>';
			echo '<li>';
			echo '<i class="fa fa-user profileicon"></i>';
			echo $this->Html->link(__('Logout'),array('plugin'=>'users','controller'=>'users','action'=>'logout'));
			echo '</li>';	
			}
			?>
				
		</ul>
		<?php echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form navbar-right menusearch','action'=>'searchitem')); ?>
		<?php echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form navbar-right menusearch','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem'))); ?>
			<div class="form-group searchblock">
				<?php 
				echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontenttop",'placeholder'=> __("I'm looking for...")));
				echo $this->Form->unlockField('Siteaction.place_id');
				echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
				?>
				
			</div> 
			<button type="submit" class="btn btn-default search">
			&nbsp;
			</button>
		<?php echo $this->Form->end(); ?>
        </div>
      </div>
</nav>
<div class="container notificationblock bodycolor">
	<div class="row">
		<div class="col-md-12 mostimportant">
		</div>
	</div>
	<div class="row">
	<div class="col-md-12 searchblock">
	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-6" style="margin-top:60px;">
		<?php //echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','action'=>'searchitem')); ?>
		<?php echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem'))); ?>
				<p><h1><?php echo __('Find Your Nearest !!');?></h1></p>
				<div class="form-group col-md-6 col-xs-6 nopadding">
			
					<?php 
					echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontent", 'id'=>"searchcontent1",'data-toggle'=>"tooltip", 'data-placement'=>"top",'title'=> __("Type What You Want to Search, Fro language change press Ctrl+g and type Bangla"),'placeholder'=> __("I'm looking for...")));
					echo $this->Form->unlockField('Siteaction.place_id');
					echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
					?>
				</div> 
				<div class="form-group col-md-3 col-xs-3 nopadding">
				<button type="submit" class="btn btn-default search">
				
				&nbsp;
				</button>
				</div>
		<?php echo $this->Form->end(); 
		//$decodeData = json_decode($bloodnews);
		//debug($decodeData);
		?>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-6">
		<div class="col-md-12 statusblock">
		<?php
		$decodeData = json_decode($bloodnews);
		//debug($decodeData);
		//debug($bloodnews);exit;
		if(isset($bloodnews)){
		echo '<div class="row topstatus">';
		echo '<div class="col-md-12">';
		echo '<ul>';
		foreach($decodeData as $bnews):
		echo '<li>';
		echo '<i class="fa fa-tint"></i>';
		$linkText = '<span class="title">'.$bnews->BloodGroup->name.__(' Blood Needed').'</span>';
		
		$alt = $bnews->BloodGroup->name.__(' Blood Needed');
		echo $this->Html->link($linkText, array('plugin'=>'information','controller'=>'blood_news','action'=>'view','id'=> $bnews->BloodNews->id,'ext' => 'asp'),array('escape'=>false,'alt' =>$alt));
		
		echo '<p class="details"><b>'.__('Contact Info').':</b>'.$bnews->User->firstname.','.$bnews->BloodNews->mobile;
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$requireddate = $bnews->BloodNews->required_date;
			$requireddate = $this->Language->bangladate(date('d F Y',strtotime($requireddate)));
		}else{
			$requireddate = $bnews->BloodNews->required_date;
			$requireddate = date('d F Y',strtotime($requireddate));
		}
		
		echo '<br/><b>'.__('Date').':</b>  '.$requireddate.'</p>';
		echo '</li>';
		
		endforeach;
		echo '<li>';
		echo '<div class="row">';
		echo '<div class="col-md-6">';
		echo $this->Html->link(__('Add New'), array('plugin'=>'information','controller'=>'blood_news','action'=>'add','params'=>'add','ext' => 'asp'),array('escape'=>false,'alt' => '','class' =>'buttonblack'));
		echo '</div>';
		echo '<div class="col-md-6">';
		echo $this->Html->link(__('View All'), array('plugin'=>'information','controller'=>'blood_news','action'=>'listing','params'=>'all_blood_informations','ext' => 'asp'),array('escape'=>false,'alt' => '','class' =>'buttonblack'));
		echo '</div>';
		echo '</div>';
		echo '</li>';
		
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		}
		?>
		</div>
		</div>
	</div>
	</div>
		
	</div>
	</div>

</div>
<nav class="navbar navbar-default navbar-fixed-top oxitopmenu fixed">
      <div class="container tomenudiv">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbartwo" aria-expanded="false" aria-controls="navbartwo">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->webroot;?>">&nbsp;</a>
        </div>
        <div id="navbartwo" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
			<li>
				<?php echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng));?>
			</li>
			<li>
				<?php 
				
				if($currentLng == 'bn'){
				echo $this->Html->link(__('English'),array('controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'en'));
				}else{
				echo $this->Html->link(__('বাংলা'),array('controller' => 'siteactions', 'action' => 'changeLanguage', 'language' => 'bn'));
				}
				
				?>
			</li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<?php
			if(empty($userID)){
			echo '<li>';
			echo $this->Html->link(__('Register'),array('plugin'=>'users','controller'=>'users','action'=>'add','language' => $currentLng));
			echo '</li>';
			
			echo '<li>';
			echo '<i class="fa fa-user profileicon"></i>';
			echo $this->Html->link(__('Login'),'http://localhost/infocroogo/login');
			echo '</li>';
			}
			?>
			<?php 
			if(!empty($userID)){
			
			echo '<li class="dropdown">';
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.__('Admin Menu').'<strong class="caret"></strong></a>';
						echo '<ul class="dropdown-menu">';
							echo '<li>';
								echo $this->Html->link('Site Pages',array('controller'=>'frontpages','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('All Points',array('controller'=>'points','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Quiz Management',array('controller'=>'quiz_questions','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Access Information',array('controller'=>'accesslogs','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Place Add',array('controller'=>'points','action'=>'placeadd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Hospital Add',array('controller'=>'points','action'=>'hospitaladd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Doctor Add',array('controller'=>'points','action'=>'doctoradd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Topic Add',array('controller'=>'points','action'=>'topicadd'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Blood News',array('controller'=>'blood_news','action'=>'index'));
							echo '</li>';
							echo '<li>';
								echo $this->Html->link('Blood Groups',array('controller'=>'blood_groups','action'=>'index'));
							echo '</li>';
							
						echo '</ul>';
			echo '</li>';
			
			echo '<li>';
				echo '<i class="fa fa-user profileicon"></i>';
				echo $this->Html->link(__('Logout'),array('plugin'=>'users','controller'=>'users','action'=>'logout'));
			echo '</li>';
			}
			
			
			?>
		</ul>
		  
		  <?php //echo $this->Form->create('Point',array('name' =>'searchform','class' =>'navbar-form navbar-right menusearch','action'=>'searchitem')); ?>
		  <?php echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form navbar-right menusearch','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
			<div class="form-group searchblock">
				<?php 
				echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontenttop",'placeholder'=> __("I'm looking for...")));
				echo $this->Form->unlockField('Siteaction.place_id');
				echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
				?>
				
			</div> 
			<button type="submit" class="btn btn-default search">
			&nbsp;
			</button>
		<?php echo $this->Form->end(); ?>
        </div>
      </div>
    </nav>
</div>




<?php
$currentpage = $this->request->here;
if ($this->request->here == '/infocroogo/') {
?>
<script>
$(window).scroll(function(){
  
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();
  $('.bannercontainer').css('background-position', '50% ' + parseInt(-scroll + 0) + 'px');
  if (scroll >= 385) {
  $('.oxitopmenu').addClass('fixed');
  $('.oxitopmenu').addClass('navbarheaderview');
  $('#contentpad').addClass('toppad50');
  }
  else {
  sticky.removeClass('fixed');
  $('#contentpad').removeClass('toppad50');
  $('.oxitopmenu').removeClass('navbarheaderview');
  }
});
$(document).ready(function(){
	$('.bannercontainer').show();
});
</script>
<?php }else{ ?>
<script>
$(document).ready(function(){
  $('.oxitopmenu').show();
  $('.oxitopmenu').addClass('fixed');
  $('.bannercontainer').hide();
  $('#content-whole').css('margin-top', '18px');
});

</script>

<?php } ?>
<script>
	$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
	});
	$(document).ready(function(){
		
		$( ".searchcontent" ).autocomplete({
		  minLength: 0,
		  source: '<?php echo $this->base; ?>/information/siteactions/getPlaces',
		  search: function(event, ui) { 
			   $('.spinner').show();
		  },
		  response: function(event, ui) {
			   $('.spinner').hide();
		  },
		  focus: function( event, ui ) {
			return false;
		  },
		  select: function( event, ui ) {
			$( ".placeid" ).val( ui.item.id );
			$( ".searchcontent" ).val( ui.item.label );
			return false;
		  }
		})
		.autocomplete( "instance" )._renderItem = function( ul, item ) {
		  return $( "<li>" )
			.append( "<div class='searchresult'><div class='iconblock'><i class='" + item.icon + "'></i></div><div class='infoblock'>"+ item.label+"<br/><span>"+ item.thana+","+ item.district+",<b>"+ item.division+"</b></span></div></div>")
			.appendTo( ul );
		};
		
		$( ".searchcontenttop" ).autocomplete({
		  minLength: 0,
		  source: '<?php echo $this->base; ?>/information/siteactions/getPlaces',
		  focus: function( event, ui ) {
			return false;
		  },
		  select: function( event, ui ) {
			$( ".placeid" ).val( ui.item.id );
			$( ".searchcontenttop" ).val( ui.item.label );
			return false;
		  }
		})
		.autocomplete( "instance" )._renderItem = function( ul, item ) {
		  return $( "<li>" )
			.append( "<div class='searchblock'><div class='iconblock'><i class='" + item.icon + "'></i></div><div class='infoblock'>"+ item.label+"<br/><span>"+ item.address+"</b></span></div></div>")
			.appendTo( ul );
		};
		
		$(".searchlocation").autocomplete({
            source: '<?php echo $this->base; ?>/general/bd_thanas/getlocation',
            minLength: 1,
			select: function(event, ui) {
                var $spec = ui.item.id;
				$(".locationid").val($spec);
				
            }
        });
	});
</script>
<?php
$currentLng = $this->Session->read('Config.language');
if($currentLng == 'bn'){
?>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
	google.load("elements", "1", {
		packages: "transliteration"
	});

	function onLoad() {
		var options = {
			sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
			destinationLanguage: [google.elements.transliteration.LanguageCode.BENGALI],
			shortcutKey: 'ctrl+g',
			transliterationEnabled: true
		};
			
	var control = new google.elements.transliteration.TransliterationControl(options);
	control.makeTransliteratable(['searchcontent1']);
	}
	google.setOnLoadCallback(onLoad);
</script>
<?php
}
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67836284-1', 'auto');
  ga('send', 'pageview');

</script>

