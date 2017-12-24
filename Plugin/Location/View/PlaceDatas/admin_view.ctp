<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Place Datas'), h($placeData['PlaceData']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Place Datas'), array('action' => 'index'));

if (isset($placeData['PlaceData']['name'])):
	$this->Html->addCrumb($placeData['PlaceData']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Place Data'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Place Data'), array(
		'action' => 'edit',
		$placeData['PlaceData']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Place Data'), array(
		'action' => 'delete', $placeData['PlaceData']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $placeData['PlaceData']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Datas'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Data'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Languages'), array('controller' => 'languages', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Language'), array('controller' => 'languages', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Topics'), array('controller' => 'topics', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Topic'), array('controller' => 'topics', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="placeDatas view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $placeData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeData['Topic']['id'], array('controller' => 'topics', 'action' => 'view', $placeData['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Short Description'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keyword'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>