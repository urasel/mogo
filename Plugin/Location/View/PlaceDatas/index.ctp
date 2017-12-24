<div class="placeDatas index">
	<h2><?php echo __('Place Datas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('topic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('short_description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($placeDatas as $placeData): ?>
	<tr>
		<td><?php echo h($placeData['PlaceData']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($placeData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $placeData['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($placeData['Topic']['id'], array('controller' => 'topics', 'action' => 'view', $placeData['Topic']['id'])); ?>
		</td>
		<td><?php echo h($placeData['PlaceData']['name']); ?>&nbsp;</td>
		<td><?php echo h($placeData['PlaceData']['short_description']); ?>&nbsp;</td>
		<td><?php echo h($placeData['PlaceData']['details']); ?>&nbsp;</td>
		<td><?php echo h($placeData['PlaceData']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($placeData['PlaceData']['metatag']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $placeData['PlaceData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $placeData['PlaceData']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $placeData['PlaceData']['id']), array(), __('Are you sure you want to delete # %s?', $placeData['PlaceData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Place Data'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>
