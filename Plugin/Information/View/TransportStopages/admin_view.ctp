<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Stopages'), h($transportStopage['TransportStopage']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Stopages'), array('action' => 'index'));

if (isset($transportStopage['TransportStopage']['name'])):
	$this->Html->addCrumb($transportStopage['TransportStopage']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Stopage'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Stopage'), array(
		'action' => 'edit',
		$transportStopage['TransportStopage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Stopage'), array(
		'action' => 'delete', $transportStopage['TransportStopage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportStopage['TransportStopage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Stopages'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Stopage'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('controller' => 'transport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('controller' => 'transport_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportStopages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['Point']['name'], array('controller' => 'points', 'action' => 'view', $transportStopage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $transportStopage['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportStopage['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportStopage['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Address'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($transportStopage['TransportStopage']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportStopage['TransportStopage']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>