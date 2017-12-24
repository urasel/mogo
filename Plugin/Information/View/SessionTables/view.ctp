<div class="sessionTables view">
<h2><?php echo __('Session Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Useragent'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['useragent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SessionName'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['sessionName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userip'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['userip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clickcount'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['clickcount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($sessionTable['SessionTable']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Session Table'), array('action' => 'edit', $sessionTable['SessionTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Session Table'), array('action' => 'delete', $sessionTable['SessionTable']['id']), array(), __('Are you sure you want to delete # %s?', $sessionTable['SessionTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Session Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Session Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
