<div class="topics index">
	<h2><?php echo __('Topics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('popular'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('verifiedby'); ?></th>
			<th><?php echo $this->Paginator->sort('reviewedby'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($topics as $topic): ?>
	<tr>
		<td><?php echo h($topic['Topic']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($topic['User']['name'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($topic['Point']['name'], array('controller' => 'points', 'action' => 'view', $topic['Point']['id'])); ?>
		</td>
		<td><?php echo h($topic['Topic']['image']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['created']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['updated']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['popular']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['active']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['verifiedby']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['reviewedby']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $topic['Topic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topic['Topic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topic['Topic']['id']), array(), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Data'), array('controller' => 'place_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Data'), array('controller' => 'place_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topic Data'), array('controller' => 'topic_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic Data'), array('controller' => 'topic_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
