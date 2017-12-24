<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Home Posts'), h($homePost['HomePost']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Home Posts'), array('action' => 'index'));

if (isset($homePost['HomePost']['id'])):
	$this->Html->addCrumb($homePost['HomePost']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Home Post'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Home Post'), array(
		'action' => 'edit',
		$homePost['HomePost']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Home Post'), array(
		'action' => 'delete', $homePost['HomePost']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $homePost['HomePost']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Home Posts'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Home Post'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Home Categories'), array('controller' => 'home_categories', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Home Category'), array('controller' => 'home_categories', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="homePosts view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Home Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($homePost['HomeCategory']['title'], array('controller' => 'home_categories', 'action' => 'view', $homePost['HomeCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pointid'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['pointid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point Seoname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['point_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Classid'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['classid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Bntitle'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_bntitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Title'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Metatag'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Class Image'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Icon'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Pluralname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Placetype Seoname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Publishdate'); ?></dt>
		<dd>
			<?php echo $this->Time->format($homePost['HomePost']['publishdate'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Unpublishdate'); ?></dt>
		<dd>
			<?php echo $this->Time->format($homePost['HomePost']['unpublishdate'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($homePost['HomePost']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>