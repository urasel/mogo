<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Baby Names'), h($babyName['BabyName']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Baby Names'), array('action' => 'index'));

if (isset($babyName['BabyName']['name'])):
	$this->Html->addCrumb($babyName['BabyName']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Baby Name'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Baby Name'), array(
		'action' => 'edit',
		$babyName['BabyName']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Baby Name'), array(
		'action' => 'delete', $babyName['BabyName']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $babyName['BabyName']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Baby Names'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Baby Name'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Sexes'), array('controller' => 'sexes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Sex'), array('controller' => 'sexes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="babyNames view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babyName['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $babyName['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Arabic'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['arabic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Meaning'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['meaning']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babyName['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $babyName['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tags'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Origin'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Likes'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['likes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($babyName['BabyName']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($babyName['BabyName']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($babyName['BabyName']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>