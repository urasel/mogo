<div class="placeTypes index">
	<h2><?php echo __('Place Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parentid'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('codeblock'); ?></th>
			<th><?php echo $this->Paginator->sort('singlename'); ?></th>
			<th><?php echo $this->Paginator->sort('pluralname'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th><?php echo $this->Paginator->sort('type_image'); ?></th>
			<th><?php echo $this->Paginator->sort('groupname'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('topcat'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($placeTypes as $placeType): ?>
	<tr>
		<td><?php echo h($placeType['PlaceType']['id']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['parentid']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['name']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['seo_name']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['codeblock']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['singlename']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['pluralname']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['icon']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['type_image']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['groupname']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['order']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['topcat']); ?>&nbsp;</td>
		<td><?php echo h($placeType['PlaceType']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $placeType['PlaceType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $placeType['PlaceType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $placeType['PlaceType']['id']), array(), __('Are you sure you want to delete # %s?', $placeType['PlaceType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Place Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Questions'), array('controller' => 'quiz_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Question'), array('controller' => 'quiz_questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
