<!DOCTYPE html>
<html lang="bn">
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
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery.datetimepicker.full.min'); 
		
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
</head>
<body role="document">
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
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