<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Siteactions'), h($siteaction['Siteaction']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Siteactions'), array('action' => 'index'));

if (isset($siteaction['Siteaction']['name'])):
	$this->Html->addCrumb($siteaction['Siteaction']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Siteaction'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Siteaction'), array(
		'action' => 'edit',
		$siteaction['Siteaction']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Siteaction'), array(
		'action' => 'delete', $siteaction['Siteaction']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $siteaction['Siteaction']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Siteactions'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Siteaction'), array('action' => 'add'), array('button' => 'success'));
$this->end();

$this->append('main');
?>
<div class="siteactions view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($siteaction['Siteaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($siteaction['Siteaction']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Action'); ?></dt>
		<dd>
			<?php echo h($siteaction['Siteaction']['action']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>