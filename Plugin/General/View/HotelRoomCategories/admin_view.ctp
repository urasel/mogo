<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Room Categories'), h($hotelRoomCategory['HotelRoomCategory']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Room Categories'), array('action' => 'index'));

if (isset($hotelRoomCategory['HotelRoomCategory']['name'])):
	$this->Html->addCrumb($hotelRoomCategory['HotelRoomCategory']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Room Category'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Room Category'), array(
		'action' => 'edit',
		$hotelRoomCategory['HotelRoomCategory']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Room Category'), array(
		'action' => 'delete', $hotelRoomCategory['HotelRoomCategory']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelRoomCategory['HotelRoomCategory']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Room Categories'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Room Category'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Rooms'), array('controller' => 'hotel_rooms', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Room'), array('controller' => 'hotel_rooms', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelRoomCategories view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelRoomCategory['HotelRoomCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hotelRoomCategory['HotelRoomCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>