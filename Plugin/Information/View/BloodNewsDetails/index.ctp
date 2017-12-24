<div class="bloodNewsDetails index">
	<h2><?php echo __('Blood News Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('blood_news_id'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bloodNewsDetails as $bloodNewsDetail): ?>
	<tr>
		<td><?php echo h($bloodNewsDetail['BloodNewsDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodNewsDetail['Language']['title'], array('controller' => 'languages', 'action' => 'view', $bloodNewsDetail['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bloodNewsDetail['BloodNews']['id'], array('controller' => 'blood_news', 'action' => 'view', $bloodNewsDetail['BloodNews']['id'])); ?>
		</td>
		<td><?php echo h($bloodNewsDetail['BloodNewsDetail']['details']); ?>&nbsp;</td>
		<td><?php echo h($bloodNewsDetail['BloodNewsDetail']['address']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bloodNewsDetail['BloodNewsDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bloodNewsDetail['BloodNewsDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bloodNewsDetail['BloodNewsDetail']['id']), array(), __('Are you sure you want to delete # %s?', $bloodNewsDetail['BloodNewsDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Blood News Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood News'), array('controller' => 'blood_news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood News'), array('controller' => 'blood_news', 'action' => 'add')); ?> </li>
	</ul>
</div>
