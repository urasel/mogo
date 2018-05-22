<div class="motorcycleModels view">
<h2><?php echo __('Motorcycle Model'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($motorcycleModel['MotorcycleModel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycleModel['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycleModel['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($motorcycleModel['MotorcycleModel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($motorcycleModel['MotorcycleModel']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Motorcycle Model'), array('action' => 'edit', $motorcycleModel['MotorcycleModel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Motorcycle Model'), array('action' => 'delete', $motorcycleModel['MotorcycleModel']['id']), array(), __('Are you sure you want to delete # %s?', $motorcycleModel['MotorcycleModel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Models'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Model'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>