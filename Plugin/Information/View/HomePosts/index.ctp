<div class="homePosts index">
	<h2><?php echo __('Home Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('home_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pointid'); ?></th>
			<th><?php echo $this->Paginator->sort('point_seoname'); ?></th>
			<th><?php echo $this->Paginator->sort('classid'); ?></th>
			<th><?php echo $this->Paginator->sort('class_bntitle'); ?></th>
			<th><?php echo $this->Paginator->sort('class_title'); ?></th>
			<th><?php echo $this->Paginator->sort('class_metatag'); ?></th>
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
	<?php foreach ($homePosts as $homePost): ?>
	<tr>
		<td><?php echo h($homePost['HomePost']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($homePost['HomeCategory']['title'], array('controller' => 'home_categories', 'action' => 'view', $homePost['HomeCategory']['id'])); ?>
		</td>
		<td><?php echo h($homePost['HomePost']['pointid']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['point_seoname']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['classid']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['class_bntitle']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['class_title']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['class_metatag']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['class_image']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['placetype_icon']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['placetype_pluralname']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['placetype_seoname']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['publishdate']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['unpublishdate']); ?>&nbsp;</td>
		<td><?php echo h($homePost['HomePost']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $homePost['HomePost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homePost['HomePost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $homePost['HomePost']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $homePost['HomePost']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Home Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Home Categories'), array('controller' => 'home_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Category'), array('controller' => 'home_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
