<?php
$this->loadHelpers(array('Language'));
$userData = $this->Session->read('Auth.User');
$userID = $userData['id'];
$currentLng = $this->Session->read('Config.language');
?>

<div class="row">
<div class="col-md-12">

<nav class="navbar navbar-inverse">
      <div class="container">
	  <div class="col-md-12">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">InfoMap24 Home</span>
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
			echo '<li class="navbarli">';
			echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form menusearch','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng)));
			echo '<div class="form-group searchblock">';
			echo $this->Form->input('searchname',array('label'=>false,'div'=>false,'class'=>"form-control searchcontenttop",'placeholder'=> __("I'm looking for...")));
			echo $this->Form->unlockField('Siteaction.place_id');
			echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location')));
			echo '<button type="submit" class="btn btn-default search">&nbsp;</button>';
			echo '</div>'; 
			
			echo $this->Form->end();
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
			echo '</li>';
			echo '<li>';
			echo '<i class="fa fa-user profileicon"></i>';
			echo $this->Html->link(__('Logout'),array('plugin'=>'users','controller'=>'users','action'=>'logout'));
			echo '</li>';
			echo '<li class="navbarli">';
			echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form menusearch','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng)));
			echo '<div class="form-group searchblock">';
			echo $this->Form->input('searchname',array('label'=>false,'div'=>false,'class'=>"form-control searchcontenttop",'placeholder'=> __("I'm looking for...")));
			echo $this->Form->unlockField('Siteaction.place_id');
			echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location')));
			echo '<button type="submit" class="btn btn-default search">&nbsp;</button>';
			echo '</div>'; 
			
			echo $this->Form->end();
			echo '</li>';
			}
			?>
				
		</ul>
		
        </div>
      </div>
      </div>
</nav>

</div>
</div>





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

