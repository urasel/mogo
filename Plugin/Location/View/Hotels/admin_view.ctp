<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotels'), h($hotel['Hotel']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotels'), array('action' => 'index'));

if (isset($hotel['Hotel']['name'])):
	$this->Html->addCrumb($hotel['Hotel']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel'), array(
		'action' => 'edit',
		$hotel['Hotel']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel'), array(
		'action' => 'delete', $hotel['Hotel']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotel['Hotel']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Categories'), array('controller' => 'hotel_categories', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Category'), array('controller' => 'hotel_categories', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('controller' => 'zones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('controller' => 'zones', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Details'), array('controller' => 'hotel_details', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Detail'), array('controller' => 'hotel_details', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Images'), array('controller' => 'hotel_images', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Image'), array('controller' => 'hotel_images', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Rooms'), array('controller' => 'hotel_rooms', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Room'), array('controller' => 'hotel_rooms', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotels view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Hotel Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['HotelCategory']['name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'City'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Country']['name'], array('controller' => 'countries', 'action' => 'view', $hotel['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $hotel['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Postcode'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Facilities'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['facilities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Extrafacilities'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['extrafacilities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Facilitydata'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['facilitydata']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Extrafacilitydata'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['extrafacilitydata']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Maplocation'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['maplocation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Policies'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['policies']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Check In From'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_in_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Check Out Until'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_out_until']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Distance From City'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['distance_from_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Number Of Floor'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['number_of_floor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Number Of Restaurant'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['number_of_restaurant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Total Rooms'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['total_rooms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Build Year'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['build_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['lng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>