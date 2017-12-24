<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Location Data'), h($locationData['LocationData']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Location Data'), array('action' => 'index'));

if (isset($locationData['LocationData']['name'])):
	$this->Html->addCrumb($locationData['LocationData']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Location Data'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Location Data'), array(
		'action' => 'edit',
		$locationData['LocationData']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Location Data'), array(
		'action' => 'delete', $locationData['LocationData']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $locationData['LocationData']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Location Data'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Location Data'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Locations'), array('controller' => 'locations', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Location'), array('controller' => 'locations', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="locationData view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $locationData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationData['Location']['name'], array('controller' => 'locations', 'action' => 'view', $locationData['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Description'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>