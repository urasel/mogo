<?php
echo $this->Form->unlockField('Address.bd_district_id');
echo $this->Form->input('Address.bd_district_id', array('id' => 'addressdistrictid','class'=>'input-block-level','label' => false,'placeholder'=>'District Name','empty' =>'Select District','tabindex'=> "3"));
?>
<script>
$(document).ready(function() {
		$('#addressdistrictid').change(function(){
				substring = '';
				$("#thanaDiv").html("");
				var districtId = $(this).val();
				$.ajax({
					dataType: "html",
					type: "GET",
					evalScripts: true,
					url: '<?php echo Router::url(array('controller'=>'zones','action'=>'ajaxthana'));?>',
					data: ({districtid:districtId}),
					success: function (data, textStatus){
						$("#thanaDiv").html(data);
						
				 
					},
				});
				
		});
});
</script>