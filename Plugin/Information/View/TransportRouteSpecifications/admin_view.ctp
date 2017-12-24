<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Transport Route Specifications'), h($transportRouteSpecification['TransportRouteSpecification']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Transport Route Specifications'), array('action' => 'index'));

if (isset($transportRouteSpecification['TransportRouteSpecification']['name'])):
	$this->Html->addCrumb($transportRouteSpecification['TransportRouteSpecification']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Transport Route Specification'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Transport Route Specification'), array(
		'action' => 'edit',
		$transportRouteSpecification['TransportRouteSpecification']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Transport Route Specification'), array(
		'action' => 'delete', $transportRouteSpecification['TransportRouteSpecification']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $transportRouteSpecification['TransportRouteSpecification']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Route Specifications'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Route Specification'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Types'), array('controller' => 'transport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Type'), array('controller' => 'transport_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Transport Services'), array('controller' => 'transport_services', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Transport Service'), array('controller' => 'transport_services', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="transportRouteSpecifications view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportRouteSpecification['TransportType']['name'], array('controller' => 'transport_types', 'action' => 'view', $transportRouteSpecification['TransportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($transportRouteSpecification['TransportRouteSpecification']['seo_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>