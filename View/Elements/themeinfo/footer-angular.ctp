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
	<!-- Angular JS Resource  Start-->
	<?php 
		echo $this->Html->script('angularjs/angular.min'); 
		echo $this->Html->script('angularjs/ng-infinite-scroll.min'); 
		echo $this->Html->script('angularjs/script'); 
		echo $this->Html->script('angularjs/tag_script'); 
		echo $this->Html->script('angularjs/search_script'); 
		
	?>
	<!-- Angular JS Resource  End-->
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