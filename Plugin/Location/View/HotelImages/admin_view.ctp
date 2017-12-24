<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Images'), h($hotelImage['HotelImage']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Images'), array('action' => 'index'));

if (isset($hotelImage['HotelImage']['id'])):
	$this->Html->addCrumb($hotelImage['HotelImage']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Image'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Image'), array(
		'action' => 'edit',
		$hotelImage['HotelImage']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Image'), array(
		'action' => 'delete', $hotelImage['HotelImage']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelImage['HotelImage']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Images'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Image'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('controller' => 'hotels', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('controller' => 'hotels', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelImages view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelImage['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $hotelImage['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'File'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Location'); ?></dt>
		<dd>
			<?php echo h($hotelImage['HotelImage']['location']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>