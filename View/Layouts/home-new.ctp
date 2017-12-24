<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php if(!empty($metadescription) && isset($metadescription)){ echo $metadescription;}?>">
	<meta name="keyword" content="<?php if(!empty($keyword)){echo $keyword;}else{echo $title_for_layout;}?>">
	<meta name="author" content="">
    
    <title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->css('infotheme/bootstrap');
		echo $this->Html->css('infotheme/owl.carousel');
		echo $this->Html->css('infotheme/font-awesome');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('infotheme/prettyPhoto');
		echo $this->Html->css('infotheme/animation');
		echo $this->Html->css('infotheme/style');
		echo $this->Html->css('infotheme/settings');
		
		
	?>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="http://infomap24.com/favicon.ico" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <?php echo $this->Html->script('infotheme/html5shiv'); ?>
	  <?php echo $this->Html->script('infotheme/respond.min'); ?>
	<![endif]-->


</head>
<body data-spy="scroll" data-offset="25">
     <?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
    <!--/HEADER SECTION -->
    <?php echo $this->element('infotheme/top-menu'); ?>
	<!-- end header -->
	
	<?php echo $content_for_layout; ?>
        
    <!--/ FOOTER SECTION-->  
    <?php echo $this->element('infotheme/footer'); ?>
	<!--/ Footer  End --> 
     
    <!-- SECTION CLOSED -->
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>  
    <?php
	echo $this->Html->script('infotheme/jquery');
	echo $this->Html->script('infotheme/bootstrap');
	echo $this->Html->script('infotheme/smooth-scroll');
	echo $this->Html->script('infotheme/jquery.parallax-1.1.3');
	echo $this->Html->script('infotheme/jquery.easypiechart.min');
	echo $this->Html->script('infotheme/owl.carousel');
	echo $this->Html->script('infotheme/jquery.jigowatt');
	echo $this->Html->script('infotheme/custom');
	echo $this->Html->script('infotheme/jquery.unveilEffects');
	echo $this->Html->script('infotheme/jquery.isotope.min');
	echo $this->Html->script('infotheme/scrollReveal');
	echo $this->Html->script('infotheme/jquery.prettyPhoto');
	echo $this->Html->script('infotheme/rs-plugin/jquery.themepunch.plugins.min');
	echo $this->Html->script('infotheme/rs-plugin/jquery.themepunch.revolution.min');
	?>
     
	<script>
		(function ($) {
			var $container = $('.masonry_wrapper'),
				colWidth = function () {
					var w = $container.width(), 
						columnNum = 1,
						columnWidth = 0;
					if (w > 1200) {
						columnNum  = 3;
					} else if (w > 900) {
						columnNum  = 3;
					} else if (w > 600) {
						columnNum  = 2;
					} else if (w > 300) {
						columnNum  = 1;
					}
					columnWidth = Math.floor(w/columnNum);
					$container.find('.item').each(function() {
						var $item = $(this),
							multiplier_w = $item.attr('class').match(/item-w(\d)/),
							multiplier_h = $item.attr('class').match(/item-h(\d)/),
							width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
							height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
						$item.css({
							width: width,
							height: height
						});
					});
					return columnWidth;
				}
							
				function refreshWaypoints() {
					setTimeout(function() {
					}, 1000);   
				}
							
				$('nav.portfolio-filter ul li a').on('click', function() {
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector }, refreshWaypoints());
					$('nav.portfolio-filter ul li a').removeClass('active');
					$(this).addClass('active');
					return false;
				});
					
				function setPortfolio() { 
					setColumns();
					$container.isotope('reLayout');
				}
		
				isotope = function () {
					$container.isotope({
						resizable: true,
						itemSelector: '.item',
						masonry: {
							columnWidth: colWidth(),
							gutterWidth: 0
						}
					});
				};
			isotope();
			$(window).smartresize(isotope);
		}(jQuery));
	</script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        
        
		<script type="text/javascript">
			var revapi;
			jQuery(document).ready(function() {
			revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ""
			 });
		   });	//ready
		</script>
		
		
    
    <!-- Animation Scripts-->
    
    <script>
            (function($) {
            "use strict"
                window.scrollReveal = new scrollReveal();
            })(jQuery);
    </script>
    
    <!-- Portofolio Pretty photo JS -->       
    
    <script type="text/javascript">
        (function($) {
            "use strict";
            jQuery('a[data-gal]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('gal'));
            });  	
                jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
        })(jQuery);
    </script>
    <?php echo $this->element('sql_dump'); ?>  
    
</body>
</html>