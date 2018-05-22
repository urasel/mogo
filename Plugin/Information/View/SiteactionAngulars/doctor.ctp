<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  //debug($place);
?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '413852628802125',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="place view">
<?php
	if($language == 'bn'){
		$this->loadHelpers(array('Language'));
		$lat = $this->Language->banglanumber($place['Point']['lat']);
		$lng = $this->Language->banglanumber($place['Point']['lng']);
		$mobile = $this->Language->banglanumber($place[$className]['mobile']);
	}else{
		$lat = $place['Point']['lat'];
		$lng = $place['Point']['lng'];
		$mobile = $place[$className]['mobile'];
	}
?>
	<div class="row placeview">
		<style>
		#map img{
			width:100%;
		}
		</style>
		<div class="col-md-8 col-md-push-4">
			<?php echo '<div class="row"><div class="col-md-12">'; ?>
			<div class="col-md-12 posttitleblock">
			<div class="col-sm-1 col-xs-2 col-md-1" style="padding:0px;">
			<div class="viewcaticon">
			<?php
			if(!empty($place['Place']['image'])){
			echo $this->Html->image('institutes/logo/small/'.$place['Place']['image']);
			}else{
			$icon = $place['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			}
			?>
			</div>
			</div>
			<div class="col-sm-11 col-xs-10 col-md-11">
			<?php echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><h1 class="posttitle">'.$place['Point']['name'].'</h1></div>'; ?>
			<?php 
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$place['Country']['name'].' '.'</p></div></div>'; ?>
			
			</div>
			</div>
			</div>
			
			<?php 
			echo $this->element('social_info_part');
			$imageClass = $className.'Image';
			if(is_array($place[$imageClass]) && sizeof($place[$imageClass]) > 0){
				echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Pictures of %s',$place[$className]['name']).'</div>';
				echo '<div class="panel-body" style="padding:0 15px">';
				echo '<div class="row">';
				$totalImage = sizeof($place[$imageClass]);
				$placename = $place[$className]['name'];
				if($totalImage > 1){
				echo '<div id="slideShowDiv">';
				echo $this->element('jssorplaceslider',array("placeimage" => $place[$imageClass],'placename' => $placename,'foldername' =>'institutes'));
				echo '</div>';
				echo '<div id="singleImageDiv">';
				$imglink = "institutes/photogallery/".$place[$imageClass][0]['file'];
				echo $this->Html->image($imglink,array('alt'=>"$placename Snapshot"));
				echo '</div>';
				}else{
				$imglink = "institutes/photogallery/".$place[$imageClass][0]['file'];
				echo $this->Html->image($imglink,array('alt'=>"$placename Snapshot",'class' =>'img-responsive'));
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			
			 
			if(!empty($place[$className]['facilitydata']) || !empty($place[$className]['extrafacilitydata'])){
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Features of '.$place['Point']['name'].'</div>';
				echo '<div class="panel-body">';
				
					if(!empty($place[$className]['facilitydata'])){
						echo '<div class="col-md-12 lower"><b>Life Style</b></div>';
						echo '<div class="col-md-12">';
							echo $place[$className]['facilitydata'];
						echo '</div>';
					}
					if(!empty($place[$className]['extrafacilitydata'])){
						echo '<div class="col-md-12 lower"><b>Features</b></div>';
						echo '<div class="col-md-12">';
							echo $place[$className]['extrafacilitydata'];
						echo '</div>';
					}
				echo '</div></div>';
				echo '</div>';
				
			echo '</div>';
			}
			?>
			<?php 
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Location Details of %s',$place['Point']['name']).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Place Type').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 style="font-size:18px">'.$place[$className]['name'].'</h2>';
				echo $place[$className]['address'].'<br/>'.$place['BdThanas']['name'].','.$place['BdDistrict']['name'].','.$place['BdDivision']['name'].','.$place['Country']['name'];
				echo '</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Latitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lat.'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Longitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lng.'</div>';
				echo '</div>';
				
				echo '</div>';
				echo '</div>';
				
				echo '</div>';
			echo '</div>';
			
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('General information of %s',$place['Point']['name']).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<p>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-12">';
				echo '<h3>'.$place[$className]['name'].'</h3>';
				echo '</div>';
				echo '</div>';
				//if(!empty($place[$className]['web'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['web'].'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$mobile.'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['email'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['email'].'</div>';
				echo '</div>';
				//}
				
				
				if(!empty($place[$className]['fax'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['fax'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['hours'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['hours'].'</div>';
				echo '</div>';
				}
				echo '</p>';
				echo '</div>';
				echo '</div>';
				if(!empty($place[$className]['details'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Details of '.$place['Point']['name'].'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo $place[$className]['details'];
				echo '</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['history'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">History of '.$place['Point']['name'].'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo $place[$className]['history'];
				echo '</div>';
				echo '</div>';
				}
				echo '</div>';
			echo '</div>';
			echo $this->element('content-section-ten');
			
			
			?>
		</div>
		
		<div class="col-md-4 col-md-pull-8">
			
		</div>
		
		<div class="col-md-4 col-md-pull-8" id="mapdiv">
		
			<?php
			
			
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">';
			echo __('%s in Map',$place['Point']['name']);
			echo '</div>';
			echo '<div class="panel-body">';
			echo '<div id="map" style="width: auto; height:auto">';
			$lat = $place['Point']['lat'];
			$lng = $place['Point']['lng'];
			$icon = 'mm_20_blue.png';
			$slug = $place['Point']['seo_name'];
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
			if(!empty($place['Point']['map'])){
				$link = 'placemaps/'.$place['Point']['map'];
				echo $this->Html->image($link);
			}else{
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				echo $this->Html->image($url);
				$this->requestAction(array('plugin'=>'information','controller' =>'siteactions','action' =>'savemapimage','id'=>$newID,'lat' =>$lat,'lng'=>$lng,'icon' =>$icon,'slug' => $slug));
			}
			echo $this->Html->link(__('View Map'), array('plugin'=>'information','controller'=>'siteactions','action'=>'map','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$place[$className]['name']));
		
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
			?>
		</div>
		<div id="canvas" style="display:none;"><p>Canvas:</p></div>
		<div style="width:200px; float:left; display:none;" id="image"></div>
		<div class="col-md-4 col-md-pull-8">
			<?php
			echo '';
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">'.__('Reviews of %s',$place['Point']['name']).' </div>';
			echo '<div class="panel-body">';
			echo '<div style="width: auto; max-height: 300px">'.__('Yet No Review').'</div>';
			echo '</div>';
			echo '</div>';
			
			?>
		</div>
		<div class="col-md-12">
		<?php
				echo '<div class="panel-heading" style="margin-bottom:10px;"><h3>'.__('Others %s Information',$place['PlaceType']['name']).'</h3></div>';
				
				echo '<div class="row nearPlace">';
				
				foreach($nearbies as $nearplace){
				echo '<div class="col-xs-12 col-sm-6 col-md-3 placecontianer">';
				echo '<div class="relatedblock">';
					echo '<div class="row">';
					$class = $nearplace['Point']['seo_name'];
					
					$stringlength = strlen($nearplace['Point']['seo_name']);
					$newID = $stringlength.$nearplace['Point']['id'];
					echo "<div class='col-md-12 nearbyimageblock $class'>";
					
					$placename = $nearplace[$className]['name'];
					$metaTag = $nearplace[$className]['metatag'];
					if(isset($nearplace[$className.'Image'][0]['topimage'])){
					$file = $nearplace[$className.'Image'][0]['topimage'];
					echo $this->Html->image("places/thumbs/$file", array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$placename.':'.$metaTag));
					}else if(!empty($nearplace['Point']['map'])){
					$locationMap = $nearplace['Point']['map'];
					echo $this->Html->image("placemaps/$locationMap", array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$placename.':'.$metaTag));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$nearplace['PlaceType']['icon'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$placename.':'.$metaTag));
					
					}
					echo '</div>';
					
					echo "<div class='col-md-12 nearbyname $class'>";
					echo $this->Html->link(substr($placename,0,30), array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$placename.':'.$metaTag));
					
					echo '</div>';
					echo "<div class='col-md-12 $class'>";
					echo '<span class="placeaddress">'.substr($nearplace[$className]['address'],0,34).'<span>';
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '</div>';
				}
				echo '</div>';
	
		?>
		
		</div>
	</div>	
	
</div>

