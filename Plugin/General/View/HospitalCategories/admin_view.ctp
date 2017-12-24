<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hospital Categories'), h($hospitalCategory['HospitalCategory']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hospital Categories'), array('action' => 'index'));

if (isset($hospitalCategory['HospitalCategory']['name'])):
	$this->Html->addCrumb($hospitalCategory['HospitalCategory']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hospital Category'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hospital Category'), array(
		'action' => 'edit',
		$hospitalCategory['HospitalCategory']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hospital Category'), array(
		'action' => 'delete', $hospitalCategory['HospitalCategory']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hospitalCategory['HospitalCategory']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospital Categories'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital Category'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hospitals'), array('controller' => 'hospitals', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hospital'), array('controller' => 'hospitals', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hospitalCategories view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Star'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['star']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>