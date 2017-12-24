<div class="pointGroups view">
<h2><?php echo __('Point Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pointGroup['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $pointGroup['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($pointGroup['PointGroup']['seo_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Point Group'), array('action' => 'edit', $pointGroup['PointGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Point Group'), array('action' => 'delete', $pointGroup['PointGroup']['id']), array(), __('Are you sure you want to delete # %s?', $pointGroup['PointGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Point Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
