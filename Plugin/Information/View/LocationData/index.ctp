<div class="locationData index">
	<h2><?php echo __('Location Data'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('location_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('short_description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($locationData as $locationData): ?>
	<tr>
		<td><?php echo h($locationData['LocationData']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($locationData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $locationData['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($locationData['Location']['name'], array('controller' => 'locations', 'action' => 'view', $locationData['Location']['id'])); ?>
		</td>
		<td><?php echo h($locationData['LocationData']['name']); ?>&nbsp;</td>
		<td><?php echo h($locationData['LocationData']['short_description']); ?>&nbsp;</td>
		<td><?php echo h($locationData['LocationData']['details']); ?>&nbsp;</td>
		<td><?php echo h($locationData['LocationData']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($locationData['LocationData']['metatag']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $locationData['LocationData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $locationData['LocationData']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $locationData['LocationData']['id']), array(), __('Are you sure you want to delete # %s?', $locationData['LocationData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Location Data'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
