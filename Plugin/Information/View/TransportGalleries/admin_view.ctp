<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Galleries'), h($transportGallery['TransportGallery']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Galleries'), array('action' => 'index'));

if (isset($transportGallery['TransportGallery']['id'])):
	$this->Html->addCrumb($transportGallery['TransportGallery']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Gallery'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Gallery'), array(
		'action' => 'edit',
		$transportGallery['TransportGallery']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Gallery'), array(
		'action' => 'delete', $transportGallery['TransportGallery']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportGallery['TransportGallery']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Galleries'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Gallery'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Routes'), array('controller' => 'transport_routes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route'), array('controller' => 'transport_routes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportGalleries view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportGallery['TransportRoute']['id'], array('controller' => 'transport_routes', 'action' => 'view', $transportGallery['TransportRoute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($transportGallery['TransportGallery']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($transportGallery['TransportGallery']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>