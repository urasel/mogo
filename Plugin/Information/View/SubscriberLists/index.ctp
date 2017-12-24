<div class="subscriberLists index">
	<h2><?php echo __('Subscriber Lists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('sex_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dob'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($subscriberLists as $subscriberList): ?>
	<tr>
		<td><?php echo h($subscriberList['SubscriberList']['id']); ?>&nbsp;</td>
		<td><?php echo h($subscriberList['SubscriberList']['name']); ?>&nbsp;</td>
		<td><?php echo h($subscriberList['SubscriberList']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subscriberList['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $subscriberList['Sex']['id'])); ?>
		</td>
		<td><?php echo h($subscriberList['SubscriberList']['dob']); ?>&nbsp;</td>
		<td><?php echo h($subscriberList['SubscriberList']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($subscriberList['SubscriberList']['created']); ?>&nbsp;</td>
		<td><?php echo h($subscriberList['SubscriberList']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subscriberList['SubscriberList']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subscriberList['SubscriberList']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subscriberList['SubscriberList']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $subscriberList['SubscriberList']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Subscriber List'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
	</ul>
</div>
