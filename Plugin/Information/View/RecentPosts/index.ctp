<div class="recentPosts index">
	<h2><?php echo __('Recent Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pointid'); ?></th>
			<th><?php echo $this->Paginator->sort('pointname'); ?></th>
			<th><?php echo $this->Paginator->sort('pointcreated'); ?></th>
			<th><?php echo $this->Paginator->sort('point_seoname'); ?></th>
			<th><?php echo $this->Paginator->sort('classid'); ?></th>
			<th><?php echo $this->Paginator->sort('class_bntitle'); ?></th>
			<th><?php echo $this->Paginator->sort('class_title'); ?></th>
			<th><?php echo $this->Paginator->sort('class_metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('class_bn_details'); ?></th>
			<th><?php echo $this->Paginator->sort('class_details'); ?></th>
			<th><?php echo $this->Paginator->sort('class_image'); ?></th>
			<th><?php echo $this->Paginator->sort('placetype_icon'); ?></th>
			<th><?php echo $this->Paginator->sort('placetype_pluralname'); ?></th>
			<th><?php echo $this->Paginator->sort('placetype_seoname'); ?></th>
			<th><?php echo $this->Paginator->sort('publishdate'); ?></th>
			<th><?php echo $this->Paginator->sort('unpublishdate'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($recentPosts as $recentPost): ?>
	<tr>
		<td><?php echo h($recentPost['RecentPost']['id']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['pointid']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['pointname']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['pointcreated']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['point_seoname']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['classid']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_bntitle']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_title']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_metatag']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_bn_details']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_details']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['class_image']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['placetype_icon']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['placetype_pluralname']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['placetype_seoname']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['publishdate']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['unpublishdate']); ?>&nbsp;</td>
		<td><?php echo h($recentPost['RecentPost']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recentPost['RecentPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recentPost['RecentPost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recentPost['RecentPost']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $recentPost['RecentPost']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Recent Post'), array('action' => 'add')); ?></li>
	</ul>
</div>
