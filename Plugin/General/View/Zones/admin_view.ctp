<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Zones'), h($zone['Zone']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Zones'), array('action' => 'index'));

if (isset($zone['Zone']['name'])):
	$this->Html->addCrumb($zone['Zone']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Zone'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Zone'), array(
		'action' => 'edit',
		$zone['Zone']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Zone'), array(
		'action' => 'delete', $zone['Zone']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $zone['Zone']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Boothes'), array('controller' => 'boothes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Boothe'), array('controller' => 'boothes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Holy Places'), array('controller' => 'holy_places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Holy Place'), array('controller' => 'holy_places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('controller' => 'hotels', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('controller' => 'hotels', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Schools'), array('controller' => 'schools', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New School'), array('controller' => 'schools', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="zones view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($zone['Country']['name'], array('controller' => 'countries', 'action' => 'view', $zone['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Code'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo $this->Html->status($zone['Zone']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>