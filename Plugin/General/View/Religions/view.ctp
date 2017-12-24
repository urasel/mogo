<div class="religions view">
<h2><?php echo __('Religion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($religion['Religion']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Religion'), array('action' => 'edit', $religion['Religion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Religion'), array('action' => 'delete', $religion['Religion']['id']), array(), __('Are you sure you want to delete # %s?', $religion['Religion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Religions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Religion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Doctors'); ?></h3>
	<?php if (!empty($religion['Doctor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Hospital Id'); ?></th>
		<th><?php echo __('Hospitalids'); ?></th>
		<th><?php echo __('Dob'); ?></th>
		<th><?php echo __('Sex Id'); ?></th>
		<th><?php echo __('Religion Id'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Qualification'); ?></th>
		<th><?php echo __('Degree'); ?></th>
		<th><?php echo __('Doctor Specialization Id'); ?></th>
		<th><?php echo __('Doctor Expertise Id'); ?></th>
		<th><?php echo __('Expertiseids'); ?></th>
		<th><?php echo __('Designation'); ?></th>
		<th><?php echo __('Chamber'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($religion['Doctor'] as $doctor): ?>
		<tr>
			<td><?php echo $doctor['id']; ?></td>
			<td><?php echo $doctor['point_id']; ?></td>
			<td><?php echo $doctor['name']; ?></td>
			<td><?php echo $doctor['seo_name']; ?></td>
			<td><?php echo $doctor['hospital_id']; ?></td>
			<td><?php echo $doctor['hospitalids']; ?></td>
			<td><?php echo $doctor['dob']; ?></td>
			<td><?php echo $doctor['sex_id']; ?></td>
			<td><?php echo $doctor['religion_id']; ?></td>
			<td><?php echo $doctor['details']; ?></td>
			<td><?php echo $doctor['qualification']; ?></td>
			<td><?php echo $doctor['degree']; ?></td>
			<td><?php echo $doctor['doctor_specialization_id']; ?></td>
			<td><?php echo $doctor['doctor_expertise_id']; ?></td>
			<td><?php echo $doctor['expertiseids']; ?></td>
			<td><?php echo $doctor['designation']; ?></td>
			<td><?php echo $doctor['chamber']; ?></td>
			<td><?php echo $doctor['address']; ?></td>
			<td><?php echo $doctor['phone']; ?></td>
			<td><?php echo $doctor['email']; ?></td>
			<td><?php echo $doctor['website']; ?></td>
			<td><?php echo $doctor['image']; ?></td>
			<td><?php echo $doctor['keyword']; ?></td>
			<td><?php echo $doctor['metatag']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'doctors', 'action' => 'view', $doctor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'doctors', 'action' => 'edit', $doctor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'doctors', 'action' => 'delete', $doctor['id']), array(), __('Are you sure you want to delete # %s?', $doctor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
