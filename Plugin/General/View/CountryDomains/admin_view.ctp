<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Domains'), h($countryDomain['CountryDomain']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Domains'), array('action' => 'index'));

if (isset($countryDomain['CountryDomain']['name'])):
	$this->Html->addCrumb($countryDomain['CountryDomain']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Domain'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Domain'), array(
		'action' => 'edit',
		$countryDomain['CountryDomain']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Domain'), array(
		'action' => 'delete', $countryDomain['CountryDomain']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryDomain['CountryDomain']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Domains'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Domain'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryDomains view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDomain['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryDomain['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>