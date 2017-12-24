<div class="yellowPages index">
	<h2><?php echo __('Yellow Pages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th><?php echo $this->Paginator->sort('parent'); ?></th>
			<th><?php echo $this->Paginator->sort('subparent'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_person'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($yellowPages as $yellowPage): ?>
	<tr>
		<td><?php echo h($yellowPage['YellowPage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($yellowPage['Country']['title'], array('controller' => 'countries', 'action' => 'view', $yellowPage['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($yellowPage['Point']['name'], array('controller' => 'points', 'action' => 'view', $yellowPage['Point']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($yellowPage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $yellowPage['PlaceType']['id'])); ?>
		</td>
		<td><?php echo h($yellowPage['YellowPage']['logo']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['parent']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['subparent']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['name']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['address']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['bn_address']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['phone']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['fax']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['email']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['contact_person']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['website']); ?>&nbsp;</td>
		<td><?php echo h($yellowPage['YellowPage']['details']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $yellowPage['YellowPage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $yellowPage['YellowPage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $yellowPage['YellowPage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $yellowPage['YellowPage']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Yellow Page'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
