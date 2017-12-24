<div class="yellowPages view">
<h2><?php echo __('Yellow Page'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['Country']['title'], array('controller' => 'countries', 'action' => 'view', $yellowPage['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['Point']['name'], array('controller' => 'points', 'action' => 'view', $yellowPage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($yellowPage['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $yellowPage['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subparent'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['subparent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Address'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['bn_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Person'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($yellowPage['YellowPage']['details']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Yellow Page'), array('action' => 'edit', $yellowPage['YellowPage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Yellow Page'), array('action' => 'delete', $yellowPage['YellowPage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $yellowPage['YellowPage']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Yellow Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yellow Page'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
