<?php
$this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<div class="row">';
	echo '<div class="col-md-12  sectionblock">';
	echo '<div class="blog_about">';
	?>		
		<div class="col-md-12 posttitleblock zeropadding">
			<div class="col-sm-112 col-xs-12 col-md-12 zeropadding">
			<?php 
					echo '<h1>'.$title_for_layout.'</h1>'; 
					
			?>
			</div>
		</div>
	<?php
		
			echo '<div class="row"><div class="col-md-6">';
			echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot')));
			echo $this->Form->input('username', array('class'=>'form-control ','label'=>__('Your Username'),'placeholder'=>__('Username'),'tabindex'=> "1"));
			$options = array('label' => __('Submit'), 'class' => 'btn btn-default');
			echo $this->Form->end($options); 
			echo '</div>';
			echo '</div>';
	
	echo '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
	
?>
