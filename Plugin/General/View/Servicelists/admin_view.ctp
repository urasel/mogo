<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Servicelists'), h($servicelist['Servicelist']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Servicelists'), array('action' => 'index'));

if (isset($servicelist['Servicelist']['name'])):
	$this->Html->addCrumb($servicelist['Servicelist']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Servicelist'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Servicelist'), array(
		'action' => 'edit',
		$servicelist['Servicelist']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Servicelist'), array(
		'action' => 'delete', $servicelist['Servicelist']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $servicelist['Servicelist']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Servicelists'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Servicelist'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Services'), array('controller' => 'services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service'), array('controller' => 'services', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Service Fields'), array('controller' => 'service_fields', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service Field'), array('controller' => 'service_fields', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="servicelists view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($servicelist['Service']['name'], array('controller' => 'services', 'action' => 'view', $servicelist['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Order'); ?></dt>
		<dd>
			<?php echo h($servicelist['Servicelist']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($servicelist['Servicelist']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($servicelist['Servicelist']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>