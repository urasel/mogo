<div class="bdUnions index">
	<h2><?php echo __('Bd Unions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_division_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_thanas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bdUnions as $bdUnion): ?>
	<tr>
		<td><?php echo h($bdUnion['BdUnion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bdUnion['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUnion['BdDivision']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bdUnion['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUnion['BdDistrict']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bdUnion['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bdUnion['BdThanas']['id'])); ?>
		</td>
		<td><?php echo h($bdUnion['BdUnion']['name']); ?>&nbsp;</td>
		<td><?php echo h($bdUnion['BdUnion']['bn_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bdUnion['BdUnion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bdUnion['BdUnion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bdUnion['BdUnion']['id']), array(), __('Are you sure you want to delete # %s?', $bdUnion['BdUnion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bd Union'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
	</ul>
</div>
