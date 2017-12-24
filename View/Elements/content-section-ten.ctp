<div class="row">
	<div class="col-md-12">
	<?php //echo $this->element('related_info');?>
	</div>
</div>
<p>
<span class="update_dialog">Is this your business? Or have update information?</span>
<?php 
if(isset($paramdata)){
	$paramdata = $paramdata;
}else{
	$paramdata = '';
}
echo $this->Html->link('Claim or Update it now',array('plugin' => 'information','controller' => 'update_informations', 'action' => 'add','?' => $paramdata),array('class' => 'update_button'));?><br/>
Make sure your information is up to date. Plus use our free tools to find new customers.
</p>
<div class="row">
	<div class="col-md-12">
	<div class="fb-comments" data-href="http://www.infomap24.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>
