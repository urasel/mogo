<div class="countryCurrencies index">
	<h2><?php echo __('Country Currencies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('bn_name'); ?></th>
			<th><?php echo $this->Paginator->sort('iso_4217'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($countryCurrencies as $countryCurrency): ?>
	<tr>
		<td><?php echo h($countryCurrency['CountryCurrency']['id']); ?>&nbsp;</td>
		<td><?php echo h($countryCurrency['CountryCurrency']['country']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($countryCurrency['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCurrency['Country']['id'])); ?>
		</td>
		<td><?php echo h($countryCurrency['CountryCurrency']['name']); ?>&nbsp;</td>
		<td><?php echo h($countryCurrency['CountryCurrency']['bn_name']); ?>&nbsp;</td>
		<td><?php echo h($countryCurrency['CountryCurrency']['iso_4217']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $countryCurrency['CountryCurrency']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $countryCurrency['CountryCurrency']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $countryCurrency['CountryCurrency']['id']), array(), __('Are you sure you want to delete # %s?', $countryCurrency['CountryCurrency']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country Currency'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
