<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Place Images'), h($placeImage['PlaceImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Place Images'), array('action' => 'index'));

if (isset($placeImage['PlaceImage']['id'])):
	$this->Html->addCrumb($placeImage['PlaceImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Place Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Place Image'), array(
		'action' => 'edit',
		$placeImage['PlaceImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Place Image'), array(
		'action' => 'delete', $placeImage['PlaceImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $placeImage['PlaceImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="placeImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $placeImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($placeImage['PlaceImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>