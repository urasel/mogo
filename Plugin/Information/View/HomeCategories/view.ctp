<div class="homeCategories view">
<h2><?php echo __('Home Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Title'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['bn_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($homeCategory['HomeCategory']['isActive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Home Category'), array('action' => 'edit', $homeCategory['HomeCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Home Category'), array('action' => 'delete', $homeCategory['HomeCategory']['id']), array(), __('Are you sure you want to delete # %s?', $homeCategory['HomeCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Home Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Home Posts'), array('controller' => 'home_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Post'), array('controller' => 'home_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Home Posts'); ?></h3>
	<?php if (!empty($homeCategory['HomePost'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Home Category Id'); ?></th>
		<th><?php echo __('Pointid'); ?></th>
		<th><?php echo __('Point Seoname'); ?></th>
		<th><?php echo __('Classid'); ?></th>
		<th><?php echo __('Class Bntitle'); ?></th>
		<th><?php echo __('Class Title'); ?></th>
		<th><?php echo __('Class Metatag'); ?></th>
		<th><?php echo __('Class Image'); ?></th>
		<th><?php echo __('Placetype Icon'); ?></th>
		<th><?php echo __('Placetype Pluralname'); ?></th>
		<th><?php echo __('Placetype Seoname'); ?></th>
		<th><?php echo __('Publishdate'); ?></th>
		<th><?php echo __('Unpublishdate'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($homeCategory['HomePost'] as $homePost): ?>
		<tr>
			<td><?php echo $homePost['id']; ?></td>
			<td><?php echo $homePost['home_category_id']; ?></td>
			<td><?php echo $homePost['pointid']; ?></td>
			<td><?php echo $homePost['point_seoname']; ?></td>
			<td><?php echo $homePost['classid']; ?></td>
			<td><?php echo $homePost['class_bntitle']; ?></td>
			<td><?php echo $homePost['class_title']; ?></td>
			<td><?php echo $homePost['class_metatag']; ?></td>
			<td><?php echo $homePost['class_image']; ?></td>
			<td><?php echo $homePost['placetype_icon']; ?></td>
			<td><?php echo $homePost['placetype_pluralname']; ?></td>
			<td><?php echo $homePost['placetype_seoname']; ?></td>
			<td><?php echo $homePost['publishdate']; ?></td>
			<td><?php echo $homePost['unpublishdate']; ?></td>
			<td><?php echo $homePost['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'home_posts', 'action' => 'view', $homePost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'home_posts', 'action' => 'edit', $homePost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'home_posts', 'action' => 'delete', $homePost['id']), array(), __('Are you sure you want to delete # %s?', $homePost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Home Post'), array('controller' => 'home_posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
