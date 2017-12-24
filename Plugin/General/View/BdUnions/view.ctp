<div class="bdUnions view">
<h2><?php echo __('Bd Union'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUnion['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUnion['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUnion['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $bdUnion['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bdUnion['BdUnion']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bd Union'), array('action' => 'edit', $bdUnion['BdUnion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bd Union'), array('action' => 'delete', $bdUnion['BdUnion']['id']), array(), __('Are you sure you want to delete # %s?', $bdUnion['BdUnion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Unions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Union'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
	</ul>
</div>
