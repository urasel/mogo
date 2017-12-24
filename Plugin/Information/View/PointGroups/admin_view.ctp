<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Point Groups'), h($pointGroup['PointGroup']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Point Groups'), array('action' => 'index'));

if (isset($pointGroup['PointGroup']['name'])):
	$this->Html->addCrumb($pointGroup['PointGroup']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Point Group'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Point Group'), array(
		'action' => 'edit',
		$pointGroup['PointGroup']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Point Group'), array(
		'action' => 'delete', $pointGroup['PointGroup']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $pointGroup['PointGroup']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Point Groups'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point Group'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="pointGroups view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Parent'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pointGroup['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $pointGroup['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['seo_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>