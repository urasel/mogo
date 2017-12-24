<div class="postcodes view">
<h2><?php echo __('Postcode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $postcode['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['Point']['name'], array('controller' => 'points', 'action' => 'view', $postcode['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $postcode['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divisions'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['divisions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $postcode['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Districts'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['districts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $postcode['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thanas'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['thanas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newthanas'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['newthanas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $postcode['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Code'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['post_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['lng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postcode'), array('action' => 'edit', $postcode['Postcode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postcode'), array('action' => 'delete', $postcode['Postcode']['id']), array(), __('Are you sure you want to delete # %s?', $postcode['Postcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postcodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postcode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
	</ul>
</div>
