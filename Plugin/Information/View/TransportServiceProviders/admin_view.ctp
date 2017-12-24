<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Service Providers'), h($transportServiceProvider['TransportServiceProvider']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Service Providers'), array('action' => 'index'));

if (isset($transportServiceProvider['TransportServiceProvider']['name'])):
	$this->Html->addCrumb($transportServiceProvider['TransportServiceProvider']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Service Provider'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Service Provider'), array(
		'action' => 'edit',
		$transportServiceProvider['TransportServiceProvider']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Service Provider'), array(
		'action' => 'delete', $transportServiceProvider['TransportServiceProvider']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportServiceProvider['TransportServiceProvider']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Service Providers'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service Provider'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('controller' => 'transport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('controller' => 'transport_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('controller' => 'transport_services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('controller' => 'transport_services', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportServiceProviders view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportServiceProvider['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportServiceProvider['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportServiceProvider['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportServiceProvider['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Head Office'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['head_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Head Office'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_head_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Address'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Logo'); ?></dt>
		<dd>
			<?php echo h($transportServiceProvider['TransportServiceProvider']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportServiceProvider['TransportServiceProvider']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>