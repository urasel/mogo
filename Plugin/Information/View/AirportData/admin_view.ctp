<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Airport Data'), h($airportData['AirportData']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Airport Data'), array('action' => 'index'));

if (isset($airportData['AirportData']['name'])):
	$this->Html->addCrumb($airportData['AirportData']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Airport Data'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Airport Data'), array(
		'action' => 'edit',
		$airportData['AirportData']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Airport Data'), array(
		'action' => 'delete', $airportData['AirportData']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $airportData['AirportData']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Airport Data'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport Data'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Airports'), array('controller' => 'airports', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport'), array('controller' => 'airports', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="airportData view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $airportData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Airport'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportData['Airport']['name'], array('controller' => 'airports', 'action' => 'view', $airportData['Airport']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Description'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>