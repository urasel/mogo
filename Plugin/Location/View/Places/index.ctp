<div class="places index">
	<h2><?php echo __('Places'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('bangla_name'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zone_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_thanas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('establish'); ?></th>
			<th><?php echo $this->Paginator->sort('history'); ?></th>
			<th><?php echo $this->Paginator->sort('capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('holiday'); ?></th>
			<th><?php echo $this->Paginator->sort('hours'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('popular'); ?></th>
			<th><?php echo $this->Paginator->sort('private'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($place['User']['name'], array('controller' => 'users', 'action' => 'view', $place['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($place['Point']['name'], array('controller' => 'points', 'action' => 'view', $place['Point']['id'])); ?>
		</td>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['fax']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['email']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['web']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['bangla_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($place['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $place['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($place['Place']['image']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($place['Country']['name'], array('controller' => 'countries', 'action' => 'view', $place['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($place['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $place['Zone']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($place['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $place['BdDistrict']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($place['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $place['BdThanas']['id'])); ?>
		</td>
		<td><?php echo h($place['Place']['address']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['location']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['details']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['establish']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['history']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['capacity']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['holiday']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['hours']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['lat']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['lng']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['status']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['popular']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['private']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['created']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['updated']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $place['Place']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $place['Place']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $place['Place']['id']), array(), __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
	</ul>
</div>
