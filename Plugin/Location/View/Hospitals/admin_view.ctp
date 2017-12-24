<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hospitals'), h($hospital['Hospital']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hospitals'), array('action' => 'index'));

if (isset($hospital['Hospital']['name'])):
	$this->Html->addCrumb($hospital['Hospital']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hospital'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hospital'), array(
		'action' => 'edit',
		$hospital['Hospital']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hospital'), array(
		'action' => 'delete', $hospital['Hospital']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hospital['Hospital']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospitals'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospital Categories'), array('controller' => 'hospital_categories', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital Category'), array('controller' => 'hospital_categories', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Doctors'), array('controller' => 'doctors', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Doctor'), array('controller' => 'doctors', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hospitals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hospital['Point']['name'], array('controller' => 'points', 'action' => 'view', $hospital['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hospital Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hospital['HospitalCategory']['name'], array('controller' => 'hospital_categories', 'action' => 'view', $hospital['HospitalCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Speciality'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['speciality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hours'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Web'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fax'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($hospital['Hospital']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($hospital['Hospital']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($hospital['Hospital']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>