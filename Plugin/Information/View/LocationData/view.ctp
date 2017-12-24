<div class="locationData view">
<h2><?php echo __('Location Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $locationData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($locationData['Location']['name'], array('controller' => 'locations', 'action' => 'view', $locationData['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($locationData['LocationData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location Data'), array('action' => 'edit', $locationData['LocationData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location Data'), array('action' => 'delete', $locationData['LocationData']['id']), array(), __('Are you sure you want to delete # %s?', $locationData['LocationData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Location Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
