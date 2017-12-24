<div class="topics view">
<h2><?php echo __('Topic'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['User']['name'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['Point']['name'], array('controller' => 'points', 'action' => 'view', $topic['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Popular'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['popular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verifiedby'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['verifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reviewedby'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['reviewedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Topic'), array('action' => 'edit', $topic['Topic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Topic'), array('action' => 'delete', $topic['Topic']['id']), array(), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Data'), array('controller' => 'place_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Data'), array('controller' => 'place_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topic Data'), array('controller' => 'topic_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic Data'), array('controller' => 'topic_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Place Data'); ?></h3>
	<?php if (!empty($topic['PlaceData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Topic Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Short Description'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($topic['PlaceData'] as $placeData): ?>
		<tr>
			<td><?php echo $placeData['id']; ?></td>
			<td><?php echo $placeData['language_id']; ?></td>
			<td><?php echo $placeData['topic_id']; ?></td>
			<td><?php echo $placeData['name']; ?></td>
			<td><?php echo $placeData['short_description']; ?></td>
			<td><?php echo $placeData['details']; ?></td>
			<td><?php echo $placeData['keyword']; ?></td>
			<td><?php echo $placeData['metatag']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'place_data', 'action' => 'view', $placeData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'place_data', 'action' => 'edit', $placeData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'place_data', 'action' => 'delete', $placeData['id']), array(), __('Are you sure you want to delete # %s?', $placeData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Place Data'), array('controller' => 'place_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Topic Data'); ?></h3>
	<?php if (!empty($topic['TopicData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Topic Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Short Description'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($topic['TopicData'] as $topicData): ?>
		<tr>
			<td><?php echo $topicData['id']; ?></td>
			<td><?php echo $topicData['language_id']; ?></td>
			<td><?php echo $topicData['topic_id']; ?></td>
			<td><?php echo $topicData['name']; ?></td>
			<td><?php echo $topicData['short_description']; ?></td>
			<td><?php echo $topicData['details']; ?></td>
			<td><?php echo $topicData['keyword']; ?></td>
			<td><?php echo $topicData['metatag']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'topic_data', 'action' => 'view', $topicData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'topic_data', 'action' => 'edit', $topicData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'topic_data', 'action' => 'delete', $topicData['id']), array(), __('Are you sure you want to delete # %s?', $topicData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Topic Data'), array('controller' => 'topic_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
