<div class="placeDatas view">
<h2><?php echo __('Place Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeData['Language']['title'], array('controller' => 'languages', 'action' => 'view', $placeData['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeData['Topic']['id'], array('controller' => 'topics', 'action' => 'view', $placeData['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['short_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($placeData['PlaceData']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Data'), array('action' => 'edit', $placeData['PlaceData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Data'), array('action' => 'delete', $placeData['PlaceData']['id']), array(), __('Are you sure you want to delete # %s?', $placeData['PlaceData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Datas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>
