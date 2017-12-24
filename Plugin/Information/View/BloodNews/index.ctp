<div class="bloodNews index">
	<h2><?php echo __('Blood News'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('blood_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('required_date'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bloodNews as $bloodNews): ?>
	<tr>
		<td><?php echo h($bloodNews['BloodNews']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodNews['BloodGroup']['name'], array('controller' => 'blood_groups', 'action' => 'view', $bloodNews['BloodGroup']['id'])); ?>
		</td>
		<td><?php echo h($bloodNews['BloodNews']['required_date']); ?>&nbsp;</td>
		<td><?php echo h($bloodNews['BloodNews']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($bloodNews['BloodNews']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($bloodNews['BloodNews']['created']); ?>&nbsp;</td>
		<td><?php echo h($bloodNews['BloodNews']['updated']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bloodNews['User']['name'], array('controller' => 'users', 'action' => 'view', $bloodNews['User']['id'])); ?>
		</td>
		<td><?php echo h($bloodNews['BloodNews']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bloodNews['BloodNews']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bloodNews['BloodNews']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bloodNews['BloodNews']['id']), array(), __('Are you sure you want to delete # %s?', $bloodNews['BloodNews']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Blood News'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blood Groups'), array('controller' => 'blood_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Group'), array('controller' => 'blood_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
