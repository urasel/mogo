<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Places'), h($place['Place']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Places'), array('action' => 'index'));

if (isset($place['Place']['name'])):
	$this->Html->addCrumb($place['Place']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Place'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Place'), array(
		'action' => 'edit',
		$place['Place']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Place'), array(
		'action' => 'delete', $place['Place']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $place['Place']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('controller' => 'zones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('controller' => 'zones', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="places view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($place['Place']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['User']['name'], array('controller' => 'users', 'action' => 'view', $place['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['Point']['name'], array('controller' => 'points', 'action' => 'view', $place['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($place['Place']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fax'); ?></dt>
		<dd>
			<?php echo h($place['Place']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($place['Place']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Web'); ?></dt>
		<dd>
			<?php echo h($place['Place']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($place['Place']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($place['Place']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bangla Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['bangla_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $place['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($place['Place']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['Country']['name'], array('controller' => 'countries', 'action' => 'view', $place['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $place['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $place['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $place['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Location'); ?></dt>
		<dd>
			<?php echo h($place['Place']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($place['Place']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Establish'); ?></dt>
		<dd>
			<?php echo h($place['Place']['establish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'History'); ?></dt>
		<dd>
			<?php echo h($place['Place']['history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Capacity'); ?></dt>
		<dd>
			<?php echo h($place['Place']['capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Holiday'); ?></dt>
		<dd>
			<?php echo h($place['Place']['holiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hours'); ?></dt>
		<dd>
			<?php echo h($place['Place']['hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($place['Place']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($place['Place']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo $this->Html->status($place['Place']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Popular'); ?></dt>
		<dd>
			<?php echo $this->Html->status($place['Place']['popular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Private'); ?></dt>
		<dd>
			<?php echo $this->Html->status($place['Place']['private']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($place['Place']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($place['Place']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo $this->Html->status($place['Place']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>