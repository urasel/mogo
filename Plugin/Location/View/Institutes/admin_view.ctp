<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Institutes'), h($institute['Institute']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Institutes'), array('action' => 'index'));

if (isset($institute['Institute']['name'])):
	$this->Html->addCrumb($institute['Institute']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Institute'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Institute'), array(
		'action' => 'edit',
		$institute['Institute']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Institute'), array(
		'action' => 'delete', $institute['Institute']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $institute['Institute']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Institutes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Institute'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="institutes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['User']['name'], array('controller' => 'users', 'action' => 'view', $institute['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['Point']['name'], array('controller' => 'points', 'action' => 'view', $institute['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $institute['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Type'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Level'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Eiin No'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['eiin_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Post Office'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['post_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Location'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Web'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Founded'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['founded']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Teaching Staff'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['teaching_staff']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hours'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['keyword']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>