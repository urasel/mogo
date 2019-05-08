<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--[endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title_for_layout; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="<?php if(!empty($metadescription) && isset($metadescription)){ echo $metadescription;}?>">
	<meta name="author" content="urasel@gmail.com">
	<meta name="copyright" content="infoMap24.com"> 
	<meta name="keyword" content="<?php if(!empty($keyword)){echo $keyword;}else{echo $title_for_layout;}?>">
    <meta name="description" content="Infomap24 Information" />
    <meta name="MobileOptimized" content="320" />
	
	<meta property="fb:app_id"          content="1615601348750396" /> 
	<meta property="og:type"            content="article" /> 
	<meta property="og:url"             content="<?php echo Router::url( $this->here, true ); ?>" /> 
	<meta property="og:title"           content="<?php echo $title_for_layout; ?>" /> 
	<meta property="og:image"           content="" /> 
	<meta property="og:description"    	content="<?php if(!empty($metadescription) && isset($metadescription)){ echo $metadescription;}?>" />
	
    <!-- style -->
    <?php
		echo $this->Html->css('themeinfo/animate');
		echo $this->Html->css('themeinfo/bootstrap.min');
		echo $this->Html->css('themeinfo/font-awesome.min');
		echo $this->Html->css('themeinfo/owl.carousel');
		echo $this->Html->css('themeinfo/magnific-popup');
		echo $this->Html->css('themeinfo/owl.theme.default');
		echo $this->Html->css('themeinfo/flaticon');
		echo $this->Html->css('themeinfo/fonts');
		echo $this->Html->css('themeinfo/style');
		echo $this->Html->css('themeinfo/responsive');
		echo $this->Html->css('themeinfo/template');
		echo $this->Html->css('font-awesome.min');
		
	?>
    <!-- favicon link-->
	<link rel="shortcut icon" type="image/icon" href="http://infomap24.com/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lora|Montserrat:400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-67836284-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-67836284-2');
</script>

<script src='https://cdn.rawgit.com/OpenShare/openshare/master/dist/openshare.js'></script>

