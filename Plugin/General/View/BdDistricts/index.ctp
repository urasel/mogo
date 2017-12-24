<div class="bdDistricts index">
	<h2><?php echo __('Bd Districts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bd_division_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bdDistricts as $bdDistrict): ?>
	<tr>
		<td><?php echo h($bdDistrict['BdDistrict']['id']); ?>&nbsp;</td>
		<td><?php echo h($bdDistrict['BdDistrict']['name']); ?>&nbsp;</td>
		<td><?php echo h($bdDistrict['BdDistrict']['bn_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bdDistrict['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdDistrict['BdDivision']['id'])); ?>
		</td>
		<td><?php echo h($bdDistrict['BdDistrict']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bdDistrict['BdDistrict']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bdDistrict['BdDistrict']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bdDistrict['BdDistrict']['id']), array(), __('Are you sure you want to delete # %s?', $bdDistrict['BdDistrict']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bd District'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thana'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Upozillas'), array('controller' => 'bd_upozillas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('controller' => 'bd_upozillas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Boothes'), array('controller' => 'boothes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Boothe'), array('controller' => 'boothes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holy Places'), array('controller' => 'holy_places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holy Place'), array('controller' => 'holy_places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Data'), array('controller' => 'service_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Data'), array('controller' => 'service_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
