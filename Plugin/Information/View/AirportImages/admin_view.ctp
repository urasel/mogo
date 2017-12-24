<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Airport Images'), h($airportImage['AirportImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Airport Images'), array('action' => 'index'));

if (isset($airportImage['AirportImage']['id'])):
	$this->Html->addCrumb($airportImage['AirportImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Airport Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Airport Image'), array(
		'action' => 'edit',
		$airportImage['AirportImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Airport Image'), array(
		'action' => 'delete', $airportImage['AirportImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $airportImage['AirportImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Airport Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="airportImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $airportImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($airportImage['AirportImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>