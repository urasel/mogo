<div class="homePosts view">
<h2><?php echo __('Home Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($homePost['HomeCategory']['title'], array('controller' => 'home_categories', 'action' => 'view', $homePost['HomeCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pointid'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['pointid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point Seoname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['point_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classid'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['classid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Bntitle'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_bntitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Title'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Metatag'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Image'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['class_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Icon'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Pluralname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Seoname'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['placetype_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publishdate'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['publishdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unpublishdate'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['unpublishdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($homePost['HomePost']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Home Post'), array('action' => 'edit', $homePost['HomePost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Home Post'), array('action' => 'delete', $homePost['HomePost']['id']), array(), __('Are you sure you want to delete # %s?', $homePost['HomePost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Home Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Home Categories'), array('controller' => 'home_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Category'), array('controller' => 'home_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
