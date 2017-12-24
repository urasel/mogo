<?php
$this->loadHelpers(array('Language'));
//debug($this->Session->read('Auth'));
$userData = $this->Session->read('Auth.User');
$userID = $userData['id'];
$currentLng = $this->Session->read('Config.language');

?>
<style>
#ui-id-1 {
    margin-top:20px !important; 
}
.navbarinputbox{
	border: 1px solid #ccc;
	border-radius: 0px !important;
	font-family: inherit;
	font-size: 18px;
	font-style: normal;
	height: 36px;
	line-height: 18px;
	margin: 10px 0 0;
	padding: 5px 15px;
}
#SiteactionHomeForm{height:35px !important;}
.navbar-collapse{background-image:linear-gradient(0deg, #15a4d7 0%, #1488c6 100%)}
</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
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
	  <ul class="nav navbar-nav navbar-right">
		<li>
			<?php 
			/*
			if(isset($queryCountry) && $queryCountry == 'all'){
				echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng));
			}else{
				echo $this->Html->link(__('Browse'),array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','country' => $queryCountry,'language' => $currentLng));
			}
			*/
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
	  <?php
		echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbar-form navbar-right','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng)));
		echo $this->Form->input('searchname',array('label'=>false,'div'=>false,'class'=>"form-control navbarinputbox",'placeholder'=> __("I'm looking for...")));
		echo '&nbsp;<span class="searchNavem">Near</span>&nbsp;';
		echo $this->Form->input('locations',array('label'=>false,'div'=>false,'class'=>"form-control searchlocation navbarinputbox",'placeholder'=> __("Bangladesh")));
		echo $this->Form->unlockField('locationTypes');
		echo $this->Form->unlockField('locationId');
		echo $this->Form->input('locationTypes',array('type'=>'hidden'));
		echo $this->Form->input('locationId',array('type'=>'hidden'));
		
		?>
		<!--
		<div class="form-group col-md-1 col-xs-1 nopadding">
					<button type="submit" class="btn btn-default search">
					
					&nbsp;
					</button>
					</div>
					-->
		<?php
		echo $this->Form->input('&nbsp;', 
            array('type'=>"button",
                  'class'=>'btn btn-default search searchnavbtn',
                  'div'=>false, 
                  'label'=>false));
		echo $this->Form->end();
	  ?>
	</div>
  </div>
</nav>

<?php
$currentpage = $this->request->here;
if ($this->request->here == '/infocroogo/') {
?>
<script type="text/javascript">
$(window).scroll(function(){
  
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();
  $('.bannercontainer').css('background-position', 'center ' + parseInt(-scroll/3) + 'px');
  $('.bannercontainer').css('height', 550 - parseInt(scroll/0.5) + 'px');
  //console.log(scroll);
  if (scroll >= 120) {
  $('.navbar').addClass('navbar-inverse-scroll');
  $('.navbar-fixed-top').addClass('fixed');
  }
  if (scroll < 161) {
  $('.navbar-fixed-top').removeClass('fixed');
  $('.navbar').removeClass('navbar-inverse-scroll');
  }
});
$(document).ready(function(){
	$('.bannercontainer').show();
	$('.footer').css('top', '-422px');
});
</script>
<?php }else{ ?>
<script>
  $('.navbar').addClass('navbar-inverse-scroll');


</script>

<?php } ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".searchcontent").autocomplete({
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
		
		
		$(".searchlocation").autocomplete({
            source: '<?php echo $this->base; ?>/general/countries/getSearchCountries',
            minLength: 1,
			select: function(event, ui) {
                var $spec = ui.item.id;
				$("#SiteactionLocations").val(ui.item.label);
				$("#SiteactionLocationTypes").val('c');
				$("#SiteactionLocationId").val(ui.item.id);
				
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
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67836284-1', 'auto');
  ga('send', 'pageview');

</script>

