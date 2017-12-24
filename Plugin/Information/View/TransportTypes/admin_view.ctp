<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Types'), h($transportType['TransportType']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Types'), array('action' => 'index'));

if (isset($transportType['TransportType']['name'])):
	$this->Html->addCrumb($transportType['TransportType']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Type'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Type'), array(
		'action' => 'edit',
		$transportType['TransportType']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Type'), array(
		'action' => 'delete', $transportType['TransportType']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportType['TransportType']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Service Providers'), array('controller' => 'transport_service_providers', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service Provider'), array('controller' => 'transport_service_providers', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('controller' => 'transport_services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('controller' => 'transport_services', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Stopages'), array('controller' => 'transport_stopages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Stopage'), array('controller' => 'transport_stopages', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportTypes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportType['TransportType']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Icon'); ?></dt>
		<dd>
			<?php echo h($transportType['TransportType']['icon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>