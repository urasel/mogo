<div class="countryCapitals index">
	<h2><?php echo __('Country Capitals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countryCapitals as $countryCapital): ?>
	<tr>
		<td><?php echo h($countryCapital['CountryCapital']['id']); ?>&nbsp;</td>
		<td><?php echo h($countryCapital['CountryCapital']['country']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryCapital['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCapital['Country']['id'])); ?>
		</td>
		<td><?php echo h($countryCapital['CountryCapital']['name']); ?>&nbsp;</td>
		<td><?php echo h($countryCapital['CountryCapital']['bn_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $countryCapital['CountryCapital']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $countryCapital['CountryCapital']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $countryCapital['CountryCapital']['id']), array(), __('Are you sure you want to delete # %s?', $countryCapital['CountryCapital']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country Capital'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
