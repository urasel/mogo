<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Accomodations'), h($transportAccomodation['TransportAccomodation']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Accomodations'), array('action' => 'index'));

if (isset($transportAccomodation['TransportAccomodation']['name'])):
	$this->Html->addCrumb($transportAccomodation['TransportAccomodation']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Accomodation'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Accomodation'), array(
		'action' => 'edit',
		$transportAccomodation['TransportAccomodation']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Accomodation'), array(
		'action' => 'delete', $transportAccomodation['TransportAccomodation']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportAccomodation['TransportAccomodation']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Accomodations'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Accomodation'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Classes'), array('controller' => 'transport_classes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Class'), array('controller' => 'transport_classes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('controller' => 'transport_services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('controller' => 'transport_services', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportAccomodations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportRoute']['name'], array('controller' => 'transport_routes', 'action' => 'view', $transportAccomodation['TransportRoute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportClass']['name'], array('controller' => 'transport_classes', 'action' => 'view', $transportAccomodation['TransportClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportAccomodation['TransportService']['name'], array('controller' => 'transport_services', 'action' => 'view', $transportAccomodation['TransportService']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fare'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Images'); ?></dt>
		<dd>
			<?php echo h($transportAccomodation['TransportAccomodation']['images']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportAccomodation['TransportAccomodation']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>