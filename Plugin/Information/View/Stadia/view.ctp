<div class="stadia view">
<h2><?php echo __('Stadium'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['Point']['name'], array('controller' => 'points', 'action' => 'view', $stadium['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $stadium['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadium['Country']['name'], array('controller' => 'countries', 'action' => 'view', $stadium['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tenant Or Use'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['tenant_or_use']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Capacity'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Builton'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['builton']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seats'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Web'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($stadium['Stadium']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stadium'), array('action' => 'edit', $stadium['Stadium']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stadium'), array('action' => 'delete', $stadium['Stadium']['id']), array(), __('Are you sure you want to delete # %s?', $stadium['Stadium']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadia'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadium Data'), array('controller' => 'stadium_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium Data'), array('controller' => 'stadium_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stadium Data'); ?></h3>
	<?php if (!empty($stadium['StadiumData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Stadium Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Short Description'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stadium['StadiumData'] as $stadiumData): ?>
		<tr>
			<td><?php echo $stadiumData['id']; ?></td>
			<td><?php echo $stadiumData['language_id']; ?></td>
			<td><?php echo $stadiumData['stadium_id']; ?></td>
			<td><?php echo $stadiumData['name']; ?></td>
			<td><?php echo $stadiumData['short_description']; ?></td>
			<td><?php echo $stadiumData['details']; ?></td>
			<td><?php echo $stadiumData['keyword']; ?></td>
			<td><?php echo $stadiumData['metatag']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stadium_data', 'action' => 'view', $stadiumData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stadium_data', 'action' => 'edit', $stadiumData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stadium_data', 'action' => 'delete', $stadiumData['id']), array(), __('Are you sure you want to delete # %s?', $stadiumData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stadium Data'), array('controller' => 'stadium_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
