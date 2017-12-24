<div class="bloodGroups view">
<h2><?php echo __('Blood Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($bloodGroup['BloodGroup']['bn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blood Group'), array('action' => 'edit', $bloodGroup['BloodGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blood Group'), array('action' => 'delete', $bloodGroup['BloodGroup']['id']), array(), __('Are you sure you want to delete # %s?', $bloodGroup['BloodGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blood News'), array('controller' => 'blood_news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blood News'), array('controller' => 'blood_news', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Blood News'); ?></h3>
	<?php if (!empty($bloodGroup['BloodNews'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Blood Group Id'); ?></th>
		<th><?php echo __('Required Date'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bloodGroup['BloodNews'] as $bloodNews): ?>
		<tr>
			<td><?php echo $bloodNews['id']; ?></td>
			<td><?php echo $bloodNews['blood_group_id']; ?></td>
			<td><?php echo $bloodNews['required_date']; ?></td>
			<td><?php echo $bloodNews['quantity']; ?></td>
			<td><?php echo $bloodNews['mobile']; ?></td>
			<td><?php echo $bloodNews['created']; ?></td>
			<td><?php echo $bloodNews['updated']; ?></td>
			<td><?php echo $bloodNews['user_id']; ?></td>
			<td><?php echo $bloodNews['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'blood_news', 'action' => 'view', $bloodNews['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'blood_news', 'action' => 'edit', $bloodNews['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'blood_news', 'action' => 'delete', $bloodNews['id']), array(), __('Are you sure you want to delete # %s?', $bloodNews['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Blood News'), array('controller' => 'blood_news', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
