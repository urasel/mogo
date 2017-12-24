<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Timezones'), h($countryTimezone['CountryTimezone']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Timezones'), array('action' => 'index'));

if (isset($countryTimezone['CountryTimezone']['id'])):
	$this->Html->addCrumb($countryTimezone['CountryTimezone']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Timezone'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Timezone'), array(
		'action' => 'edit',
		$countryTimezone['CountryTimezone']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Timezone'), array(
		'action' => 'delete', $countryTimezone['CountryTimezone']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryTimezone['CountryTimezone']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Timezones'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Timezone'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryTimezones view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryTimezone['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryTimezone['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Utc'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['utc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Dst'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['dst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Dst Period Start End'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['dst_period_start_end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>