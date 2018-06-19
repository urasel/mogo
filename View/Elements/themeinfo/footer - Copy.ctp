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
<!--js code-->