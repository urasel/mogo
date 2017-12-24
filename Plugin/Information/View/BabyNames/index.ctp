<div class="babyNames index">
	<h2><?php echo __('Baby Names'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('arabic'); ?></th>
			<th><?php echo $this->Paginator->sort('meaning'); ?></th>
			<th><?php echo $this->Paginator->sort('sex_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tags'); ?></th>
			<th><?php echo $this->Paginator->sort('origin'); ?></th>
			<th><?php echo $this->Paginator->sort('likes'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($babyNames as $babyName): ?>
	<tr>
		<td><?php echo h($babyName['BabyName']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($babyName['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $babyName['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($babyName['BabyName']['name']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['arabic']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['meaning']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($babyName['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $babyName['Sex']['id'])); ?>
		</td>
		<td><?php echo h($babyName['BabyName']['tags']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['origin']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['likes']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['created']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['updated']); ?>&nbsp;</td>
		<td><?php echo h($babyName['BabyName']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $babyName['BabyName']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $babyName['BabyName']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $babyName['BabyName']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $babyName['BabyName']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Baby Name'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
	</ul>
</div>
