<div class="institutes view">
<h2><?php echo __('Institute'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['User']['name'], array('controller' => 'users', 'action' => 'view', $institute['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['Point']['name'], array('controller' => 'points', 'action' => 'view', $institute['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institute['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $institute['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eiin No'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['eiin_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Office'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['post_office']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Web'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Founded'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['founded']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teaching Staff'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['teaching_staff']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hours'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['keyword']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Institute'), array('action' => 'edit', $institute['Institute']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Institute'), array('action' => 'delete', $institute['Institute']['id']), array(), __('Are you sure you want to delete # %s?', $institute['Institute']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
