<?php
//debug($place);
      $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('controller' => 'pages', 'action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'] ,array('controller'=>'pages','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $place['PlaceType']['id'],'ext' => 'asp'));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
?>
<style>
.placenamecontainer{
	background: url("http://localhost/skybazarcake2/img/check.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=256640904378945";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="place view">
<?php //debug($place);?>
<script src="http://maps.google.com/maps/api/js?sensor=false"  type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
			
    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'http://www.oximap.com/img/green.gif',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
	  var lat = "<?php echo $place['Place']['lat']; ?>";
      var lng = "<?php echo $place['Place']['lng']; ?>";
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(lat, lng),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
	  
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      
          var name = "<?php echo $place['Place']['name']; ?>";
          var address = "<?php echo $place['Place']['name']; ?>";
          var lat = "<?php echo $place['Place']['lat']; ?>";
          var lng = "<?php echo $place['Place']['lng']; ?>";
		 
          var type = 'bar';
          var point = new google.maps.LatLng(
              parseFloat(lat),
              parseFloat(lng));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
		  
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow,
			draggable: false
          });
		 
          bindInfoWindow(marker, map, infoWindow, html);
      
     
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
	   
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
	
	$(document).ready(function(){
			
			
			
			$.fn.stars = function() {
				return $(this).each(function() {
					// Get the value
					var val = parseFloat($(this).html());
					// Make sure that the value is in 0 - 5 range, multiply to get width
					var size = Math.max(0, (Math.min(5, val))) * 16;
					// Create stars holder
					var $span = $('<span />').width(size);
					// Replace the numerical value with stars
					$(this).html($span);
				});
			}
			$.fn.bigstars = function() {
				return $(this).each(function() {
					// Get the value
					var val = parseFloat($(this).html());
					// Make sure that the value is in 0 - 5 range, multiply to get width
					var size = Math.max(0, (Math.min(5, val))) * 29;
					// Create stars holder
					var $span = $('<span />').width(size);
					// Replace the numerical value with stars
					$(this).html($span);
				});
			}
			
			load();
			
		});
		$(function() {
			$('span.stars').stars();
			$('span.bigstars').bigstars();
		});
	

    //]]>
/*
var customIcons={restaurant:{icon:"http://labs.google.com/ridefinder/images/mm_20_blue.png",shadow:"http://labs.google.com/ridefinder/images/mm_20_shadow.png"},bar:{icon:"http://www.oximap.com/img/green.gif",shadow:"http://labs.google.com/ridefinder/images/mm_20_shadow.png"}};
function load(){var a="<?php echo $place['Place']['lat']; ?>",c="<?php echo $place['Place']['lng']; ?>",a=new google.maps.Map(document.getElementById("map"),{center:new google.maps.LatLng(a,c),zoom:13,mapTypeId:"roadmap"}),b=new google.maps.InfoWindow,c="<?php echo $place['Place']['lng']; ?>",c=new google.maps.LatLng(parseFloat("<?php echo $place['Place']['lat']; ?>"),parseFloat(c)),d=customIcons.bar||{},c=new google.maps.Marker({map:a,position:c,icon:d.icon,shadow:d.shadow,draggable:!1});bindInfoWindow(c,
a,b,"<b><?php echo $place['Place']['name']; ?></b> <br/><?php echo $place['Place']['name']; ?>")}function bindInfoWindow(a,c,b,d){google.maps.event.addListener(a,"click",function(){b.setContent(d);b.open(c,a)})}function downloadUrl(a,c){var b=window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest;b.onreadystatechange=function(){4==b.readyState&&(b.onreadystatechange=doNothing,c(b,b.status))};b.open("GET",a,!0);b.send(null)}function doNothing(){}
$(document).ready(function(){$.fn.stars=function(){return $(this).each(function(){var a=parseFloat($(this).html()),a=16*Math.max(0,Math.min(5,a)),a=$("<span />").width(a);$(this).html(a)})};$.fn.bigstars=function(){return $(this).each(function(){var a=parseFloat($(this).html()),a=29*Math.max(0,Math.min(5,a)),a=$("<span />").width(a);$(this).html(a)})};load()});$(function(){$("span.stars").stars();$("span.bigstars").bigstars()});
*/
</script>
	<div class="row placeview">
		<div class="col-md-8">
			<?php 
			//debug($place);
			echo '<div class="row">';
				echo '<div class="col-md-12">';
					echo '<div class="col-sm-3 col-xs-12 col-md-3">';
						$imglink = "doctors/".$place['Doctor']['image'];
						echo $this->Html->image($imglink,array('class' =>'snapimageimg'));
					echo '</div>';
					echo '<div class="col-sm-9 col-xs-12 col-md-9">';
						echo '<div class="row"><div class="col-md-12">';
						echo '<div class="col-sm-2 col-xs-3 col-md-2">';
						echo '<div class="viewcaticon">';
						
						$icon = $place['PlaceType']['icon'];
						echo "<i class='$icon'></i>";
						echo '</div>';
						echo '</div>';
						echo '<div class="col-sm-10 col-xs-9 col-md-10">';
						echo '<div class="col-sm-12 col-md-12 zeropadding"><h1 class="posttitle">'.$place['Point']['name'].'</h1></div>';
						echo '<div class="col-md-12 zeropadding">';
						echo '<h6>'.$place['DoctorSpecialization']['name'].' Specialist </h6>';
						echo '<p>';
						if(!empty($place['Doctor']['designation'])){
						echo $place['Doctor']['designation'];
						}else if(!empty($place['Doctor']['qualification'])){
						echo $place['Doctor']['qualification'];
						}else{
						
						}
						echo '</p></div></div>'; 
						
						echo '</div>';
						echo '</div>';
					echo '</div>';
					
				echo '</div>';
			echo '</div>';
			echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="panel panel-info">';
						echo '<div class="panel-heading">Education</div>';
						echo '<div class="panel-body">';
						if(!empty($place['Doctor']['qualification'])){
						echo '<h3>Education</h3>';
							echo $place['Doctor']['qualification'];
						}
						if(!empty($place['Doctor']['degree'])){
						echo '<h3>Degree</h3>';
							echo $place['Doctor']['degree'];
						}
						echo '<p>'.$place['Doctor']['details'].'</p>';
						echo '</div>';
						echo '</div>';
					
					echo '</div>';
			echo '</div>';
			echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="panel panel-info">';
						echo '<div class="panel-heading">Area of Specialization</div>';
						echo '<div class="panel-body">';
							if(count($place['DoctorExpertise']) > 0){
								echo '<ul class="list-inline stylistlist">';
								foreach($place['DoctorExpertise'] as $expertise){
									//debug($expertise);
									echo '<li class="col-sm-6 col-xs-12 col-md-6">';
									echo $expertise['name'];
									echo '</li>';
									
								}
								echo '</ul>';
							}
						echo '</div></div>';
					
					echo '</div>';
			echo '</div>';
			
			echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="panel panel-info">';
						echo '<div class="panel-heading">Awards & Certifications</div>';
						echo '<div class="panel-body">';
						echo '<h3>Qualification</h3>';
							echo $place['Doctor']['qualification'];
						echo '<h3>Degree</h3>';
							echo $place['Doctor']['degree'];
						echo '<p>'.$place['Doctor']['details'].'</p>';
						echo '</div>';
						echo '</div>';
					
					echo '</div>';
			echo '</div>';
			
			?>
			<div class="row">
			<div class="col-md-12">
			<div class="fb-comments" data-href="http://www.oximap.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</div>
			</div>
			<?php
				
		echo '</div>';
		echo '<div class="col-md-4">';
			echo '<div class="row">';
			echo '<div class="col-md-12">';
			
			echo '</div>';
			echo '</div>';
		echo '</div>';
	?>	
		<div class="col-md-12">
		<?php
		//debug($nearbies);
				echo '<div class="panel-heading" style="margin-bottom:10px;"><h3>Other '.$place['DoctorSpecialization']['name'].' Specialist</h3></div>';
				//echo '<div class="panel-body nearPlace">';
				echo '<div class="row nearPlace">';
				foreach($nearbies as $nearby){
				//debug($nearby);
				echo '<div class="col-xs-12 col-sm-6 col-md-3 placecontianer">';
					echo '<div class="row">';
					echo '<div class="col-md-12">';
					$placename = $nearby['Doctor']['name'];
					if(isset($nearby['Doctor']['image'])){
					$file = $nearby['Doctor']['image'];
					echo $this->Html->image("doctors/stamps/$file",array('url'=>array('controller' =>'pages','action' =>'categoryitem','?' => array('group'=> $nearby['PlaceType']['seo_name'],'place'=> $nearby['Point']['seo_name'],'id'=> $nearby['Point']['id']))),array('alt'=>"$placename napshot"));
					}else{
					$link = "item?group=".$nearby['PlaceType']['seo_name']."&place=".$nearby['Point']['seo_name']."&id=".$nearby['Point']['id'];
					echo "<a href='http://www.oximap.com/$link' alt='$placename napshot'>";
					echo '<div class="defaultcaticon">';
					$icon = $nearby['PlaceType']['icon'];
					echo "<span><i class='$icon'></i></span>";
					echo '</div>';
					echo '</a>';
					}
					echo '</div>';
					echo '<div class="col-md-12">';
					echo $this->Html->link(substr($nearby['Point']['name'],0,24).'..',array('controller' =>'pages','action' =>'categoryitem','?' => array('group'=> $nearby['PlaceType']['seo_name'],'place'=> $nearby['Point']['seo_name'],'id'=> $nearby['Point']['id'])),array('class'=>'placename','alt'=>"$placename"));
					echo '</div>';
					echo '<div class="col-md-12">';
					echo '<span class="placeaddress">'.substr($nearby['Doctor']['degree'],0,50).'<span>';
					echo '</div>';
					echo '</div>';
				echo '</div>';
				
				//debug($nearby);
				}
				echo '</div>';
				
				//echo '</div>';
				//echo '</div>';
	
		?>
		
		</div>
	</div>	
	
	<script>
		
	</script>

</div>

