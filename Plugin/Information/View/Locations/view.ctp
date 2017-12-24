<div class="locations view">
<h2><?php echo __('Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['Point']['name'], array('controller' => 'points', 'action' => 'view', $location['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $location['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['Country']['name'], array('controller' => 'countries', 'action' => 'view', $location['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area1'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area2'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area3'); ?></dt>
		<dd>
			<?php echo h($location['Location']['area3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population'); ?></dt>
		<dd>
			<?php echo h($location['Location']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($location['Location']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Northeast Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['northeast_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Northeast Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['northeast_lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Southwest Lat'); ?></dt>
		<dd>
			<?php echo h($location['Location']['southwest_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Southwest Lng'); ?></dt>
		<dd>
			<?php echo h($location['Location']['southwest_lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updateflag'); ?></dt>
		<dd>
			<?php echo h($location['Location']['updateflag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), array(), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Data'), array('controller' => 'location_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Data'), array('controller' => 'location_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Location Data'); ?></h3>
	<?php if (!empty($location['LocationData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Short Description'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($location['LocationData'] as $locationData): ?>
		<tr>
			<td><?php echo $locationData['id']; ?></td>
			<td><?php echo $locationData['language_id']; ?></td>
			<td><?php echo $locationData['location_id']; ?></td>
			<td><?php echo $locationData['name']; ?></td>
			<td><?php echo $locationData['short_description']; ?></td>
			<td><?php echo $locationData['details']; ?></td>
			<td><?php echo $locationData['keyword']; ?></td>
			<td><?php echo $locationData['metatag']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'location_data', 'action' => 'view', $locationData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'location_data', 'action' => 'edit', $locationData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'location_data', 'action' => 'delete', $locationData['id']), array(), __('Are you sure you want to delete # %s?', $locationData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Location Data'), array('controller' => 'location_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
