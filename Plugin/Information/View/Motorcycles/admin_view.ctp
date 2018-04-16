<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Motorcycles'), h($motorcycle['Motorcycle']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Motorcycles'), array('action' => 'index'));

if (isset($motorcycle['Motorcycle']['name'])):
	$this->Html->addCrumb($motorcycle['Motorcycle']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Motorcycle'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Motorcycle'), array(
		'action' => 'edit',
		$motorcycle['Motorcycle']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Motorcycle'), array(
		'action' => 'delete', $motorcycle['Motorcycle']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $motorcycle['Motorcycle']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycles'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycle Images'), array('controller' => 'motorcycle_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle Image'), array('controller' => 'motorcycle_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycle Prices'), array('controller' => 'motorcycle_prices', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle Price'), array('controller' => 'motorcycle_prices', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycle Specifications'), array('controller' => 'motorcycle_specifications', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle Specification'), array('controller' => 'motorcycle_specifications', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="motorcycles view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycle['Point']['name'], array('controller' => 'points', 'action' => 'view', $motorcycle['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycle['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycle['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['engine']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Maximum Power'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['maximum_power']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Maximum Torque'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['maximum_torque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Top Speed'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['top_speed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mileage'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['mileage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Curb Weight'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['curb_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Remarks'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($motorcycle['Motorcycle']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($motorcycle['Motorcycle']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($motorcycle['Motorcycle']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>