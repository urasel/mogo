<div class="countryCallingCodes view">
<h2><?php echo __('Country Calling Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calling Code'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['calling_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCallingCode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCallingCode['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exit Prefix Idd'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['exit_prefix_idd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('National Prefix Ndd'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['national_prefix_ndd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($countryCallingCode['CountryCallingCode']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Calling Code'), array('action' => 'edit', $countryCallingCode['CountryCallingCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Calling Code'), array('action' => 'delete', $countryCallingCode['CountryCallingCode']['id']), array(), __('Are you sure you want to delete # %s?', $countryCallingCode['CountryCallingCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Calling Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Calling Code'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
