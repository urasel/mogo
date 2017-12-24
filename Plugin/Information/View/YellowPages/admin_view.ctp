<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Yellow Pages'), h($yellowPage['YellowPage']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Yellow Pages'), array('action' => 'index'));

if (isset($yellowPage['YellowPage']['name'])):
	$this->Html->addCrumb($yellowPage['YellowPage']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Yellow Page'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Yellow Page'), array(
		'action' => 'edit',
		$yellowPage['YellowPage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Yellow Page'), array(
		'action' => 'delete', $yellowPage['YellowPage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $yellowPage['YellowPage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Yellow Pages'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Yellow Page'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="yellowPages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['Country']['title'], array('controller' => 'countries', 'action' => 'view', $yellowPage['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['Point']['name'], array('controller' => 'points', 'action' => 'view', $yellowPage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $yellowPage['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Logo'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Parent'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Subparent'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['subparent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Address'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fax'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Person'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>