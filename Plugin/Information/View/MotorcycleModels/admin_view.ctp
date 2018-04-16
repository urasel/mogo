<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Motorcycle Models'), h($motorcycleModel['MotorcycleModel']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Motorcycle Models'), array('action' => 'index'));

if (isset($motorcycleModel['MotorcycleModel']['name'])):
	$this->Html->addCrumb($motorcycleModel['MotorcycleModel']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Motorcycle Model'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Motorcycle Model'), array(
		'action' => 'edit',
		$motorcycleModel['MotorcycleModel']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Motorcycle Model'), array(
		'action' => 'delete', $motorcycleModel['MotorcycleModel']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $motorcycleModel['MotorcycleModel']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycle Models'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle Model'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="motorcycleModels view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($motorcycleModel['MotorcycleModel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycleModel['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycleModel['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($motorcycleModel['MotorcycleModel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($motorcycleModel['MotorcycleModel']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>