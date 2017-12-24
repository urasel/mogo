<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bd Unions'), h($bdUnion['BdUnion']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bd Unions'), array('action' => 'index'));

if (isset($bdUnion['BdUnion']['name'])):
	$this->Html->addCrumb($bdUnion['BdUnion']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Bd Union'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Bd Union'), array(
		'action' => 'edit',
		$bdUnion['BdUnion']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Bd Union'), array(
		'action' => 'delete', $bdUnion['BdUnion']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bdUnion['BdUnion']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Unions'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Union'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bdUnions view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUnion['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUnion['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bdUnion['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>