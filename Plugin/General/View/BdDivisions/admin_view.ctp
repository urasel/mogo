<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bd Divisions'), h($bdDivision['BdDivision']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bd Divisions'), array('action' => 'index'));

if (isset($bdDivision['BdDivision']['name'])):
	$this->Html->addCrumb($bdDivision['BdDivision']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Bd Division'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Bd Division'), array(
		'action' => 'edit',
		$bdDivision['BdDivision']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Bd Division'), array(
		'action' => 'delete', $bdDivision['BdDivision']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bdDivision['BdDivision']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Upozillas'), array('controller' => 'bd_upozillas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Service Data'), array('controller' => 'service_data', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Service Data'), array('controller' => 'service_data', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bdDivisions view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdDivision['BdDivision']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($bdDivision['BdDivision']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>