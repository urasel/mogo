<div class="countryCurrencies view">
<h2><?php echo __('Country Currency'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCurrency['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCurrency['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso 4217'); ?></dt>
		<dd>
			<?php echo h($countryCurrency['CountryCurrency']['iso_4217']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Currency'), array('action' => 'edit', $countryCurrency['CountryCurrency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Currency'), array('action' => 'delete', $countryCurrency['CountryCurrency']['id']), array(), __('Are you sure you want to delete # %s?', $countryCurrency['CountryCurrency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Currencies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Currency'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
