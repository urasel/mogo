<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Services'), h($transportService['TransportService']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Services'), array('action' => 'index'));

if (isset($transportService['TransportService']['name'])):
	$this->Html->addCrumb($transportService['TransportService']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Service'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Service'), array(
		'action' => 'edit',
		$transportService['TransportService']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Service'), array(
		'action' => 'delete', $transportService['TransportService']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportService['TransportService']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('controller' => 'transport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('controller' => 'transport_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportServices view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportService['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportService['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportService['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Service Provider'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportService['TransportServiceProvider']['name'], array('controller' => 'transport_service_providers', 'action' => 'view', $transportService['TransportServiceProvider']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Details'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($transportService['TransportService']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportService['TransportService']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>