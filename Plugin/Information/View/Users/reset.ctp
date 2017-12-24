<?php
$this->Html->addCrumb(__('Reset Password'),  '' , array('class' => 'active'));

	echo '<div class="row">';
		echo $this->Session->flash('auth');
		echo '<div class="col-md-5">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-body">';
		echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'reset', $username, $key)));
		echo $this->Form->input('password', array('class'=>'form-control','label' => __('New password')));
		echo $this->Form->input('verify_password', array('class'=>'form-control','type' => 'password', 'label' => __('Verify Password')));
		echo '<br/>';
		$options = array('label' => __('Submit'), 'class' => 'btn btn-default');
		echo $this->Form->end($options);
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo '<div class="col-md-7 lower">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-body">';
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
	echo '</div>';
?>
