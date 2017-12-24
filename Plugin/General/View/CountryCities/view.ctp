<div class="countryCities view">
<h2><?php echo __('Country City'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countryCity['Country']['name'], array('controller' => 'countries', 'action' => 'view', $countryCity['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($countryCity['CountryCity']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country City'), array('action' => 'edit', $countryCity['CountryCity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country City'), array('action' => 'delete', $countryCity['CountryCity']['id']), array(), __('Are you sure you want to delete # %s?', $countryCity['CountryCity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Country Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
