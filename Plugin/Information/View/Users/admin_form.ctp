<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Users'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['User']['name'], array(
		'plugin' => 'users', 'controller' => 'users', 'action' => 'edit',
		$this->request->data['User']['id']
	));
	$this->set('title_for_layout', __d('croogo', 'Edit user %s', $this->request->data['User']['username']));
} else {
	$this->set('title_for_layout', __d('croogo', 'New user'));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'add'));
}

$this->start('actions');
if ($this->request->params['action'] == 'admin_edit'):
	echo $this->Croogo->adminAction(__d('croogo', 'Reset password'), array('action' => 'reset_password', $this->request->params['pass']['0']));
endif;
$this->end();

$this->append('form-start', $this->Form->create('User', array(
	'fieldAccess' => array(
		'User.role_id' => 1,
	),
	'class' => 'protected-form',
	'type' => 'file',
)));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('croogo', 'User'), '#user-main');
	echo $this->Croogo->adminTab(__d('croogo', 'Bangla Entry'), '#user-bangla');
	echo $this->Croogo->adminTab(__d('croogo', 'English Entry'), '#user-english');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('user-main') .
		$this->Form->input('id') .
		$this->Form->input('role_id', array('label' => __d('croogo', 'Role'))) .
		$this->Form->input('username', array(
			'label' => __d('croogo', 'Username'),
		)) .
		$this->Form->input('email', array(
			'label' => __d('croogo', 'Email'),
		)) .
		$this->Form->input('website', array(
			'label' => __d('croogo', 'Website'),
		)) .
		$this->Form->input('timezone', array(
			'type' => 'select',
			'empty' => true,
			'options' => $this->Time->listTimezones(),
			'label' => __d('croogo', 'Timezone'),
		)) .
		$this->Form->unlockField('Crop.x1').
		$this->Form->unlockField('Crop.y1').
		$this->Form->unlockField('Crop.x2').
		$this->Form->unlockField('Crop.y2').
		$this->Form->unlockField('Crop.w').
		$this->Form->unlockField('Crop.h').
		$this->Form->input('Crop.x1', array('type'=>'hidden','id'=>'x1')).		
		$this->Form->input('Crop.y1', array('type'=>'hidden','id'=>'y1')).
		$this->Form->input('Crop.x2', array('type'=>'hidden','id'=>'x2')).		
		$this->Form->input('Crop.y2', array('type'=>'hidden','id'=>'y2')).
		$this->Form->input('Crop.w', array('type'=>'hidden','id'=>'w')).		
		$this->Form->input('Crop.h', array('type'=>'hidden','id'=>'h')).
		$this->Form->unlockField('newimage').
		$this->Form->unlockField('oldimage').
		$this->Form->input('oldimage', array('type'=>'hidden','value'=> @$this->data['User']['image'])).
		$this->Form->input('newimage', array('type'=>'file','label' => __d('croogo', 'User Photo'),'id'=>'image_file','onchange'=>'fileSelectHandler()')).
		$this->Html->image("users/large/".@$this->data['User']['image'],array('id'=>'preview'));
		
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('user-bangla') .
		
		$this->Form->input('bn_name', array(
			'label' => __d('croogo', 'Name Bangla'),
		)) .
		$this->Form->input('bn_firstname', array(
			'label' => __d('croogo', 'First Name Bangla'),
		)) .
		$this->Form->input('bn_lastname', array(
			'label' => __d('croogo', 'Last Name Bangla'),
		));
		
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('user-english') .
		$this->Form->input('name', array(
			'label' => __d('croogo', 'Name English'),
		)) .
		$this->Form->input('firstname', array(
			'label' => __d('croogo', 'First Name English'),
		)) .
		$this->Form->input('lastname', array(
			'label' => __d('croogo', 'Last Name English'),
		));
		
	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();
$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'success')) .
		$this->Html->link(
			__d('croogo', 'Cancel'), array('action' => 'index'),
			array('button' => 'danger')
		);

	if ($this->request->params['action'] == 'admin_add'):
		echo $this->Form->input('notification', array(
			'label' => __d('croogo', 'Send Activation Email'),
			'type' => 'checkbox',
		));
	endif;

	echo $this->Form->input('status', array(
		'label' => __d('croogo', 'Status'),
	));

	$showPassword = !empty($this->request->data['User']['status']);
	if ($this->request->params['action'] == 'admin_add'):
		$out = $this->Form->input('password', array(
			'label' => __d('croogo', 'Password'),
			'disabled' => !$showPassword,
		));
		$out .= $this->Form->input('verify_password', array(
			'label' => __d('croogo', 'Verify Password'),
			'disabled' => !$showPassword,
			'type' => 'password'
		));

		$this->Form->unlockField('User.password');
		$this->Form->unlockField('User.verify_password');

		echo $this->Html->div(null, $out, array(
			'id' => 'passwords',
			'style' => $showPassword ? '' : 'display: none',
		));
	endif;

	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());

$script = <<<EOF
	$('#UserStatus').on('change', function(e) {
		var passwords = $('#passwords');
		var elements = $('input', passwords);
		elements.prop('disabled', !this.checked);
		if (this.checked) {
			passwords.show('fast');
		} else {
			passwords.hide('fast');
		}
	});
	$('#UserNotification').on('change', function(e) {
		var status = $('#UserStatus');
		status.attr('checked', false);
		status.trigger('change').parent().toggle('fast');
	});
EOF;

if ($this->request->params['action'] == 'admin_add'):
	$this->Js->buffer($script);
endif;
