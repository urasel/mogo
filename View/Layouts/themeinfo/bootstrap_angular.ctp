<?php echo $this->element('themeinfo/header-angular'); 

?>

<!-- css -->

</head>
<body  ng-app='myapp' ng-controller='fetchCtrl' ng-init="init('James Bond','007')">
<?php debug($this->params);exit;?>
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
    <!--/HEADER SECTION -->
    <?php echo $this->element('themeinfo/top-header'); ?>
    <?php echo $this->element('themeinfo/header-menu'); ?>
	<!-- end header --> 
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="med_tittle_cont_wrapper">
							<div class="med_tittle_cont">
								<ol class="breadcrumb zeropadding">
									<?php
										echo $this->Html->getCrumbs(' > ', __('Home'));
									?>
								</ol>
							</div>
						</div>
					</div>
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
	
        
    <!--/ FOOTER SECTION-->  
    <?php echo $this->element('themeinfo/footer-content'); ?>
	<!--/ Footer  End --> 
    <?php echo $this->element('themeinfo/footer-angular'); ?> 
    <?php echo $this->element('sql_dump'); ?>  
    
</body>
</html>
