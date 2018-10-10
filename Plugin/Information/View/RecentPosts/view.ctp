<div class="recentPosts view">
<h2><?php echo __('Recent Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pointid'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['pointid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pointname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['pointname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pointcreated'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['pointcreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point Seoname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['point_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classid'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['classid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Bntitle'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_bntitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Title'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Metatag'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_metatag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Bn Details'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Details'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Image'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['class_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Icon'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Pluralname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placetype Seoname'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['placetype_seoname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publishdate'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['publishdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unpublishdate'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['unpublishdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($recentPost['RecentPost']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recent Post'), array('action' => 'edit', $recentPost['RecentPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recent Post'), array('action' => 'delete', $recentPost['RecentPost']['id']), array(), __('Are you sure you want to delete # %s?', $recentPost['RecentPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recent Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recent Post'), array('action' => 'add')); ?> </li>
	</ul>
</div>
