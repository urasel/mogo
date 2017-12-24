<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Home Categories'), h($homeCategory['HomeCategory']['title']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Home Categories'), array('action' => 'index'));

if (isset($homeCategory['HomeCategory']['title'])):
	$this->Html->addCrumb($homeCategory['HomeCategory']['title'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Home Category'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Home Category'), array(
		'action' => 'edit',
		$homeCategory['HomeCategory']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Home Category'), array(
		'action' => 'delete', $homeCategory['HomeCategory']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $homeCategory['HomeCategory']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Home Categories'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Home Category'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Home Posts'), array('controller' => 'home_posts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Home Post'), array('controller' => 'home_posts', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="homeCategories view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Title'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['bn_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'IsActive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($homeCategory['HomeCategory']['isActive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>