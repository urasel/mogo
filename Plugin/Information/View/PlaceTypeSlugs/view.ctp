<div class="placeTypeSlugs view">
<h2><?php echo __('Place Type Slug'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeTypeSlug['PlaceTypeSlug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeTypeSlug['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $placeTypeSlug['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($placeTypeSlug['PlaceTypeSlug']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($placeTypeSlug['PlaceTypeSlug']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Type Slug'), array('action' => 'edit', $placeTypeSlug['PlaceTypeSlug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Type Slug'), array('action' => 'delete', $placeTypeSlug['PlaceTypeSlug']['id']), array(), __('Are you sure you want to delete # %s?', $placeTypeSlug['PlaceTypeSlug']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Type Slugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type Slug'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
