<div class="countryCallingCodes index">
	<h2><?php echo __('Country Calling Codes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('calling_code'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('exit_prefix_idd'); ?></th>
			<th><?php echo $this->Paginator->sort('national_prefix_ndd'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countryCallingCodes as $countryCallingCode): ?>
	<tr>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['id']); ?>&nbsp;</td>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['calling_code']); ?>&nbsp;</td>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['country']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryCallingCode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCallingCode['Country']['id'])); ?>
		</td>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['exit_prefix_idd']); ?>&nbsp;</td>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['national_prefix_ndd']); ?>&nbsp;</td>
		<td><?php echo h($countryCallingCode['CountryCallingCode']['isactive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $countryCallingCode['CountryCallingCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $countryCallingCode['CountryCallingCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $countryCallingCode['CountryCallingCode']['id']), array(), __('Are you sure you want to delete # %s?', $countryCallingCode['CountryCallingCode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country Calling Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
