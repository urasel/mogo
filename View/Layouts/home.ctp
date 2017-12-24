<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $title_for_layout; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<?php
		// echo $this->Html->css('bootstrap/bootstrap.min');
		// echo $this->Html->css('bootstrap/bootstrap-theme.min');
		// echo $this->Html->css('bootstrap/theme');
		// echo $this->Html->css('font-awesome.min');
		// echo $this->Html->css('google-jquery-ui');
		echo $this->Html->css('home-combined');
		echo $this->Html->css('bootstrap/theme');
		//echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('bootstrap.min', array('async' => 'async'));
		echo $this->Html->script('jquery.datetimepicker.full.min', array('inline' => true, 'async' => 'async')); 
		echo $this->Html->script('jquery.lazyload', array('inline' => true, 'async' => 'async')); 
		
	?>
	
	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo $this->Html->script('bootstrap/ie8-responsive-file-warning'); ?>
	<?php echo $this->Html->script('bootstrap/ie-emulation-modes-warning');?>
	<![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
<script>
	$(function() {
    $("img.lazy").lazyload({
        event : "sporty"
    });
});

$(window).bind("load", function() {
    var timeout = setTimeout(function() {
        $("img.lazy").trigger("sporty")
    }, 5000);
});
</script>
</head>
<body role="document">
	<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
	<!-- Fixed navbar -->
    <?php 
	if(isset($bloodnews)){
	echo $this->element('infomap_top_menu', array('bloodnews' => $bloodnews)); 
	}else{
	echo $this->element('infomap_top_menu');
	}
	?>
	
	
	<?php echo $content_for_layout; ?>
	
	<?php
	echo $scripts_for_layout;
	?>
	<?php echo $this->element('oximap_footer'); ?>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>