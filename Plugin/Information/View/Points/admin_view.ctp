<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Points'), h($point['Point']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Points'), array('action' => 'index'));

if (isset($point['Point']['name'])):
	$this->Html->addCrumb($point['Point']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Point'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Point'), array(
		'action' => 'edit',
		$point['Point']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Point'), array(
		'action' => 'delete', $point['Point']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $point['Point']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('controller' => 'zones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('controller' => 'zones', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctor Images'), array('controller' => 'doctor_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor Image'), array('controller' => 'doctor_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospital Images'), array('controller' => 'hospital_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital Image'), array('controller' => 'hospital_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospitals'), array('controller' => 'hospitals', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital'), array('controller' => 'hospitals', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Institute Images'), array('controller' => 'institute_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Institute Image'), array('controller' => 'institute_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Institutes'), array('controller' => 'institutes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Institute'), array('controller' => 'institutes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Images'), array('controller' => 'place_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Image'), array('controller' => 'place_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Tags'), array('controller' => 'tags', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Tag'), array('controller' => 'tags', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Topics'), array('controller' => 'topics', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic'), array('controller' => 'topics', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="points view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($point['Point']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['Country']['name'], array('controller' => 'countries', 'action' => 'view', $point['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $point['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $point['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $point['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Location'); ?></dt>
		<dd>
			<?php echo h($point['Point']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($point['Point']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Icon'); ?></dt>
		<dd>
			<?php echo h($point['Point']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($point['Point']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Map'); ?></dt>
		<dd>
			<?php echo h($point['Point']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $point['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact'); ?></dt>
		<dd>
			<?php echo h($point['Point']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($point['Point']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($point['Point']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($point['Point']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Private'); ?></dt>
		<dd>
			<?php echo $this->Html->status($point['Point']['private']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo $this->Html->status($point['Point']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($point['Point']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($point['Point']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>