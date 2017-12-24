<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Classes'), h($transportClass['TransportClass']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Classes'), array('action' => 'index'));

if (isset($transportClass['TransportClass']['name'])):
	$this->Html->addCrumb($transportClass['TransportClass']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Class'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Class'), array(
		'action' => 'edit',
		$transportClass['TransportClass']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Class'), array(
		'action' => 'delete', $transportClass['TransportClass']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportClass['TransportClass']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Classes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Class'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('controller' => 'transport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('controller' => 'transport_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportClasses view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportClass['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportClass['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Details'); ?></dt>
		<dd>
			<?php echo h($transportClass['TransportClass']['bn_details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>