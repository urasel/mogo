<style>	
	.ui-menu .ui-menu-item {
	  border-bottom: 1px solid #ccc;
	  cursor: pointer;
	  list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
	  margin: 0;
	  min-height: 0;
	  padding: 5px 0.7em 4px 0.4em;
	  position: relative;
	}
	.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
	  position: absolute;
	  margin-left:0px;
	}
</style>
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
	.tokenize-sample{
		width:100%;
	}
	div.Tokenize ul.TokensContainer{
		height:auto;
	}
	#DoctorDobMonth,#DoctorDobDay,#DoctorDobYear{
		width:100px;
		display:inline;
		margin-top:10px;
	}
	
</style>
<div class="points form">
<div id="dd"></div>
<?php echo $this->Form->create('Point',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Doctor'); ?></legend>
	<?php
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-heading">Location Details</div>';
		echo '<div class="panel-body">';
		echo $this->Form->input('place_type_id', array('type'=>'hidden','value'=> 45,'tabindex'=> "1"));
		echo $this->Form->input('countryid', array('class'=>'form-control','label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		echo $this->Form->input('country_id', array('type' =>'hidden','class'=>'form-control ','id'=>'CountryId','empty'=>'Country Name'));
		//echo '<div id="countryloader" style="margin:0 auto;text-align:center;"></div>';
		echo '<div id="zoneDiv"></div>';
		echo '<div id="districtDiv"></div>';
		echo '<div id="thanaDiv"></div>';
		echo '<span class="locationdiv">';
		echo $this->Form->input('location', array('class'=>'form-control','placeholder'=>'Type Area Name','tabindex'=> "5"));
		echo '</span>';
		echo $this->Form->input('maplocation', array('id'=>'maplocation','type'=>'hidden'));
		echo $this->Form->input('address', array('class'=>'form-control','label'=>'Address','tabindex'=> "6"));
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo "<div id='typecodeDiv'>";
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-heading">Doctor Information Details</div>';
		echo '<div class="panel-body">';
		echo $this->Form->input('Doctor.name', array('class'=>'form-control','label'=>'Doctor Name','tabindex'=> "6"));
		echo $this->Form->input('Doctor.hospital_id', array('class'=>'tokenize-sample','id'=>'serving','multiple'=>'multiple','label'=>'Serving Hospital Name','tabindex'=> "7",'div'=>false));
		echo $this->Form->input('Doctor.designation', array('class'=>'form-control','label'=>'Current Post','tabindex'=> "7"));
		echo $this->Form->input('Doctor.dobirth', array('class'=>'form-control','label'=>'Date of Birth','tabindex'=> "7"));
		echo $this->Form->input('Doctor.sex_id', array('class'=>'form-control','label'=>'Sex','tabindex'=> "7"));
		echo $this->Form->input('Doctor.religion_id', array('class'=>'form-control','label'=>'Religion','tabindex'=> "8"));
		echo $this->Form->input('Doctor.doctor_specialization_id', array('class'=>'form-control','label'=>'Specialized','tabindex'=> "8"));
		echo $this->Form->input('Doctor.doctor_expertise_id', array('class'=>'tokenize-sample','id'=>'expertise','multiple'=>'multiple','label'=>'Expertise','tabindex'=> "8"));
		echo $this->Form->input('Doctor.qualification', array('class'=>'form-control','label'=>'Educational Details','tabindex'=> "8"));
		echo $this->Form->input('Doctor.degree', array('class'=>'form-control','label'=>'About Degree','tabindex'=> "8"));
		echo $this->Form->input('Doctor.chamber', array('class'=>'form-control','label'=>'Chamber Details','tabindex'=> "8"));
		echo $this->Form->input('Doctor.details', array('class'=>'form-control','label'=>'Doctor Details','tabindex'=> "9"));
		echo $this->Form->input('Doctor.image', array('type'=>'file','placeholder'=>'Profile Image','tabindex'=> "9"));
		echo $this->Form->input('Doctor.email', array('class'=>'form-control','label'=>'Email','tabindex'=> "10"));
		echo $this->Form->input('Doctor.phone', array('class'=>'form-control','label'=>'Phone Number','tabindex'=> "11"));
		echo $this->Form->input('Doctor.website', array('class'=>'form-control','label'=>'Website','tabindex'=> "12"));
		echo $this->Form->input('Doctor.keyword', array('class'=>'form-control','label'=>'Keyword','tabindex'=> "14"));
		echo $this->Form->input('Doctor.metatag', array('class'=>'form-control','label'=>'Metatag','tabindex'=> "15"));
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-heading">Educational Informations</div>';
		echo '<div class="panel-body">';
		echo $this->Form->input('Doctor.qualification', array('class'=>'form-control','label'=>'Educational Details','tabindex'=> "8"));
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-heading">Professional Informations</div>';
		echo '<div class="panel-body">';
		echo $this->Form->input('Doctor.qualification', array('class'=>'form-control','label'=>'Educational Details','tabindex'=> "8"));
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo "</div>";
		
		
	?>
	</fieldset>
<?php 
echo $this->Form->input('active', array('class'=>'checkbox','label'=>'Active','tabindex'=> "16"));
echo $this->Form->input('loadmap', array('type'=>'checkbox','class'=>'checkbox','label'=>'Load Map','tabindex'=> "17"));

echo '<div class="row mapcontainer">';
echo '<div class="col-md-12">';
	echo '<div class="panel panel-info">';
	echo '<div class="panel-heading">Click On the MAP to Save Location</div>';
	echo '<div class="panel-body mapsize" style="padding:0px;">';
	?>
	<input id="mapinput" type="hidden" style="width: 80%;" value="Institut Teknologi Telkom, Sukapura, Dayeuhkolot, Bandung 40257, Indonesia" maxlength="100">
	<div id="google_map"></div>
	<?php
	echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
$options = array('label' => 'Submit', 'class' => 'btn btn-default');
echo $this->Form->end($options); 
?>
</div>

<script>
$(document).ready(function(){
	var mapCenter = new google.maps.LatLng(23.699865, 90.430389); //Google map Coordinates
	var map;
	$("#autoCountry").autocomplete({
            source: '<?php echo $this->base; ?>/countries/getCountries',
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
					type: "POST",
					evalScripts: true,
					url: "<?php echo Router::url(array('controller'=>'zones','action'=>'ajaxzone'));?>",
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
		
		$('#serving').tokenize({displayDropdownOnFocus:true});
		$('#expertise').tokenize({displayDropdownOnFocus:true});

});
</script>
