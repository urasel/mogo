<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bd Districts'), h($bdDistrict['BdDistrict']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bd Districts'), array('action' => 'index'));

if (isset($bdDistrict['BdDistrict']['name'])):
	$this->Html->addCrumb($bdDistrict['BdDistrict']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Bd District'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Bd District'), array(
		'action' => 'edit',
		$bdDistrict['BdDistrict']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Bd District'), array(
		'action' => 'delete', $bdDistrict['BdDistrict']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bdDistrict['BdDistrict']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thana'), array('controller' => 'bd_thanas', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Upozillas'), array('controller' => 'bd_upozillas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Boothes'), array('controller' => 'boothes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Boothe'), array('controller' => 'boothes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Holy Places'), array('controller' => 'holy_places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Holy Place'), array('controller' => 'holy_places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Schools'), array('controller' => 'schools', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New School'), array('controller' => 'schools', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Service Data'), array('controller' => 'service_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service Data'), array('controller' => 'service_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bdDistricts view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdDistrict['BdDistrict']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdDistrict['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdDistrict['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($bdDistrict['BdDistrict']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>