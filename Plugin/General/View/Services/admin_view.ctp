<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Services'), h($service['Service']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Services'), array('action' => 'index'));

if (isset($service['Service']['name'])):
	$this->Html->addCrumb($service['Service']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Service'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Service'), array(
		'action' => 'edit',
		$service['Service']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Service'), array(
		'action' => 'delete', $service['Service']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $service['Service']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Services'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Service Fields'), array('controller' => 'service_fields', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service Field'), array('controller' => 'service_fields', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Servicelists'), array('controller' => 'servicelists', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Servicelist'), array('controller' => 'servicelists', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="services view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($service['Service']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($service['Service']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Order'); ?></dt>
		<dd>
			<?php echo h($service['Service']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($service['Service']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($service['Service']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>