<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $this->element('infothemenew/meta'); ?>
<!-- css -->
<?php
	echo $this->Html->css('infothemenew/bootstrap.min');
	echo $this->Html->css('infothemenew/materialdesignicons.min');
	echo $this->Html->css('infothemenew/jquery.mCustomScrollbar.min');
	echo $this->Html->css('font-awesome.min');
	echo $this->Html->css('infothemenew/prettyPhoto');
	echo $this->Html->css('infothemenew/unslider');
	echo $this->Html->css('infothemenew/template');
	echo $this->Html->css('infothemenew/theme');
	
		echo $this->Html->css('bootstrap/sprite-flags-64x64');
		echo $this->Html->css('bootstrap/sprite-flags-48x48');
		echo $this->Html->css('bootstrap/sprite-flags-32x32');
		echo $this->Html->css('bootstrap/sprite-flags-24x24');
		echo $this->Html->css('bootstrap/sprite-flags-16x16');
	
?>
</head>
<body data-target="#nino-navbar" data-spy="scroll">
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
    <!--/HEADER SECTION -->
    <?php echo $this->element('infothemenew/header-common'); ?>
	<!-- end header --> 
			<div class="container">
			<div class="breadcrumb">
				<?php
				echo $this->Html->getCrumbs(' > ', __('Home'));
				?>
			</div>
			</div>
			<?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
	
        
    <!--/ FOOTER SECTION-->  
    <?php echo $this->element('infothemenew/footer'); ?>
	<!--/ Footer  End --> 
     
    
	<!-- Scroll to top
    ================================================== -->
	<a href="#" id="nino-scrollToTop">Go to Top</a>
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

