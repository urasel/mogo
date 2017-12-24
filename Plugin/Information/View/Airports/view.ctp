<div class="airports view">
<h2><?php echo __('Airport'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ident'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['ident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Point']['name'], array('controller' => 'points', 'action' => 'view', $airport['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $airport['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Airport Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['AirportType']['name'], array('controller' => 'airport_types', 'action' => 'view', $airport['AirportType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elevation Ft'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['elevation_ft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Continent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $airport['Continent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airport['Country']['name'], array('controller' => 'countries', 'action' => 'view', $airport['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso Region'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['iso_region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Municipality'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['municipality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scheduled Service'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['scheduled_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['gps_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iata Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['iata_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local Code'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['local_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Web'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keywords'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($airport['Airport']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Airport'), array('action' => 'edit', $airport['Airport']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Airport'), array('action' => 'delete', $airport['Airport']['id']), array(), __('Are you sure you want to delete # %s?', $airport['Airport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Airports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Airport Types'), array('controller' => 'airport_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport Type'), array('controller' => 'airport_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Continents'), array('controller' => 'continents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Continent'), array('controller' => 'continents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
