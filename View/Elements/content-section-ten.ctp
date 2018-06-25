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

<!--Writer Information Part Start-->
<?php if(!empty($userdata['name'])){ ?>
<div class="row">
<div class="col-xs-12 col-md-12">
	<div class="col-xs-12 col-md-12 writerblock">
	<h2>Writer Details</h2>
		<div class="writerimage">
		<?php 
		$userImageLink = 'users/small/'.$userdata['image'];
		echo $this->Html->image($userImageLink);
		?>
		</div>
		<div class="writer_details">
			<div class="row">
				<div class="col-xs-12 addrtitle"><?php echo $userdata['name']; ?></div>
				<div class="col-xs-12 addrtitle">
				<i class="fa fa-facebook-square"></i>
				<i class="fa fa-google-plus-square"></i>
				<i class="fa fa-twitter-square"></i>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php } ?>
<!--Writer Information Part End-->

<div class="row">
	<div class="col-md-12">
	<div class="fb-comments" data-href="http://www.infomap24.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>
