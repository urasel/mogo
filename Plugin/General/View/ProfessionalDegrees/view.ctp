<div class="professionalDegrees view">
<h2><?php echo __('Professional Degree'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($professionalDegree['ProfessionalDegree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($professionalDegree['ProfessionalDegree']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Professional Degree'), array('action' => 'edit', $professionalDegree['ProfessionalDegree']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Professional Degree'), array('action' => 'delete', $professionalDegree['ProfessionalDegree']['id']), array(), __('Are you sure you want to delete # %s?', $professionalDegree['ProfessionalDegree']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Professional Degrees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Professional Degree'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professional Educations'), array('controller' => 'professional_educations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Professional Education'), array('controller' => 'professional_educations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Professional Educations'); ?></h3>
	<?php if (!empty($professionalDegree['ProfessionalEducation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Personid'); ?></th>
		<th><?php echo __('Schoolid'); ?></th>
		<th><?php echo __('Datefrom'); ?></th>
		<th><?php echo __('Dateto'); ?></th>
		<th><?php echo __('Professional Degree Id'); ?></th>
		<th><?php echo __('Professional Study Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($professionalDegree['ProfessionalEducation'] as $professionalEducation): ?>
		<tr>
			<td><?php echo $professionalEducation['id']; ?></td>
			<td><?php echo $professionalEducation['personid']; ?></td>
			<td><?php echo $professionalEducation['schoolid']; ?></td>
			<td><?php echo $professionalEducation['datefrom']; ?></td>
			<td><?php echo $professionalEducation['dateto']; ?></td>
			<td><?php echo $professionalEducation['professional_degree_id']; ?></td>
			<td><?php echo $professionalEducation['professional_study_id']; ?></td>
			<td><?php echo $professionalEducation['grade']; ?></td>
			<td><?php echo $professionalEducation['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'professional_educations', 'action' => 'view', $professionalEducation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'professional_educations', 'action' => 'edit', $professionalEducation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'professional_educations', 'action' => 'delete', $professionalEducation['id']), array(), __('Are you sure you want to delete # %s?', $professionalEducation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Professional Education'), array('controller' => 'professional_educations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
