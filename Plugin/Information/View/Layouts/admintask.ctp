<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $title_for_layout; ?> - <?php echo __d('croogo', 'Croogo'); ?></title>
		<?php

		echo $this->Html->css(array(
			'/croogo/css/croogo-bootstrap',
			'/croogo/css/croogo-bootstrap-responsive',
			'/croogo/css/thickbox',
			'/croogo/css/jcrop/css/demos',
			'/croogo/css/jcrop/css/jquery.Jcrop.min',
			'/croogo/css/jquery-ui.min',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			'/croogo/js/html5',
			'/croogo/js/jcrop/js/jquery.min',
			'/croogo/js/jquery/jquery-ui.min',
			'/croogo/js/jcrop/jquery.Jcrop.min',
			'/croogo/js/jcrop/jcrop_script',
			'/croogo/js/jquery/jquery.cookie',
			'/croogo/js/jquery/jquery.hoverIntent.minified',
			'/croogo/js/jquery/superfish',
			'/croogo/js/jquery/supersubs',
			'/croogo/js/jquery/jquery.tipsy',
			/*'/croogo/js/jquery/jquery.elastic-1.6.1.js',*/
			'/croogo/js/jquery/thickbox-compressed',
			'/croogo/js/underscore-min',
			'/croogo/js/admin',
			'/croogo/js/sidebar',
			'/croogo/js/choose',
			'/croogo/js/typeahead_autocomplete',
			'/croogo/js/croogo-bootstrap',
			
		));

		echo $this->fetch('script');
		echo $this->fetch('css');

		?>
