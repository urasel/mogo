<div class="placeImages index">
	<h2><?php echo __('Place Images'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('file'); ?></th>
			<th><?php echo $this->Paginator->sort('position'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($placeImages as $placeImage): ?>
	<tr>
		<td><?php echo h($placeImage['PlaceImage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($placeImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $placeImage['Point']['id'])); ?>
		</td>
		<td><?php echo h($placeImage['PlaceImage']['file']); ?>&nbsp;</td>
		<td><?php echo h($placeImage['PlaceImage']['position']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $placeImage['PlaceImage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $placeImage['PlaceImage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $placeImage['PlaceImage']['id']), array(), __('Are you sure you want to delete # %s?', $placeImage['PlaceImage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Place Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
