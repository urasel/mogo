<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bd Thanas'), h($bdThana['BdThana']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bd Thanas'), array('action' => 'index'));

if (isset($bdThana['BdThana']['name'])):
	$this->Html->addCrumb($bdThana['BdThana']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Bd Thana'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Bd Thana'), array(
		'action' => 'edit',
		$bdThana['BdThana']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Bd Thana'), array(
		'action' => 'delete', $bdThana['BdThana']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bdThana['BdThana']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thana'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Service Data'), array('controller' => 'service_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service Data'), array('controller' => 'service_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bdThanas view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdThana['BdThana']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdThana['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdThana['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($bdThana['BdThana']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>