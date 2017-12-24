<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bd Upozillas'), h($bdUpozilla['BdUpozilla']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bd Upozillas'), array('action' => 'index'));

if (isset($bdUpozilla['BdUpozilla']['id'])):
	$this->Html->addCrumb($bdUpozilla['BdUpozilla']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Bd Upozilla'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Bd Upozilla'), array(
		'action' => 'edit',
		$bdUpozilla['BdUpozilla']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Bd Upozilla'), array(
		'action' => 'delete', $bdUpozilla['BdUpozilla']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bdUpozilla['BdUpozilla']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Upozillas'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Upozilla'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bdUpozillas view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Division Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['division_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Division En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['division_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUpozilla['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUpozilla['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'District Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['district_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'District En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['district_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUpozilla['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUpozilla['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Upozilla Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozilla_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Upozilla En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozilla_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Upozillaid'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozillaid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Union Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['union_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Union En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['union_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Unionid'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['unionid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>