<div class="stadiumData view">
<h2><?php echo __('Stadium Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $stadiumData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stadium'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumData['Stadium']['name'], array('controller' => 'stadia', 'action' => 'view', $stadiumData['Stadium']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($stadiumData['StadiumData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stadium Data'), array('action' => 'edit', $stadiumData['StadiumData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stadium Data'), array('action' => 'delete', $stadiumData['StadiumData']['id']), array(), __('Are you sure you want to delete # %s?', $stadiumData['StadiumData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadium Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadia'), array('controller' => 'stadia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium'), array('controller' => 'stadia', 'action' => 'add')); ?> </li>
	</ul>
</div>
