<div class="institutes index">
	<h2><?php echo __('Institutes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('level'); ?></th>
			<th><?php echo $this->Paginator->sort('eiin_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('post_office'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('founded'); ?></th>
			<th><?php echo $this->Paginator->sort('teaching_staff'); ?></th>
			<th><?php echo $this->Paginator->sort('hours'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($institutes as $institute): ?>
	<tr>
		<td><?php echo h($institute['Institute']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($institute['User']['name'], array('controller' => 'users', 'action' => 'view', $institute['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($institute['Point']['name'], array('controller' => 'points', 'action' => 'view', $institute['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($institute['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $institute['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($institute['Institute']['type']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['level']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['eiin_no']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['name']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['post_office']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['location']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['web']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['email']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['address']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['founded']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['teaching_staff']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['hours']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['lat']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['lng']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['metatag']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['keyword']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $institute['Institute']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $institute['Institute']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $institute['Institute']['id']), array(), __('Are you sure you want to delete # %s?', $institute['Institute']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Institute'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
