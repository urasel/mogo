<div class="countryTimezones index">
	<h2><?php echo __('Country Timezones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('utc'); ?></th>
			<th><?php echo $this->Paginator->sort('dst'); ?></th>
			<th><?php echo $this->Paginator->sort('dst_period_start_end'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countryTimezones as $countryTimezone): ?>
	<tr>
		<td><?php echo h($countryTimezone['CountryTimezone']['id']); ?>&nbsp;</td>
		<td><?php echo h($countryTimezone['CountryTimezone']['country']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryTimezone['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryTimezone['Country']['id'])); ?>
		</td>
		<td><?php echo h($countryTimezone['CountryTimezone']['utc']); ?>&nbsp;</td>
		<td><?php echo h($countryTimezone['CountryTimezone']['dst']); ?>&nbsp;</td>
		<td><?php echo h($countryTimezone['CountryTimezone']['dst_period_start_end']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $countryTimezone['CountryTimezone']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $countryTimezone['CountryTimezone']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $countryTimezone['CountryTimezone']['id']), array(), __('Are you sure you want to delete # %s?', $countryTimezone['CountryTimezone']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country Timezone'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
