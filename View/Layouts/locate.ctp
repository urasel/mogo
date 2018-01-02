<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title_for_layout; ?></title>
	<?php

		echo $this->Html->css('themes/ui-lightness/jquery-ui-1.8.10.custom.css');
		echo $this->Html->css('infothemenew/bootstrap.min');
		echo $this->Html->css('infothemenew/materialdesignicons.min');
		echo $this->Html->css('infothemenew/jquery.mCustomScrollbar.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('infothemenew/prettyPhoto');
		echo $this->Html->css('infothemenew/unslider');
		echo $this->Html->css('infothemenew/template');
		echo $this->Html->css('infothemenew/theme');

	?>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
<link rel="icon" href="http://oximap.com/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://oximap.com/img/favicon.ico" type="image/x-icon" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63812781-1', 'auto');
  ga('send', 'pageview');

</script>
	<?php
		echo $this->Html->script('infothemenew/jquery.min');
		echo $this->Html->script('infothemenew/isotope.pkgd.min');
		echo $this->Html->script('infothemenew/jquery.prettyPhoto');
		echo $this->Html->script('infothemenew/bootstrap.min');
		echo $this->Html->script('infothemenew/jquery.hoverdir');
		echo $this->Html->script('infothemenew/modernizr.custom.97074');
		echo $this->Html->script('infothemenew/jquery.mCustomScrollbar.concat.min');
		echo $this->Html->script('infothemenew/unslider-min');
		echo $this->Html->script('infothemenew/template');
	?>
</head>
<body>
	<!-- Fixed navbar -->
    <?php echo $this->element('infothemenew/header-common'); ?>
			<div class="container">
					<div class="breadcrumb">
						<?php
						echo $this->Html->getCrumbs(' > ', __('Home'));
						?>
					</div>
			</div>
			<?php if(!empty($this->Session->flash()) || !empty($this->Session->flash('auth'))) {?>
			<section>
			<div class="container">
					<div class="row">
						<div class="col-md-12">
						<?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
						</div>
					</div>
			</div>
			</section>
			<?php } ?>
			<?php echo $content_for_layout; ?>
		
	
	<?php echo $this->element('infothemenew/footer'); ?>
	<!-- Scroll to top
    ================================================== -->
	<a href="#" id="nino-scrollToTop">Go to Top</a>
	

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>