<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Capitals'), h($countryCapital['CountryCapital']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Capitals'), array('action' => 'index'));

if (isset($countryCapital['CountryCapital']['name'])):
	$this->Html->addCrumb($countryCapital['CountryCapital']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country Capital'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country Capital'), array(
		'action' => 'edit',
		$countryCapital['CountryCapital']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country Capital'), array(
		'action' => 'delete', $countryCapital['CountryCapital']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryCapital['CountryCapital']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Capitals'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Capital'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryCapitals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCapital['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCapital['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>