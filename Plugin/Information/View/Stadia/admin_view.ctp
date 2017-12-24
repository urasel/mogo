<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Stadia'), h($stadium['Stadium']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Stadia'), array('action' => 'index'));

if (isset($stadium['Stadium']['name'])):
	$this->Html->addCrumb($stadium['Stadium']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Stadium'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Stadium'), array(
		'action' => 'edit',
		$stadium['Stadium']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Stadium'), array(
		'action' => 'delete', $stadium['Stadium']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $stadium['Stadium']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Stadia'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Stadium'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Stadium Data'), array('controller' => 'stadium_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Stadium Data'), array('controller' => 'stadium_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="stadia view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['Point']['name'], array('controller' => 'points', 'action' => 'view', $stadium['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $stadium['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['Country']['name'], array('controller' => 'countries', 'action' => 'view', $stadium['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tenant Or Use'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['tenant_or_use']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'City'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Capacity'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Builton'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['builton']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seats'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Web'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($stadium['Stadium']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>