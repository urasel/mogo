<?php
echo $this->Form->unlockField('bd_division_id');
echo $this->Form->input('Address.bd_division_id', array('id'=>'addresszoneid','class'=>'input-block-level','label' => false,'empty' =>'Select Division','tabindex'=> "2"));
?>
<script>
$(document).ready(function() {
		$('#addresszoneid').change(function(){
				substring = '';
				$("#districtDiv").html("");
				$("#thanaDiv").html("");
				var countryID = $('#CountryId').val();
				if(countryID == 18){
				var HotelZoneId = $(this).val();
				$.ajax({
					dataType: "html",
					type: "GET",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/general/zones/ajaxdistrict',
					data: ({districtid:HotelZoneId}),
					success: function (data, textStatus){
						$("#districtDiv").html(data);
				 
					},
				});
				}else{
				
				}
				
		});
});
</script>