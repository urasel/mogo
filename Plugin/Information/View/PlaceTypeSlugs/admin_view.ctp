<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Place Type Slugs'), h($placeTypeSlug['PlaceTypeSlug']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Place Type Slugs'), array('action' => 'index'));

if (isset($placeTypeSlug['PlaceTypeSlug']['id'])):
	$this->Html->addCrumb($placeTypeSlug['PlaceTypeSlug']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Place Type Slug'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Place Type Slug'), array(
		'action' => 'edit',
		$placeTypeSlug['PlaceTypeSlug']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Place Type Slug'), array(
		'action' => 'delete', $placeTypeSlug['PlaceTypeSlug']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $placeTypeSlug['PlaceTypeSlug']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Type Slugs'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type Slug'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="placeTypeSlugs view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($placeTypeSlug['PlaceTypeSlug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeTypeSlug['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $placeTypeSlug['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Slug'); ?></dt>
		<dd>
			<?php echo h($placeTypeSlug['PlaceTypeSlug']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($placeTypeSlug['PlaceTypeSlug']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>