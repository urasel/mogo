<div class="updateInformations view">
<h2><?php echo __('Update Information'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Itemid'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['itemid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($updateInformation['User']['name'], array('controller' => 'users', 'action' => 'view', $updateInformation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classname'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['classname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feedback'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['feedback']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verifiedby'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['verifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($updateInformation['UpdateInformation']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Update Information'), array('action' => 'edit', $updateInformation['UpdateInformation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Update Information'), array('action' => 'delete', $updateInformation['UpdateInformation']['id']), array(), __('Are you sure you want to delete # %s?', $updateInformation['UpdateInformation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Update Informations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Update Information'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
