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
			'/croogo/css/multi-select',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			'/croogo/js/html5',
			'/croogo/js/jcrop/js/jquery.min',
			'/croogo/js/jquery/jquery-ui.min',
			'/croogo/js/jcrop/jquery.Jcrop.min',
			'/croogo/js/jcrop/jcrop_script_topic',
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
			'/croogo/js/jquery.multi-select',
			
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>

	</body>
</html>