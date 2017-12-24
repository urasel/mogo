<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Routes'), h($transportRoute['TransportRoute']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Routes'), array('action' => 'index'));

if (isset($transportRoute['TransportRoute']['id'])):
	$this->Html->addCrumb($transportRoute['TransportRoute']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Route'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Route'), array(
		'action' => 'edit',
		$transportRoute['TransportRoute']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Route'), array(
		'action' => 'delete', $transportRoute['TransportRoute']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportRoute['TransportRoute']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Routes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('controller' => 'transport_services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('controller' => 'transport_services', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Galleries'), array('controller' => 'transport_galleries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Gallery'), array('controller' => 'transport_galleries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportRoutes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRoute['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportRoute['TransportService']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRoute['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportRoute['TransportClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Fromcountryid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_fromcountryid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Fromid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_fromid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Tocountryid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_tocountryid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Toid'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_toid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Details'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['route_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fare'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Departure Time'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['departure_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Estimated Reach Time'); ?></dt>
		<dd>
			<?php echo h($transportRoute['TransportRoute']['estimated_reach_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportRoute['TransportRoute']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>