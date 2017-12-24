<div class="bdUpozillas view">
<h2><?php echo __('Bd Upozilla'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['division_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['division_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUpozilla['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $bdUpozilla['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['district_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['district_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bdUpozilla['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $bdUpozilla['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upozilla Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozilla_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upozilla En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozilla_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upozillaid'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['upozillaid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Bn'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['union_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union En'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['union_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unionid'); ?></dt>
		<dd>
			<?php echo h($bdUpozilla['BdUpozilla']['unionid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bd Upozilla'), array('action' => 'edit', $bdUpozilla['BdUpozilla']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bd Upozilla'), array('action' => 'delete', $bdUpozilla['BdUpozilla']['id']), array(), __('Are you sure you want to delete # %s?', $bdUpozilla['BdUpozilla']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Upozillas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Upozilla'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
