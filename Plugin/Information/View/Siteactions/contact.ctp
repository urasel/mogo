<?php
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
?>
<?php
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<div class="col-md-12">';
echo '<div class="row">';
	echo '<div class="col-md-12  sectionblock">';
	echo '<h1 class="ff2">'.$title_for_layout.'</h1>';
		
			echo '<div class="row"><div class="col-md-8 form">';
			echo '<p>';
			echo __("We are here to answer any questions you may have about our InfoMap24 experiences. Reach out to us and we'll respond as soon as we can.<br/><br/>
			Even if there is something you have always wanted to experience and can't find it on InfoMap24, let us know and we promise we'll do our best to find it for you and send you ther
			");
			echo '</p>';
			
			
			echo $this->Form->create('Pages',array('controller' =>'pages','action'=>'send_email'));
			echo $this->Form->input('name', array('class'=>'form-control ','label'=>__('Your Name'),'placeholder'=>__('Your Name'),'tabindex'=> "1"));
			echo $this->Form->input('email', array('class'=>'form-control ','label'=>__('Your Email'),'placeholder'=>__('Your Email'),'tabindex'=> "2"));
			echo $this->Form->input('Subject', array('class'=>'form-control ','label'=>__('Mail Subject'),'placeholder'=>__('Mail Subject'),'tabindex'=> "3"));
			echo $this->Form->input('Message', array('class'=>'form-control ','type'=>'textarea','label'=>__('Message'),'placeholder'=>__('Message'),'tabindex'=> "4"));
			$options = array('label' => __('Send Mail'), 'class' => 'btn btn-default');
			echo $this->Form->end($options); 
			echo '</div>';
			
			echo '<div class="col-md-4 contact-info">';
			echo '<dl>
			  <dt>Email</dt>
			  <dd><a title="Click to send us an email" href="mailto:infomap24@gmail.com">infomap24@gmail.com</a></dd>
			  <!--<dt>Telephone</dt>
			  <dd><a title="Click to call us" href="tel:+8801671328000">+8801671328000</a></dd>-->
			  <dt>Skype</dt>
			  <dd><a title="Click to call us on Skype" href="skype:infomap24?call">infomap24</a></dd>
			  <dt>Address</dt>
			  <dd>
				<address>
				<span class="logostyle">InfoMap24.Com</span><br>
				House 54 (5th Floor)<br>
				Road 10, Block F<br>
				Banani, Dhaka - 1216<br>
				</address>
			  </dd>
			  <dd class="social-links">
				<a title="Find us on Facebook" href="http://www.facebook.com/infoMap24" class="fb">Facebook</a>
				<a title="Find us on Twitter" href="http://twitter.com/infomap24" class="tt">Twitter</a>
			  </dd>
			</dl>';
			
			echo '</div>';
			echo '</div>';
	echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
	
?>
