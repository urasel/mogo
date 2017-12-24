<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Rooms'), h($hotelRoom['HotelRoom']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Rooms'), array('action' => 'index'));

if (isset($hotelRoom['HotelRoom']['id'])):
	$this->Html->addCrumb($hotelRoom['HotelRoom']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Room'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Room'), array(
		'action' => 'edit',
		$hotelRoom['HotelRoom']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Room'), array(
		'action' => 'delete', $hotelRoom['HotelRoom']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelRoom['HotelRoom']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Rooms'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Room'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('controller' => 'hotels', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('controller' => 'hotels', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Room Categories'), array('controller' => 'hotel_room_categories', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Room Category'), array('controller' => 'hotel_room_categories', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelRooms view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRoom['Hotel']['name'], array('controller' => 'hotels', 'action' => 'view', $hotelRoom['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hotel Room Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRoom['HotelRoomCategory']['name'], array('controller' => 'hotel_room_categories', 'action' => 'view', $hotelRoom['HotelRoomCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Room Size'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['room_size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bed'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['bed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hotel Views'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['hotel_views']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Room Features'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['room_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Rules Conditions'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['rules_conditions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Offers'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['offers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Price'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Number'); ?></dt>
		<dd>
			<?php echo h($hotelRoom['HotelRoom']['number']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>