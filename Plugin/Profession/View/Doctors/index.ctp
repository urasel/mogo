<div class="doctors index">
	<h2><?php echo __('Doctors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('point_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_name'); ?></th>
			<th><?php echo $this->Paginator->sort('hospital_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hospitalids'); ?></th>
			<th><?php echo $this->Paginator->sort('dob'); ?></th>
			<th><?php echo $this->Paginator->sort('sex_id'); ?></th>
			<th><?php echo $this->Paginator->sort('religion_id'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('qualification'); ?></th>
			<th><?php echo $this->Paginator->sort('degree'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_specialization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_expertise_id'); ?></th>
			<th><?php echo $this->Paginator->sort('expertiseids'); ?></th>
			<th><?php echo $this->Paginator->sort('designation'); ?></th>
			<th><?php echo $this->Paginator->sort('chamber'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('metatag'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($doctors as $doctor): ?>
	<tr>
		<td><?php echo h($doctor['Doctor']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctor['Point']['name'], array('controller' => 'points', 'action' => 'view', $doctor['Point']['id'])); ?>
		</td>
		<td><?php echo h($doctor['Doctor']['name']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['seo_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctor['Hospital']['name'], array('controller' => 'hospitals', 'action' => 'view', $doctor['Hospital']['id'])); ?>
		</td>
		<td><?php echo h($doctor['Doctor']['hospitalids']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['dob']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctor['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $doctor['Sex']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($doctor['Religion']['name'], array('controller' => 'religions', 'action' => 'view', $doctor['Religion']['id'])); ?>
		</td>
		<td><?php echo h($doctor['Doctor']['details']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['qualification']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['degree']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctor['DoctorSpecialization']['name'], array('controller' => 'doctor_specializations', 'action' => 'view', $doctor['DoctorSpecialization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($doctor['DoctorExpertise']['name'], array('controller' => 'doctor_expertises', 'action' => 'view', $doctor['DoctorExpertise']['id'])); ?>
		</td>
		<td><?php echo h($doctor['Doctor']['expertiseids']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['designation']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['chamber']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['address']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['phone']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['email']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['website']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['image']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($doctor['Doctor']['metatag']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doctor['Doctor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctor['Doctor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctor['Doctor']['id']), array(), __('Are you sure you want to delete # %s?', $doctor['Doctor']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Doctor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospitals'), array('controller' => 'hospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('controller' => 'sexes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('controller' => 'sexes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Religions'), array('controller' => 'religions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Religion'), array('controller' => 'religions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Specializations'), array('controller' => 'doctor_specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Specialization'), array('controller' => 'doctor_specializations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Expertises'), array('controller' => 'doctor_expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Expertise'), array('controller' => 'doctor_expertises', 'action' => 'add')); ?> </li>
	</ul>
</div>
