<div class="hospitalCategories view">
<h2><?php echo __('Hospital Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Star'); ?></dt>
		<dd>
			<?php echo h($hospitalCategory['HospitalCategory']['star']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hospital Category'), array('action' => 'edit', $hospitalCategory['HospitalCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hospital Category'), array('action' => 'delete', $hospitalCategory['HospitalCategory']['id']), array(), __('Are you sure you want to delete # %s?', $hospitalCategory['HospitalCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospital Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospitals'), array('controller' => 'hospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hospitals'); ?></h3>
	<?php if (!empty($hospitalCategory['Hospital'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Hospital Category Id'); ?></th>
		<th><?php echo __('Speciality'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Hours'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hospitalCategory['Hospital'] as $hospital): ?>
		<tr>
			<td><?php echo $hospital['id']; ?></td>
			<td><?php echo $hospital['point_id']; ?></td>
			<td><?php echo $hospital['name']; ?></td>
			<td><?php echo $hospital['seo_name']; ?></td>
			<td><?php echo $hospital['hospital_category_id']; ?></td>
			<td><?php echo $hospital['speciality']; ?></td>
			<td><?php echo $hospital['details']; ?></td>
			<td><?php echo $hospital['hours']; ?></td>
			<td><?php echo $hospital['address']; ?></td>
			<td><?php echo $hospital['email']; ?></td>
			<td><?php echo $hospital['web']; ?></td>
			<td><?php echo $hospital['fax']; ?></td>
			<td><?php echo $hospital['phone']; ?></td>
			<td><?php echo $hospital['image']; ?></td>
			<td><?php echo $hospital['keyword']; ?></td>
			<td><?php echo $hospital['metatag']; ?></td>
			<td><?php echo $hospital['created']; ?></td>
			<td><?php echo $hospital['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hospitals', 'action' => 'view', $hospital['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hospitals', 'action' => 'edit', $hospital['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hospitals', 'action' => 'delete', $hospital['id']), array(), __('Are you sure you want to delete # %s?', $hospital['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
