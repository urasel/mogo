<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Session Tables'), h($sessionTable['SessionTable']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Session Tables'), array('action' => 'index'));

if (isset($sessionTable['SessionTable']['id'])):
	$this->Html->addCrumb($sessionTable['SessionTable']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Session Table'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Session Table'), array(
		'action' => 'edit',
		$sessionTable['SessionTable']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Session Table'), array(
		'action' => 'delete', $sessionTable['SessionTable']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $sessionTable['SessionTable']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Session Tables'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Session Table'), array('action' => 'add'), array('button' => 'success'));
$this->end();

$this->append('main');
?>
<div class="sessionTables view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Useragent'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['useragent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'SessionName'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['sessionName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Userip'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['userip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Clickcount'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['clickcount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($sessionTable['SessionTable']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($sessionTable['SessionTable']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>