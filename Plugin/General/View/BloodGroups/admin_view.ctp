<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Blood Groups'), h($bloodGroup['BloodGroup']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Blood Groups'), array('action' => 'index'));

if (isset($bloodGroup['BloodGroup']['name'])):
	$this->Html->addCrumb($bloodGroup['BloodGroup']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Blood Group'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Blood Group'), array(
		'action' => 'edit',
		$bloodGroup['BloodGroup']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Blood Group'), array(
		'action' => 'delete', $bloodGroup['BloodGroup']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $bloodGroup['BloodGroup']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood Groups'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood Group'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Blood News'), array('controller' => 'blood_news', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Blood News'), array('controller' => 'blood_news', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="bloodGroups view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>