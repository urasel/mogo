<div class="countryCapitals view">
<h2><?php echo __('Country Capital'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCapital['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCapital['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCapital['CountryCapital']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country Capital'), array('action' => 'edit', $countryCapital['CountryCapital']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country Capital'), array('action' => 'delete', $countryCapital['CountryCapital']['id']), array(), __('Are you sure you want to delete # %s?', $countryCapital['CountryCapital']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Capitals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country Capital'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
