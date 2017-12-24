<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Place Types'), h($placeType['PlaceType']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Place Types'), array('action' => 'index'));

if (isset($placeType['PlaceType']['name'])):
	$this->Html->addCrumb($placeType['PlaceType']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Place Type'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Place Type'), array(
		'action' => 'edit',
		$placeType['PlaceType']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Place Type'), array(
		'action' => 'delete', $placeType['PlaceType']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $placeType['PlaceType']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Institutes'), array('controller' => 'institutes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Institute'), array('controller' => 'institutes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Quiz Questions'), array('controller' => 'quiz_questions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Quiz Question'), array('controller' => 'quiz_questions', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="placeTypes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Parentid'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['parentid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Codeblock'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['codeblock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Singlename'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['singlename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pluralname'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Icon'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Type Image'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['type_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Groupname'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['groupname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Order'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Topcat'); ?></dt>
		<dd>
			<?php echo $this->Html->status($placeType['PlaceType']['topcat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($placeType['PlaceType']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>