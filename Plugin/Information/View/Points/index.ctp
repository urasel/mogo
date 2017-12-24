<div class="points index">
	<h2><?php echo __('Points'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zone_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_thanas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('map'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('private'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($points as $point): ?>
	<tr>
		<td><?php echo h($point['Point']['id']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['name']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['seo_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($point['Country']['name'], array('controller' => 'countries', 'action' => 'view', $point['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($point['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $point['Zone']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($point['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $point['BdDistrict']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($point['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $point['BdThanas']['id'])); ?>
		</td>
		<td><?php echo h($point['Point']['location']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['address']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['icon']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['image']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['map']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($point['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $point['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($point['Point']['contact']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['email']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['lat']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['lng']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['private']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['active']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['created']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $point['Point']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $point['Point']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $point['Point']['id']), array(), __('Are you sure you want to delete # %s?', $point['Point']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Point'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Images'), array('controller' => 'doctor_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Image'), array('controller' => 'doctor_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospital Images'), array('controller' => 'hospital_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital Image'), array('controller' => 'hospital_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospitals'), array('controller' => 'hospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institute Images'), array('controller' => 'institute_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute Image'), array('controller' => 'institute_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Images'), array('controller' => 'place_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Image'), array('controller' => 'place_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>
