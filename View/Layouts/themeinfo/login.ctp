<?php echo $this->element('themeinfo/header-common'); ?>
<!-- css -->

</head>
<body>
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
    <!--/HEADER SECTION -->
    <?php echo $this->element('themeinfo/top-header'); ?>
    <?php echo $this->element('themeinfo/header-menu'); ?>
	<!-- end header --> 
	
			<?php 
			if(!empty($this->Session->flash()) || !empty($this->Session->flash('auth'))) {
				
			?>
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
	
        
    <!--/ FOOTER SECTION-->  
    <?php echo $this->element('themeinfo/footer-content'); ?>
	<!--/ Footer  End --> 
    <?php echo $this->element('themeinfo/footer'); ?> 
    <?php echo $this->element('sql_dump'); ?>  
    
</body>
</html>
