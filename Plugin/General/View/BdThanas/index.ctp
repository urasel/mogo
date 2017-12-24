<div class="bdThanas index">
	<h2><?php echo __('Bd Thanas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bdThanas as $bdThana): ?>
	<tr>
		<td><?php echo h($bdThana['BdThana']['id']); ?>&nbsp;</td>
		<td><?php echo h($bdThana['BdThana']['name']); ?>&nbsp;</td>
		<td><?php echo h($bdThana['BdThana']['bn_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bdThana['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdThana['BdDistrict']['id'])); ?>
		</td>
		<td><?php echo h($bdThana['BdThana']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bdThana['BdThana']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bdThana['BdThana']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bdThana['BdThana']['id']), array(), __('Are you sure you want to delete # %s?', $bdThana['BdThana']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bd Thana'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Data'), array('controller' => 'service_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
