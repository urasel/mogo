<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Country Cities'), h($countryCity['CountryCity']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Country Cities'), array('action' => 'index'));

if (isset($countryCity['CountryCity']['name'])):
	$this->Html->addCrumb($countryCity['CountryCity']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country City'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country City'), array(
		'action' => 'edit',
		$countryCity['CountryCity']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country City'), array(
		'action' => 'delete', $countryCity['CountryCity']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $countryCity['CountryCity']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Cities'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country City'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countryCities view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCity['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCity['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>