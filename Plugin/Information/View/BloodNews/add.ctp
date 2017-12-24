<?php
      $this->viewVars['title_for_layout'] = __('Add Blood News');
?>
<?php
$this->Html
	->addCrumb(__('Add Blood News'), array('action' => 'index'));
	
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<div class="col-md-12">';
echo '<div class="row">';
	echo '<div class="col-md-12  sectionblock">';
		
			echo '<div class="row"><div class="col-md-6">';
			echo $this->Form->create('BloodNews');
			
			echo $this->Form->input('id');

			echo $this->Form->input('blood_group_id', array(
				'class'=>'form-control ',
				'label' =>  __('Blood Group'),
			));
			echo $this->Form->input('requireddate', array(
				'class'=>'form-control ','id'=>"datetimepicker",
				'label' =>  __('Required Date'),
			));
			?>
			<script>
			$(document).ready(function(){
				$('#datetimepicker').datetimepicker({
				dayOfWeekStart : 1,
				format:'Y-m-d H:i:s',
				lang:'en'
				});
			});
			</script>
			<?php
			echo $this->Form->input('quantity', array(
				'class'=>'form-control ',
				'placeholder'=> __("1.5"),
				'label' =>  __('Quantity (Pound)'),
			));
			echo $this->Form->input('mobile', array(
				'class'=>'form-control ',
				'label' =>  __('Mobile'),
			));
			echo $this->Form->input('BloodNewsDetail.details', array(
				'class'=>'form-control ',
				'type' => 'textarea',
				'label' =>  __('Details'),
			));
			echo $this->Form->input('BloodNewsDetail.address', array(
				'class'=>'form-control ',
				'label' =>  __('Address'),
			));
			//echo $this->Form->input('isactive', array('label' =>  __('Publish')));
			
			$options = array('label' => __('Save'), 'class' => 'btn btn-default');
			echo $this->Form->end($options); 
			echo '</div>';
			echo '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
	
?>

