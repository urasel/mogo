<div class="babyNames view">
<h2><?php echo __('Baby Name'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babyName['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $babyName['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arabic'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['arabic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meaning'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['meaning']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babyName['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $babyName['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origin'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Likes'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['likes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($babyName['BabyName']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Baby Name'), array('action' => 'edit', $babyName['BabyName']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Baby Name'), array('action' => 'delete', $babyName['BabyName']['id']), array(), __('Are you sure you want to delete # %s?', $babyName['BabyName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Baby Names'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Baby Name'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
	</ul>
</div>
