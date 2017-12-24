<div class="countryTimezones view">
<h2><?php echo __('Country Timezone'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryTimezone['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryTimezone['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utc'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['utc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dst'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['dst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dst Period Start End'); ?></dt>
		<dd>
			<?php echo h($countryTimezone['CountryTimezone']['dst_period_start_end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Timezone'), array('action' => 'edit', $countryTimezone['CountryTimezone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Timezone'), array('action' => 'delete', $countryTimezone['CountryTimezone']['id']), array(), __('Are you sure you want to delete # %s?', $countryTimezone['CountryTimezone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Timezones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Timezone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
