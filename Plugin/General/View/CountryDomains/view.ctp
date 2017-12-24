<div class="countryDomains view">
<h2><?php echo __('Country Domain'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($countryDomain['CountryDomain']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryDomain['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryDomain['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Domain'), array('action' => 'edit', $countryDomain['CountryDomain']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Domain'), array('action' => 'delete', $countryDomain['CountryDomain']['id']), array(), __('Are you sure you want to delete # %s?', $countryDomain['CountryDomain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Domains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Domain'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
