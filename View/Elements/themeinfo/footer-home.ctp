<!--main js files-->
	<?php 
	echo $this->Html->script('themeinfo/jquery_min'); 
	echo $this->Html->script('themeinfo/bootstrap.min'); 
	echo $this->Html->script('themeinfo/jquery.inview.min'); 
	echo $this->Html->script('themeinfo/ecwow.minho'); 
	echo $this->Html->script('themeinfo/owl.carousel'); 
	echo $this->Html->script('themeinfo/jquery.magnific-popup'); 
	echo $this->Html->script('themeinfo/echo.min'); 
	echo $this->Html->script('themeinfo/custom'); 
	echo $this->Html->script('themeinfo/jCircle.min'); 
	?>
	<script>
		echo.init({
		offset: 250,
		throttle: 250,
		unload: false,
		callback: function (element, op) {
		  console.log(element, 'has been', op + 'ed')
		}
		});
	</script>
	
	<script>
	  var textCircle=new jCircle({
		'container': 'circles-container-text',
		'circle': 'circle-text',
		'mainContent':'main-circle-content-text',
		'animateCircles':true,
		'speed':3,
		'mainViewStyle':'normal',
		'minCirclesEffectOver':'rotate',
		'contentType':'text',
		'stopOnOverMain':true
	  });
	  textCircle.create();
    </script>
<!--js code-->