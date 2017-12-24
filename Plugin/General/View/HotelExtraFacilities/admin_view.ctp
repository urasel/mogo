<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Extra Facilities'), h($hotelExtraFacility['HotelExtraFacility']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Extra Facilities'), array('action' => 'index'));

if (isset($hotelExtraFacility['HotelExtraFacility']['name'])):
	$this->Html->addCrumb($hotelExtraFacility['HotelExtraFacility']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Extra Facility'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Extra Facility'), array(
		'action' => 'edit',
		$hotelExtraFacility['HotelExtraFacility']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Extra Facility'), array(
		'action' => 'delete', $hotelExtraFacility['HotelExtraFacility']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelExtraFacility['HotelExtraFacility']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Extra Facilities'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Extra Facility'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Details'), array('controller' => 'hotel_details', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelExtraFacilities view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelExtraFacility['HotelExtraFacility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hotelExtraFacility['HotelExtraFacility']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>