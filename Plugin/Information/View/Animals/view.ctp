<div class="animals view">
<h2><?php echo __('Animal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($animal['Point']['name'], array('controller' => 'points', 'action' => 'view', $animal['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($animal['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $animal['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kingdom'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['kingdom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Metatag'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Counters'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['counters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['family']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Species'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['species']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genus'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['genus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Replacetext'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['replacetext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified Scientific Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['modified_scientific_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scientific Name'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['scientific_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Details'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Authority'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['authority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Breeding Range'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['breeding_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nonbreeding Range'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['nonbreeding_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($animal['Animal']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Animal'), array('action' => 'edit', $animal['Animal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Animal'), array('action' => 'delete', $animal['Animal']['id']), array(), __('Are you sure you want to delete # %s?', $animal['Animal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Animals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
