<?php
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
?>
<?php
echo '<div class="row">';
	echo '<div class="col-md-5">';
	echo '<div class="panel panel-info">';
	echo '<div class="panel-body" style="padding-left:16px;">';
		?>
		<div id="dd"></div>
		<script type='text/javascript'>
			var captchaContainer = null;
			var loadCaptcha = function() {
			  captchaContainer = grecaptcha.render('captcha_container', {
				'sitekey' : '6LfoZR4TAAAAAFMnr7ElczyfAlUnnUkgU75exfQM',
				'callback' : function(response) {
				  //document.getElementById('dd').innerHTML = JSON.stringify(response);
				  $( "#robotformtarget" ).submit();
				}
			  });
			};
		</script>
		<form role="form" id="robotformtarget" class="form-horizontal" method="POST">
		  <div class="form-group">
			 <div id="captcha_container"></div>
		  </div>
		</form>
		<script src="https://www.google.com/recaptcha/api.js?onload=loadCaptcha&render=explicit" async defer></script>
		<?php
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<div class="col-md-5">';
	echo '</div>';
echo '</div>';


?>

