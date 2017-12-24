<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Facilities'), h($hotelFacility['HotelFacility']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Facilities'), array('action' => 'index'));

if (isset($hotelFacility['HotelFacility']['name'])):
	$this->Html->addCrumb($hotelFacility['HotelFacility']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Facility'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Facility'), array(
		'action' => 'edit',
		$hotelFacility['HotelFacility']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Facility'), array(
		'action' => 'delete', $hotelFacility['HotelFacility']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelFacility['HotelFacility']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Facilities'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Facility'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Details'), array('controller' => 'hotel_details', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelFacilities view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelFacility['HotelFacility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hotelFacility['HotelFacility']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>