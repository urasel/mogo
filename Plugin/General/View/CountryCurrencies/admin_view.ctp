<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Currencies'), h($countryCurrency['CountryCurrency']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Currencies'), array('action' => 'index'));

if (isset($countryCurrency['CountryCurrency']['name'])):
	$this->Html->addCrumb($countryCurrency['CountryCurrency']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Currency'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Currency'), array(
		'action' => 'edit',
		$countryCurrency['CountryCurrency']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Currency'), array(
		'action' => 'delete', $countryCurrency['CountryCurrency']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryCurrency['CountryCurrency']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Currencies'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Currency'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryCurrencies view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCurrency['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCurrency['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Iso 4217'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['iso_4217']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>