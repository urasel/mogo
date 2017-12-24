<div class="airportData index">
	<h2><?php echo __('Airport Data'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('airport_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('short_description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($airportData as $airportData): ?>
	<tr>
		<td><?php echo h($airportData['AirportData']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($airportData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $airportData['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($airportData['Airport']['name'], array('controller' => 'airports', 'action' => 'view', $airportData['Airport']['id'])); ?>
		</td>
		<td><?php echo h($airportData['AirportData']['name']); ?>&nbsp;</td>
		<td><?php echo h($airportData['AirportData']['short_description']); ?>&nbsp;</td>
		<td><?php echo h($airportData['AirportData']['details']); ?>&nbsp;</td>
		<td><?php echo h($airportData['AirportData']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($airportData['AirportData']['metatag']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $airportData['AirportData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $airportData['AirportData']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $airportData['AirportData']['id']), array(), __('Are you sure you want to delete # %s?', $airportData['AirportData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Airport Data'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Airports'), array('controller' => 'airports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport'), array('controller' => 'airports', 'action' => 'add')); ?> </li>
	</ul>
</div>
