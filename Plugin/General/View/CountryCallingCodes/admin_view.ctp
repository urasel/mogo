<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Calling Codes'), h($countryCallingCode['CountryCallingCode']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Calling Codes'), array('action' => 'index'));

if (isset($countryCallingCode['CountryCallingCode']['id'])):
	$this->Html->addCrumb($countryCallingCode['CountryCallingCode']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Calling Code'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Calling Code'), array(
		'action' => 'edit',
		$countryCallingCode['CountryCallingCode']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Calling Code'), array(
		'action' => 'delete', $countryCallingCode['CountryCallingCode']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryCallingCode['CountryCallingCode']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Calling Codes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Calling Code'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryCallingCodes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Calling Code'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['calling_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCallingCode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCallingCode['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Exit Prefix Idd'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['exit_prefix_idd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'National Prefix Ndd'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['national_prefix_ndd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($countryCallingCode['CountryCallingCode']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>