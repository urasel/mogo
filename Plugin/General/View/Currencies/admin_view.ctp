<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Currencies'), h($currency['Currency']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Currencies'), array('action' => 'index'));

if (isset($currency['Currency']['name'])):
	$this->Html->addCrumb($currency['Currency']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Currency'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Currency'), array(
		'action' => 'edit',
		$currency['Currency']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Currency'), array(
		'action' => 'delete', $currency['Currency']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $currency['Currency']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Currencies'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Currency'), array('action' => 'add'), array('button' => 'success'));
$this->end();

$this->append('main');
?>
<div class="currencies view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Value'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($currency['Currency']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>