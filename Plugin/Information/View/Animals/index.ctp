<div class="animals index">
	<h2><?php echo __('Animals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kingdom'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('counters'); ?></th>
			<th><?php echo $this->Paginator->sort('family'); ?></th>
			<th><?php echo $this->Paginator->sort('species'); ?></th>
			<th><?php echo $this->Paginator->sort('genus'); ?></th>
			<th><?php echo $this->Paginator->sort('replacetext'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_scientific_name'); ?></th>
			<th><?php echo $this->Paginator->sort('scientific_name'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_details'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('authority'); ?></th>
			<th><?php echo $this->Paginator->sort('breeding_range'); ?></th>
			<th><?php echo $this->Paginator->sort('nonbreeding_range'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($animals as $animal): ?>
	<tr>
		<td><?php echo h($animal['Animal']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($animal['Point']['name'], array('controller' => 'points', 'action' => 'view', $animal['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($animal['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $animal['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($animal['Animal']['kingdom']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['rank']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['name']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['bn_metatag']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['counters']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['family']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['species']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['genus']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['replacetext']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['modified_scientific_name']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['scientific_name']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['details']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['bn_details']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['image']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['authority']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['breeding_range']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['nonbreeding_range']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['code']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['comment']); ?>&nbsp;</td>
		<td><?php echo h($animal['Animal']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $animal['Animal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $animal['Animal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $animal['Animal']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $animal['Animal']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Animal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
