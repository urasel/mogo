<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Airport Types'), h($airportType['AirportType']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Airport Types'), array('action' => 'index'));

if (isset($airportType['AirportType']['name'])):
	$this->Html->addCrumb($airportType['AirportType']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Airport Type'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Airport Type'), array(
		'action' => 'edit',
		$airportType['AirportType']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Airport Type'), array(
		'action' => 'delete', $airportType['AirportType']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $airportType['AirportType']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Airport Types'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport Type'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Airports'), array('controller' => 'country_airports', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Airport'), array('controller' => 'country_airports', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="airportTypes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($airportType['AirportType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($airportType['AirportType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($airportType['AirportType']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>