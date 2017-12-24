<?php
$this->viewVars['title_for_layout'] = __d('information', 'Transport Services');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Transport Services'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['TransportService']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Transport Services') . ': ' . $this->request->data['TransportService']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('TransportService',array('type'=>'file')));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Transport Service'), '#transport-service');
	echo $this->Croogo->adminTab(__d('information', 'Route Details'), '#transport-route');
	echo $this->Croogo->adminTab(__d('information', 'Transport Class'), '#transport-gallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('transport-service');
		?>
		<style>
			.fromCountryDiv,.toCountryDiv{display:none;}
		</style>
		<?php
		echo $this->Form->input('countryid', array('label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		
		echo $this->Form->input('Location.country_id', array('type' =>'hidden','id'=>'CountryId'));
		
		echo $this->Form->input('transport_type_id', array(
			'label' =>  __d('information', 'Transport Type'),
		));
		echo "<div class='trserviceprovidercontainer'>";
		echo "</div>";
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('bn_name', array(
			'label' =>  __d('information', 'Bn Name'),
		));
		echo $this->Form->input('details', array(
			'label' =>  __d('information', 'Details'),
		));
		echo $this->Form->input('bn_details', array(
			'label' =>  __d('information', 'Bn Details'),
		));
		echo $this->Form->input('contact', array(
			'label' =>  __d('information', 'Contact'),
		));
		echo $this->Form->input('website', array(
			'label' =>  __d('information', 'Website'),
		));
		echo $this->Form->input('email', array(
			'label' =>  __d('information', 'Email'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('information', 'Isactive'),
		));

	echo $this->Html->tabEnd();
	/**************************Route and Fair Block Start****************************/
	echo $this->Html->tabStart('transport-route');
		echo $this->Form->input('same_country',array('type' => 'checkbox','label'=>'Outer Country Service'));
		
		echo $this->Form->unlockField('FromCountryId');
		echo $this->Form->unlockField('ToCountryId');
		echo $this->Form->unlockField('RouteFromId');
		echo $this->Form->unlockField('RouteToId');
		echo $this->Form->input('FromCountryId',array('id'=>'FromCountryId','type'=>'hidden'));
		echo $this->Form->input('ToCountryId',array('id'=>'ToCountryId','type'=>'hidden'));
		echo $this->Form->input('RouteFromId',array('id'=>'RouteFromId','type'=>'hidden'));
		echo $this->Form->input('RouteToId',array('id'=>'RouteToId','type'=>'hidden'));
		
		echo $this->Form->input('TransportRoute.route_fromcountry', array(
			'label' =>  __d('information', 'Route From Country'),
			'div'=>array('class'=>'input text fromCountryDiv'),
		));
		echo $this->Form->input('TransportRoute.route_from', array(
			'label' =>  __d('information', 'Route From'),
		));
		echo $this->Form->input('TransportRoute.route_tocountry', array(
			'label' =>  __d('information', 'Route To Country'),
			'div'=>array('class'=>'input text toCountryDiv'),
		));
		echo $this->Form->input('TransportRoute.route_to', array(
			'label' =>  __d('information', 'Route To'),
		));
		echo $this->Form->input('TransportRoute.departure_time', array(
			'label' =>  __d('information', 'Departure Time'),
			'placeholder'=>'7.30 PM',
			
		));
		
		echo $this->Form->input('TransportRoute.name', array(
			'label' =>  __d('information', 'Route Name'),
		));
		echo $this->Form->input('TransportRoute.bn_name', array(
			'label' =>  __d('information', 'Route Bangla Name'),
		));
		
		echo $this->Form->input('TransportRoute.route_details', array(
			'label' =>  __d('information', 'Route Details'),
		));
		
		echo $this->Form->input('TransportRoute.off_day', array(
			'label' =>  __d('information', 'Weekly Off Day'),
		));
		
		echo $this->Form->input('TransportRoute.distance', array(
			'label' =>  __d('information', 'Distance in KM'),
			'placeholder'=>'8 Hours',
		));
		
		echo $this->Form->input('TransportRoute.estimated_reach_time', array(
			'label' =>  __d('information', 'Estimated Reach Time'),
			'placeholder'=>'8 Hours',
		));
		
		?>
		<script>
		  $( function() {
			function split( val ) {
			  return val.split( /,\s*/ );
			}
			function extractLast( term ) {
			  return split( term ).pop();
			}
			
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
					$('#FromCountryId').val($spec);
					$('#ToCountryId').val($spec);
					var countryID = $spec;
					var typeID = $('#TransportServiceTransportTypeId option:selected').val();
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
			
			//if(!$("input[@id=TransportServiceSameCountry]:checked")){
			/*
			if($("#TransportServiceSameCountry"). prop("checked") == false){
				alert();
				$('#FromCountryId').val($('#CountryId').val());
				$('#ToCountryId').val($('#CountryId').val());
			}
			*/
			$('#TransportServiceSameCountry').click(function(){
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
				minLength: 1
			});
			$('#TransportRouteName').focus(function(){
							$transportType = $('#TransportServiceTransportTypeId option:selected').text();
							$transportName = $('#TransportServiceName').val();
							$transportName = $('#TransportServiceName').val();
							$fromStation = $('#TransportRouteRouteFrom').val();
							$fromStationID = $('#RouteFromId').val();
							$toStation = $('#TransportRouteRouteTo').val();
							$toStationID = $('#RouteToId').val();
							$transportRouteDepartureTime = $('#TransportRouteDepartureTime').val();
							$generatedName = $transportType+'-'+$transportName+' '+$fromStation+' to '+$toStation+' [Departure Time:'+$transportRouteDepartureTime+']';
							$('#TransportRouteName').val($generatedName);
							$('#TransportRouteBnName').val($generatedName);
							
			});
			$('#TransportServiceTransportTypeId').change(function(){
					$transportClassId = this.value;
					var transportId = $transportClassId;
					$.ajax({
						dataType: "html",
						type: "GET",
						evalScripts: true,
						url: '<?php echo $this->base; ?>/information/transport_classes/ajaxtrclass',
						data: ({transportId:transportId}),
						success: function (data, textStatus){
							$(".trclasscontainer").html(data);
					 
						}
					});
					
					$.ajax({
						dataType: "html",
						type: "GET",
						evalScripts: true,
						url: '<?php echo $this->base; ?>/information/transport_service_providers/ajaxtrserviceprovider',
						data: ({transportId:transportId}),
						success: function (data, textStatus){
							$(".trserviceprovidercontainer").html(data);
					 
						}
					});
					
			});
			$( "#TransportServiceRouteDetails" )
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
						url: '<?php echo $this->base; ?>/general/zones/trlocation',
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
							$.ajax({
								url: '<?php echo $this->base; ?>/information/transport_routes/ajaxsave',
								dataType: "json",
								data: {
									transportClassId:		$('#TransportServiceTransportClassId option:selected').val(),
									transportServiceId:		$('#transport_service_id option:selected').val(),
									countryId:				$('#CountryId').val(),
									fromcountryId:			$('#FromCountryId').val(),
									tocountryId:			$('#ToCountryId').val(),
									RouteFromId:			$('#RouteFromId').val(),
									RouteToId:				$('#RouteToId').val(),
									routeNameEn:			$('#TransportServiceName').val(),
									routeNameBn:			$('#TransportServiceBnName').val(),
									TransportRouteRouteDetails:		$('#TransportServiceRouteDetails').val(),
									TransportRouteDepartureTime:	$('#TransportServiceDepartureTime').val(),
									TransportRouteEstimatedReachTime:	$('#TransportServiceEstimatedReachTime').val(),
									TransportRouteFare:		$('#TransportServiceFare').val()
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
	
		echo '<div class="accomodation">';
		echo '<div class="addMoreBlock">';
		echo '<div class="trclasscontainer">';
		//echo $this->Form->input('transport_class_id', array('label' =>  __d('information', 'Transport Class'),'name' => 'data[accomodation][trclassname][]','empty' => 'Select Class'));
		echo '</div>';
		echo $this->Form->input('fare', array(
			'label' =>  __d('information', 'Fare'),
			'name' => 'data[accomodation][trfare][]',
			'placeholder'=>'500 Tk.',
		));
	//debug($this->data);
		$dataClass = 'TransportRoute';
		echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[accomodation][images][]", 'accept'=>"image/*"));
		echo $this->Form->button('Remove',array('type'=>'button','class' => 'blocremoveBtn pull-right'));
		?>
		<script>
		$('.blocremoveBtn').click(function(){
			$(this).parent('div').remove();
		});
		</script>
		<?php
		echo '</div>';
		echo '</div>';
		
		echo '<div class="addMoreBlockfirst">';
		/*
		echo $this->Form->input('transport_class_id', array(
			'label' =>  __d('information', 'Transport Class'),
			'name' => 'data[accomodation][trclassname][1]',
			'empty' => 'Select Class'
		));
		*/
		echo '<div class="trclasscontainer">';
		//echo $this->Form->input('transport_class_id', array('label' =>  __d('information', 'Transport Class'),'name' => 'data[accomodation][trclassname][]','empty' => 'Select Class'));
		echo '</div>';
		echo $this->Form->input('fare', array(
			'label' =>  __d('information', 'Fare'),
			'name' => 'data[accomodation][trfare][1]',
			'placeholder'=>'500 Tk.',
		));
	//debug($this->data);
		$dataClass = 'TransportRoute';
		echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[accomodation][images][]", 'accept'=>"image/*"));
		echo '</div>';
		
		echo '<p class="accomodationmore"></p>';
		echo '<p><a id="add_row" class="addmorebtn btn btn-default pull-left">Add More</a></p>';
		$modelName = 'TransportRoute';
		$imageDB = 'TransportGallery';
		$imageFolder = 'transportService';
		?>
		<script>
		$('.fulldelbtn').click(function(){
				var delID = $(this).attr('id');
				var modelname = "<?php echo $imageDB; ?>";
				var foldername = "<?php echo $imageFolder; ?>";
				var classname = "<?php echo $imageDB; ?>";
				$.ajax({
					dataType: "html",
					type: "POST",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/information/transport_routes/ajaxdelete',
					data: ({imageid:delID,modelName:modelname,folder:foldername,classname:classname}),
					success: function (data, textStatus){
						$("#con"+delID).remove();
				 
					}
			});
		});
		$('.addmorebtn').click(function(){
			
			var moreData = $('.accomodation').html();
			$('.accomodationmore').append(moreData);
		});
		</script>
		<?php
		
		
		
	echo $this->Html->tabEnd();
	/**************************Route and Fair Block End****************************/
	
	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());
