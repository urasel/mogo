<div class="hospitalCategories index">
	<h2><?php echo __('Hospital Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('star'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($hospitalCategories as $hospitalCategory): ?>
	<tr>
		<td><?php echo h($hospitalCategory['HospitalCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($hospitalCategory['HospitalCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($hospitalCategory['HospitalCategory']['star']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hospitalCategory['HospitalCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hospitalCategory['HospitalCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hospitalCategory['HospitalCategory']['id']), array(), __('Are you sure you want to delete # %s?', $hospitalCategory['HospitalCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hospital Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hospitals'), array('controller' => 'hospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
	</ul>
</div>
