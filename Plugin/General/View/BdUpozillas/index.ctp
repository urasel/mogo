<div class="bdUpozillas index">
	<h2><?php echo __('Bd Upozillas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('division_bn'); ?></th>
			<th><?php echo $this->Paginator->sort('division_en'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_division_id'); ?></th>
			<th><?php echo $this->Paginator->sort('district_bn'); ?></th>
			<th><?php echo $this->Paginator->sort('district_en'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('upozilla_bn'); ?></th>
			<th><?php echo $this->Paginator->sort('upozilla_en'); ?></th>
			<th><?php echo $this->Paginator->sort('upozillaid'); ?></th>
			<th><?php echo $this->Paginator->sort('union_bn'); ?></th>
			<th><?php echo $this->Paginator->sort('union_en'); ?></th>
			<th><?php echo $this->Paginator->sort('unionid'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bdUpozillas as $bdUpozilla): ?>
	<tr>
		<td><?php echo h($bdUpozilla['BdUpozilla']['id']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['division_bn']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['division_en']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bdUpozilla['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUpozilla['BdDivision']['id'])); ?>
		</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['district_bn']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['district_en']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bdUpozilla['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUpozilla['BdDistrict']['id'])); ?>
		</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['upozilla_bn']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['upozilla_en']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['upozillaid']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['union_bn']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['union_en']); ?>&nbsp;</td>
		<td><?php echo h($bdUpozilla['BdUpozilla']['unionid']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bdUpozilla['BdUpozilla']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bdUpozilla['BdUpozilla']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bdUpozilla['BdUpozilla']['id']), array(), __('Are you sure you want to delete # %s?', $bdUpozilla['BdUpozilla']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
