<div class="stadia index">
	<h2><?php echo __('Stadia'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tenant_or_use'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('builton'); ?></th>
			<th><?php echo $this->Paginator->sort('seats'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stadia as $stadium): ?>
	<tr>
		<td><?php echo h($stadium['Stadium']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stadium['Point']['name'], array('controller' => 'points', 'action' => 'view', $stadium['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stadium['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $stadium['PlaceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stadium['Country']['name'], array('controller' => 'countries', 'action' => 'view', $stadium['Country']['id'])); ?>
		</td>
		<td><?php echo h($stadium['Stadium']['tenant_or_use']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['city']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['name']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['capacity']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['builton']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['seats']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['lat']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['lng']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['address']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['web']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['email']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['image']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($stadium['Stadium']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stadium['Stadium']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stadium['Stadium']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stadium['Stadium']['id']), array(), __('Are you sure you want to delete # %s?', $stadium['Stadium']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Stadium'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadium Data'), array('controller' => 'stadium_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium Data'), array('controller' => 'stadium_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
