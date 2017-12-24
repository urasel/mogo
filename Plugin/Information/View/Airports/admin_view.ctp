<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Airports'), h($airport['Airport']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Airports'), array('action' => 'index'));

if (isset($airport['Airport']['name'])):
	$this->Html->addCrumb($airport['Airport']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Airport'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Airport'), array(
		'action' => 'edit',
		$airport['Airport']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Airport'), array(
		'action' => 'delete', $airport['Airport']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $airport['Airport']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Airports'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Airport Types'), array('controller' => 'airport_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Airport Type'), array('controller' => 'airport_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Continents'), array('controller' => 'continents', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Continent'), array('controller' => 'continents', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="airports view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Ident'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['ident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Point']['name'], array('controller' => 'points', 'action' => 'view', $airport['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $airport['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Airport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['AirportType']['name'], array('controller' => 'airport_types', 'action' => 'view', $airport['AirportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Elevation Ft'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['elevation_ft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Continent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $airport['Continent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Country']['name'], array('controller' => 'countries', 'action' => 'view', $airport['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Iso Region'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['iso_region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Municipality'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['municipality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Scheduled Service'); ?></dt>
		<dd>
			<?php echo $this->Html->status($airport['Airport']['scheduled_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Gps Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['gps_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Iata Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['iata_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Local Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['local_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Web'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mobile'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Metatag'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Keywords'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($airport['Airport']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>