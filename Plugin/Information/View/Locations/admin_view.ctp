<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Locations'), h($location['Location']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Locations'), array('action' => 'index'));

if (isset($location['Location']['name'])):
	$this->Html->addCrumb($location['Location']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Location'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Location'), array(
		'action' => 'edit',
		$location['Location']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Location'), array(
		'action' => 'delete', $location['Location']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $location['Location']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Locations'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Location'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Location Data'), array('controller' => 'location_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Location Data'), array('controller' => 'location_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="locations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['Point']['name'], array('controller' => 'points', 'action' => 'view', $location['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $location['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['Country']['name'], array('controller' => 'countries', 'action' => 'view', $location['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Area1'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Area2'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Area3'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Population'); ?></dt>
		<dd>
			<?php echo h($location['Location']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($location['Location']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Northeast Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['northeast_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Northeast Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['northeast_lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Southwest Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['southwest_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Southwest Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['southwest_lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updateflag'); ?></dt>
		<dd>
			<?php echo $this->Html->status($location['Location']['updateflag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>