<style type="text/css">
	h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

	/* width and height of google map */
	#google_map {width: 100%; height: 500px;margin-top:0px;margin-left:auto;margin-right:auto;}

	/* Marker Edit form */
	.marker-edit label{display:block;margin-bottom: 5px;}
	.marker-edit label span {width: 100px;float: left;}
	.marker-edit label input, .marker-edit label select{height: 24px;}
	.marker-edit label textarea{height: 60px;}
	.marker-edit label input, .marker-edit label select, .marker-edit label textarea {width: 60%;margin:0px;padding-left: 5px;border: 1px solid #DDD;border-radius: 3px;}

	/* Marker Info Window */
	h1.marker-heading{color: #585858;margin: 0px;padding: 0px;font: 18px "Trebuchet MS", Arial;border-bottom: 1px dotted #D8D8D8;}
	div.marker-info-win {margin-right: 0px;width:auto;}
	div.marker-info-win p{padding: 0px;margin: 10px 0px 10px 0;}
	div.marker-inner-win{padding: 15px;}
	#readyPType{display:none;}
	.mapcontainer{
	display:none;
	}
	.save-marker{
		margin-top: 15px;
		
	}
</style>
	</head>
	<body>
		<div id="wrap">
			<?php echo $this->element('admin/header'); ?>
			<?php echo $this->element('admin/navigation'); ?>
			<div id="push"></div>
			<div id="content-container" class="<?php echo $this->Theme->getCssClass('container'); ?>">
				<div class="<?php echo $this->Theme->getCssClass('row'); ?>">
					<div id="content" class="clearfix">
						<?php echo $this->element('admin/breadcrumb'); ?>
						<div id="inner-content" class="<?php echo $this->Theme->getCssClass('columnFull'); ?>">
							<?php echo $this->Layout->sessionFlash(); ?>
							<?php echo $this->fetch('content'); ?>
						</div>
					</div>
					&nbsp;
				</div>
			</div>
		</div>
		<?php echo $this->element('admin/footer'); ?>
		<?php
		echo $this->element('admin/initializers');
		echo $this->Blocks->get('scriptBottom');
		echo $this->Js->writeBuffer();
		?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
$(document).ready(function(){
	var mapCenter = new google.maps.LatLng(23.699865, 90.430389); //Google map Coordinates
	var map;
	$("#autoCountry").autocomplete({
            source: '<?php echo $this->base; ?>/general/countries/getCountries',
            minLength: 1,
			select: function(event, ui) {
                var $spec = ui.item.id;
				$('#countryloader').removeClass('spinner');
                $('#CountryId').val($spec);
				$("#zoneDiv").html("");
				$("#districtDiv").html("");
				$("#thanaDiv").html("");
				var countryID = $spec;
				$.ajax({
					dataType: "html",
					type: "GET",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/general/zones/ajaxzone',
					data: ({countryid:countryID}),
					success: function (data, textStatus){
						$("#zoneDiv").html(data);
						$(".locationdiv").show();
				 
					}
				});
            }
    });
	$('#CountryId').change(function(){
				$("#zoneDiv").html("");
				$("#districtDiv").html("");
				$("#thanaDiv").html("");
				var countryID = $(this).val();
				$.ajax({
					dataType: "html",
					type: "POST",
					evalScripts: true,
					url: "<?php echo Router::url(array('controller'=>'zones','action'=>'ajaxzone'));?>",
					data: ({countryid:countryID}),
					success: function (data, textStatus){
						$("#zoneDiv").html(data);
				 
					}
			});
	});
	
	$('#PointLoadmap').click(function(){
		var country = $( "#autoCountry" ).val();
		var division = $( "#addresszoneid option:selected" ).text();
		var district = $( "#addressdistrictid option:selected" ).text();
		var thana = $( "#thanalist option:selected" ).text();
		var address = $("#PointLocation").val();
		var searchString = address+','+thana+','+district+','+division+','+country;
		//alert(searchString);
		$('#mapinput').val(searchString);
		
		var geocoder = new google.maps.Geocoder();
	
			  geocoder.geocode({
				address: document.getElementById("mapinput").value
			  }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
				  var result = results[0];
				  document.getElementById("mapinput").value = result.formatted_address;
				  //document.getElementById('dd').innerHTML = JSON.stringify(result);
				  document.getElementById('maplocation').value = result.geometry.location.A+','+result.geometry.location.F;
				  if (result.geometry.viewport) {
					map.fitBounds(result.geometry.viewport);
				  }
				  else {
					map.setCenter(result.geometry.location);
				  }
				} else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
				  alert("Sorry, the geocoder failed to locate the specified address.");
				} else {
				  alert("Sorry, the geocoder failed with an internal error.");
				}
			  });
			  $('.mapcontainer').show();
			  //map_initialize(); // initialize google map
			  callMap();
			
		
		
	});
	
	function callMap(){
			var googleMapOptions = 
				{ 
					center: mapCenter, // map center
					//center: new google.maps.LatLng(37.4419, -122.1419),
					zoom: 18, //zoom level, 0 = earth view to higher value
					maxZoom: 24,
					minZoom: 14,
					zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL //zoom control size
					},
					scaleControl: true, // enable scale control
					mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
				};
				
			map = new google.maps.Map(document.getElementById('google_map'),googleMapOptions);
			//nearestplaces();
			var marker = new google.maps.Marker();
			var infoWindow = new google.maps.InfoWindow;
			
			var counter = 0;
			google.maps.event.addListener(map, 'click', function(mEvent) {
				marker.setPosition(mEvent.latLng);
				//marker.setMap(map);
				
				infoWindow.setPosition(mEvent.latLng);
				var databody = $('<h3>Marker position is:</h3>' +
				  mEvent.latLng.k + ', ' + mEvent.latLng.D +'<br/>'+
				  '<button type="button" name="save-marker" class="save-marker">Save Location</button>');
				var contentString = $('<div class="marker-info-win">'+
				'<div class="marker-inner-win">'+
				'<button type="button" name="save-marker" class="save-marker btn btn-primary btn-xs">Save Location</button>'+
				'</div></div>');
				infoWindow.setContent(contentString[0]);
				
				infoWindow.open(map,marker);
				var saveBtn 	= contentString.find('button.save-marker')[0];
				google.maps.event.addDomListener(saveBtn, "click", function(event) {
						$('#maplocation').val(marker.getPosition().toUrlValue());
						var latlng = $('#maplocation').val();
						infoWindow.close();
				});
			  });
		}

});
</script>
	</body>
</html>