<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Routes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Routes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportRoute']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Routes') . ': ' . $this->request->data['TransportRoute']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportRoute',array('type'=>'file')));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Service'), '#transport-service');
	echo $this->Croogo->adminTab(__d('information', 'Route Details'), '#transport-route');
	echo $this->Croogo->adminTab(__d('information', 'Transport Class'), '#transport-gallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');
	echo $this->Html->tabStart('transport-service');

		echo $this->Form->input('id');
		echo $this->Form->input('transport_type_id', array('label'=>'Transport Type'));
		echo $this->Form->input('countryid', array('label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		echo $this->Form->input('Location.country_id', array('type' =>'hidden','id'=>'CountryId','empty'=>'Country Name'));
		
		echo '<div id="zoneDiv"></div>';
		echo $this->Form->input('same_country',array('type' => 'checkbox','label'=>'Inner Country Service'));
		
		
		
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('transport-route');
		
		echo $this->Form->input('route_fromcountry', array(
			'label' =>  __d('information', 'Route From Country'),
			'value' => $this->request->data['FromCountry']['name'],
			'div'=>array('class'=>'input text fromCountryDiv'),
		));
		echo $this->Form->unlockField('FromCountryId');
		echo $this->Form->unlockField('ToCountryId');
		echo $this->Form->unlockField('RouteFromId');
		echo $this->Form->unlockField('RouteToId');
		echo $this->Form->input('transport_service_id',array('id'=>'transport_service_id','type'=>'hidden','value' => $this->request->data['TransportRoute']['transport_service_id']));
		echo $this->Form->input('FromCountryId',array('id'=>'FromCountryId','type'=>'hidden','value' => $this->request->data['FromCountry']['id']));
		echo $this->Form->input('ToCountryId',array('id'=>'ToCountryId','type'=>'hidden','value' => $this->request->data['ToCountry']['id']));
		echo $this->Form->input('RouteFromId',array('id'=>'RouteFromId','type'=>'hidden','value' => $this->request->data['RouteFrom']['id']));
		echo $this->Form->input('RouteToId',array('id'=>'RouteToId','type'=>'hidden','value' => $this->request->data['RouteTo']['id']));
		
		echo $this->Form->input('route_from', array(
			'label' =>  __d('information', 'Route From'),
			'value' => $this->request->data['RouteFrom']['name'],
			
		));
		echo $this->Form->input('route_tocountry', array(
			'label' =>  __d('information', 'Route To Country'),
			'value' => $this->request->data['ToCountry']['name'],
			'div'=>array('class'=>'input text toCountryDiv'),
		));
		echo $this->Form->input('route_to', array(
			'label' =>  __d('information', 'Route To'),
			'value' => $this->request->data['RouteTo']['name'],
		));
		echo $this->Form->input('departure_time', array(
			'label' =>  __d('information', 'Departure Time'),
			'placeholder'=>'7.30 PM',
			
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Route Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Route Bangla Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'SEO Name'),
		));
		echo $this->Form->input('route_details', array(
			'label' =>  __d('information', 'Route Details'),
		));
		
		echo $this->Form->input('estimated_reach_time', array(
			'label' =>  __d('information', 'Estimated Reach Time'),
			'placeholder'=>'8 Hours',
		));
		
		echo '<div class="prevRoutes"></div>';
		
		?>
		<!--<button id="login_btn" value="ajaxSave" type="button" class="ajaxSaveBtn btn btn-block bt-login">Save This</button>-->
		<script>
		  $( function() {
			function split( val ) {
			  return val.split( /,\s*/ );
			}
			function extractLast( term ) {
			  return split( term ).pop();
			}
			
			$transportClassID = $('#TransportRouteTransportClassId option:selected').val();
			$transportNameID = $('#transport_service_id').val();
			$fromStationID = $('#RouteFromId').val();
			$toStationID = $('#RouteToId').val();
			
			$.ajax({
				url: "<?php echo $this->base; ?>/information/transport_routes/existingroutes",
				dataType: "html",
				data: {
					transportID: $transportNameID,
					transportClassID: $transportClassID,
					fromStationID: $fromStationID,
					toStationID: $toStationID,
				},
				success: function(data) {
					//alert(data);
					$(".prevRoutes").html('');
					$(".prevRoutes").html(data);
					
				}
			});
			
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
					var typeID = $('#TransportRouteTransportTypeId option:selected').val();
					$.ajax({
						dataType: "html",
						type: "GET",
						evalScripts: true,
						url: '<?php echo $this->base; ?>/information/transport_routes/ajaxtransport',
						data: ({countryid:countryID,typeId:typeID}),
						success: function (data, textStatus){
							$("#zoneDiv").html(data);
						}
					});
				}
			});
			
			$('#TransportRouteSameCountry').click(function(){
				$( ".fromCountryDiv" ).toggle();
				$( ".toCountryDiv" ).toggle();
				$('#FromCountryId').val($('#CountryId').val());
				$('#ToCountryId').val($('#CountryId').val());
				
			});
			
			$("#TransportRouteRouteFromcountry").autocomplete({
				source: '<?php echo $this->base; ?>/general/countries/getCountries',
				minLength: 1,
				select: function(event, ui) {
					var $spec = ui.item.id;
					$('#FromCountryId').val($spec);
				}
			});
			$("#TransportRouteRouteTocountry").autocomplete({
				source: '<?php echo $this->base; ?>/general/countries/getCountries',
				minLength: 1,
				select: function(event, ui) {
					var $spec = ui.item.id;
					$('#ToCountryId').val($spec);
				}
			});
			$("#TransportRouteRouteFrom").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "<?php echo $this->base; ?>/general/zones/zones",
						dataType: "json",
						data: {
							term: request.term,
							country: $("#FromCountryId").val()
						},
						success: function(data) {
							response(data);
						}
					});
				},
				minLength: 1,
				select: function(event, ui) {
					var $spec = ui.item.id;
					$('#RouteFromId').val($spec);
				}
			});
			$("#TransportRouteRouteTo").autocomplete({
				source: function(request, response) {
					$.ajax({
						url: "<?php echo $this->base; ?>/general/zones/zones",
						dataType: "json",
						data: {
							term: request.term,
							country: $("#ToCountryId").val()
						},
						success: function(data) {
							response(data);
							
						}
					});
				},
				minLength: 1,
				select: function(event, ui) {
					var $spec = ui.item.id;
					$('#RouteToId').val($spec);
							$transportClass = $('#TransportRouteTransportClassId option:selected').text();
							$transportName = $('#transport_service_id option:selected').text();
							$fromStation = $('#TransportRouteRouteFrom').val();
							$toStation = $('#TransportRouteRouteTo').val();
							$generatedName = $transportName+' '+$fromStation+' to '+$toStation+' '+$transportClass;
							$('#TransportRouteName').val($generatedName);
				}
			});
			$('#TransportRouteTransportClassId').change(function(){
					$transportClass = $('#TransportRouteTransportClassId option:selected').text();
					$transportClassID = $('#TransportRouteTransportClassId option:selected').val();
					$transportName = $('#transport_service_id option:selected').text();
					$transportNameID = $('#transport_service_id option:selected').val();
					$fromStation = $('#TransportRouteRouteFrom').val();
					$fromStationID = $('#RouteFromId').val();
					$toStation = $('#TransportRouteRouteTo').val();
					$toStationID = $('#RouteToId').val();
					$transportRouteDepartureTime = $('#TransportRouteDepartureTime').val();
					$generatedName = $transportName+' '+$fromStation+' to '+$toStation+' '+$transportClass+' [Departure Time:'+$transportRouteDepartureTime+']';
					$('#TransportRouteName').val($generatedName);
					
					$.ajax({
						url: "<?php echo $this->base; ?>/information/transport_routes/existingroutes",
						dataType: "html",
						data: {
							transportID: $transportNameID,
							transportClassID: $transportClassID,
							fromStationID: $fromStationID,
							toStationID: $toStationID,
						},
						success: function(data) {
							//alert(data);
							$(".prevRoutes").html('');
							$(".prevRoutes").html(data);
							
						}
					});
					
					
			});
			$('#transport_service_id').change(function(){
					$transportClass = $('#TransportRouteTransportClassId option:selected').text();
					$transportName = $('#transport_service_id option:selected').text();
					$fromStation = $('#TransportRouteRouteFrom').val();
					$toStation = $('#TransportRouteRouteTo').val();
					$generatedName = $transportName+' '+$fromStation+' to '+$toStation+' '+$transportClass;
					$('#TransportRouteName').val($generatedName);
			});
			$( "#TransportRouteRouteDetails" )
			  // don't navigate away from the field on tab when selecting an item
			  .on( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).autocomplete( "instance" ).menu.active ) {
				  event.preventDefault();
				}
			  })
			  .autocomplete({
				source: function( request, response ) {
				  $.ajax({
						url: '<?php echo $this->base; ?>/general/zones/districts',
						dataType: "json",
						data: {
							term: extractLast( request.term ),
							country: $("#FromCountryId").val()
						},
						success: function(data) {
							response(data);
						}
					});
				  
				},
				search: function() {
				  // custom minLength
				  var term = extractLast( this.value );
				  if ( term.length < 2 ) {
					return false;
				  }
				},
				focus: function() {
				  // prevent value inserted on focus
				  return false;
				},
				select: function( event, ui ) {
				  var terms = split( this.value );
				  // remove the current input
				  terms.pop();
				  // add the selected item
				  terms.push( ui.item.value );
				  // add placeholder to get the comma-and-space at the end
				  terms.push( "" );
				  this.value = terms.join( ", " );
				  return false;
				}
			  });
			  
			  $('.ajaxSaveBtn').click(function(event){
							/*
							$transportClassId = $('#TransportRouteTransportClassId option:selected').val();
							$transportServiceId = $('#transport_service_id option:selected').val();
							$countryId = $('#CountryId').val();
							$fromcountryId = $('#FromCountryId').val();
							$tocountryId = $('#ToCountryId').val();
							$RouteFromId = $('#RouteFromId').val();
							$RouteToId = $('#RouteToId').val();
							$routeNameEn = $('#TransportRouteName').val();
							$routeNameBn = $('#TransportRouteBnName').val();
							$TransportRouteRouteDetails = $('#TransportRouteRouteDetails').val();
							$TransportRouteDepartureTime = $('#TransportRouteDepartureTime').val();
							$TransportRouteEstimatedReachTime = $('#TransportRouteEstimatedReachTime').val();
							$TransportRouteFare = $('#TransportRouteFare').val();
							*/
							$.ajax({
								url: '<?php echo $this->base; ?>/information/transport_routes/ajaxsave',
								dataType: "json",
								data: {
									transportClassId:		$('#TransportRouteTransportClassId option:selected').val(),
									transportServiceId:		$('#transport_service_id option:selected').val(),
									countryId:				$('#CountryId').val(),
									fromcountryId:			$('#FromCountryId').val(),
									tocountryId:			$('#ToCountryId').val(),
									RouteFromId:			$('#RouteFromId').val(),
									RouteToId:				$('#RouteToId').val(),
									routeNameEn:			$('#TransportRouteName').val(),
									routeNameBn:			$('#TransportRouteBnName').val(),
									TransportRouteRouteDetails:		$('#TransportRouteRouteDetails').val(),
									TransportRouteDepartureTime:	$('#TransportRouteDepartureTime').val(),
									TransportRouteEstimatedReachTime:	$('#TransportRouteEstimatedReachTime').val(),
									TransportRouteFare:		$('#TransportRouteFare').val()
								},
								success: function(data) {
									response(data);
								}
							});
			  });
		  } );
		</script>

		<?php

	echo $this->Html->tabEnd();
	echo $this->Html->tabStart('transport-gallery');
	//debug($this->data);
		$accomodationData = $this->request->data['TransportAccomodation'];
		foreach($accomodationData as $trClass){
			//debug($trClass);
			
			$trAccClass = $trClass['transport_class_id'];
			$trFare = $trClass['fare'];
			$trImage = $trClass['images'];
			
			echo '<div class="addMoreBlock">';
			echo $this->Form->input('TransportAccomodation.id', array(
				'name' => 'data[accomodation][id][]',
				'value' => $trClass['id'],
			));
			echo $this->Form->input('TransportAccomodation.transport_class_id', array(
				'label' =>  __d('information', 'Transport Class'),
				'name' => 'data[accomodation][trclassname][]',
				'default'=>$trAccClass ,
			));
			echo $this->Form->input('fare', array(
				'label' =>  __d('information', 'Fare'),
				'name' => 'data[accomodation][trfare][]',
				'value' => $trFare,
			));
			echo $this->Form->input('oldimage', array(
				'type' =>  'hidden',
				'name' => 'data[accomodation][oldimage][]',
				'value' => $trImage,
			));
			$imglink = "transportClasses/photogallery/".$trImage;
			echo $this->Html->image($imglink,array('class' =>'snapimageimg img-responsive'));
			echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[accomodation][images][]", 'accept'=>"image/*"));
			echo $this->Form->button('Remove',array('type'=>'button','class' => 'blocremoveBtn pull-right'));
			echo '</div>';
		}
		
		
	echo $this->Html->tabEnd();
	echo $this->Croogo->adminTabs();

$this->end();
/*
$this->append('panels');

	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();
*/
$this->append('form-end', $this->Form->end());

?>

