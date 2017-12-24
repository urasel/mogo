<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Animals'), h($animal['Animal']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Animals'), array('action' => 'index'));

if (isset($animal['Animal']['name'])):
	$this->Html->addCrumb($animal['Animal']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Animal'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Animal'), array(
		'action' => 'edit',
		$animal['Animal']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Animal'), array(
		'action' => 'delete', $animal['Animal']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $animal['Animal']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Animals'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Animal'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="animals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($animal['Point']['name'], array('controller' => 'points', 'action' => 'view', $animal['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($animal['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $animal['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kingdom'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['kingdom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Rank'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Metatag'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Counters'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['counters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Family'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['family']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Species'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['species']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Genus'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['genus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Replacetext'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['replacetext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Modified Scientific Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['modified_scientific_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Scientific Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['scientific_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Details'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Authority'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['authority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Breeding Range'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['breeding_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Nonbreeding Range'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['nonbreeding_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Code'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comment'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($animal['Animal']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>