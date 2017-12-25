<div class="row">
			
	<div class="col-md-12" id="mapdiv">

		<?php
		echo $this->element('parts/viewmap', array('title' => $title,'place'=>$place,'className' => $className));
		
		?>
	</div>
	<div id="canvas" style="display:none;"><p>Canvas:</p></div>
	<div style="width:200px; float:left; display:none;" id="image"></div>
	<div class="col-md-12">
		<?php
		echo '';
		echo '<div class="panel panel-info" style="margin-top:0px;">';
		echo '<div class="panel-heading"><h4 class="panel-title">';
		echo __('Reviews of %s',$title);
		echo '</h4></div>';
		echo '<div class="panel-body">';
		echo '<div style="width: auto; max-height: 300px">'.__('Yet No Review').'</div>';
		echo $this->element('rating');
		echo '</div>';
		echo '</div>';
		
		?>
	</div>

</div>