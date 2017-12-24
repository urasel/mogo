<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
	$site = $this->Session->read('site');
	echo $this->Html->charset(); 
	?>
	<title><?php echo $title_for_layout; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="<?php if(!empty($title_for_layout) && isset($title_for_layout)){ echo $title_for_layout;}?>">
	<meta name="description" content="<?php if(!empty($short_description) && isset($short_description)){ echo $short_description;}?>">
	<meta name="keyword" content="<?php if(!empty($keyword)){echo $keyword;}else{echo $place['Point']['name'];}?>">
	<meta name="author" content="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php

		// echo $this->Html->css('bootstrap/bootstrap.min');
		// echo $this->Html->css('bootstrap/bootstrap-theme.min');
		// echo $this->Html->css('bootstrap/theme');
		// echo $this->Html->css('font-awesome.min');
		// echo $this->Html->css('google-jquery-ui');
		echo $this->Html->css('home-combined');
		echo $this->Html->css('bootstrap/theme');
		//echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery.datetimepicker.full.min'); 

	?>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo $this->Html->script('bootstrap/ie8-responsive-file-warning'); ?>
	<?php echo $this->Html->script('bootstrap/ie-emulation-modes-warning'); ?>
	<?php echo $this->Html->script('bootstrap/ie10-viewport-bug-workaround'); ?>
	<![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
<meta property="fb:admins" content="1715859507"/>
</head>
<body>
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
	<!-- Fixed navbar -->
    
	<?php echo $this->element('infomap_top_menu'); ?>
	<div class="container  theme-showcase">
		<div class="row">
		</div>		
		<div id="content-whole">
			<div id="content" class="clearfix">
			<div class="breadcrumb">
				<?php
				echo $this->Html->getCrumbs(' > ', __('Home'));
				?>
			</div>
				<?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		
	</div>
	
	
	<?php
	echo $scripts_for_layout;
	?>
	
	<?php echo $this->element('oximap_footer'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>

</html>
