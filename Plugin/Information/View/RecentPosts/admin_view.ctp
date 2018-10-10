<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recent Posts'), h($recentPost['RecentPost']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recent Posts'), array('action' => 'index'));

if (isset($recentPost['RecentPost']['id'])):
	$this->Html->addCrumb($recentPost['RecentPost']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Recent Post'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Recent Post'), array(
		'action' => 'edit',
		$recentPost['RecentPost']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Recent Post'), array(
		'action' => 'delete', $recentPost['RecentPost']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $recentPost['RecentPost']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Recent Posts'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recent Post'), array('action' => 'add'), array('button' => 'success'));
$this->end();

$this->append('main');
?>
<div class="recentPosts view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pointid'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['pointid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pointname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['pointname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pointcreated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($recentPost['RecentPost']['pointcreated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point Seoname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['point_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Classid'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['classid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Bntitle'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_bntitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Title'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Metatag'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Bn Details'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Details'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Image'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Icon'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Pluralname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Seoname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Publishdate'); ?></dt>
		<dd>
			<?php echo $this->Time->format($recentPost['RecentPost']['publishdate'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Unpublishdate'); ?></dt>
		<dd>
			<?php echo $this->Time->format($recentPost['RecentPost']['unpublishdate'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($recentPost['RecentPost']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>