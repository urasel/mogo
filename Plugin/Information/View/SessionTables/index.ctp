<div class="sessionTables index">
	<h2><?php echo __('Session Tables'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('useragent'); ?></th>
			<th><?php echo $this->Paginator->sort('sessionName'); ?></th>
			<th><?php echo $this->Paginator->sort('userip'); ?></th>
			<th><?php echo $this->Paginator->sort('clickcount'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sessionTables as $sessionTable): ?>
	<tr>
		<td><?php echo h($sessionTable['SessionTable']['id']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['useragent']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['sessionName']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['userip']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['clickcount']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['created']); ?>&nbsp;</td>
		<td><?php echo h($sessionTable['SessionTable']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sessionTable['SessionTable']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sessionTable['SessionTable']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sessionTable['SessionTable']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sessionTable['SessionTable']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Session Table'), array('action' => 'add')); ?></li>
	</ul>
</div>
