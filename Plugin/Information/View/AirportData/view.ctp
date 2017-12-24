<div class="airportData view">
<h2><?php echo __('Airport Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $airportData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Airport'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airportData['Airport']['name'], array('controller' => 'airports', 'action' => 'view', $airportData['Airport']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($airportData['AirportData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Airport Data'), array('action' => 'edit', $airportData['AirportData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Airport Data'), array('action' => 'delete', $airportData['AirportData']['id']), array(), __('Are you sure you want to delete # %s?', $airportData['AirportData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Airport Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Airports'), array('controller' => 'airports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airport'), array('controller' => 'airports', 'action' => 'add')); ?> </li>
	</ul>
</div>
