<div class="postcodes index">
	<h2><?php echo __('Postcodes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('divisions'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_division_id'); ?></th>
			<th><?php echo $this->Paginator->sort('districts'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('thanas'); ?></th>
			<th><?php echo $this->Paginator->sort('newthanas'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_thanas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('post_code'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($postcodes as $postcode): ?>
	<tr>
		<td><?php echo h($postcode['Postcode']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($postcode['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $postcode['PlaceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($postcode['Point']['name'], array('controller' => 'points', 'action' => 'view', $postcode['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($postcode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $postcode['Country']['id'])); ?>
		</td>
		<td><?php echo h($postcode['Postcode']['divisions']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($postcode['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $postcode['BdDivision']['id'])); ?>
		</td>
		<td><?php echo h($postcode['Postcode']['districts']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($postcode['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $postcode['BdDistrict']['id'])); ?>
		</td>
		<td><?php echo h($postcode['Postcode']['thanas']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['newthanas']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($postcode['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $postcode['BdThanas']['id'])); ?>
		</td>
		<td><?php echo h($postcode['Postcode']['name']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['title']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['post_code']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['address']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['lat']); ?>&nbsp;</td>
		<td><?php echo h($postcode['Postcode']['lng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $postcode['Postcode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $postcode['Postcode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $postcode['Postcode']['id']), array(), __('Are you sure you want to delete # %s?', $postcode['Postcode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Postcode'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
	</ul>
</div>
