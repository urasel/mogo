<div class="hospitals index">
	<h2><?php echo __('Hospitals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('hospital_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('speciality'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('hours'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($hospitals as $hospital): ?>
	<tr>
		<td><?php echo h($hospital['Hospital']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hospital['Point']['name'], array('controller' => 'points', 'action' => 'view', $hospital['Point']['id'])); ?>
		</td>
		<td><?php echo h($hospital['Hospital']['name']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['seo_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hospital['HospitalCategory']['name'], array('controller' => 'hospital_categories', 'action' => 'view', $hospital['HospitalCategory']['id'])); ?>
		</td>
		<td><?php echo h($hospital['Hospital']['speciality']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['details']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['hours']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['address']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['email']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['web']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['fax']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['phone']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['image']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['created']); ?>&nbsp;</td>
		<td><?php echo h($hospital['Hospital']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hospital['Hospital']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hospital['Hospital']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hospital['Hospital']['id']), array(), __('Are you sure you want to delete # %s?', $hospital['Hospital']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hospital'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospital Categories'), array('controller' => 'hospital_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital Category'), array('controller' => 'hospital_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
