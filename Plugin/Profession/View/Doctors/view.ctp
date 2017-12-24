<div class="doctors view">
<h2><?php echo __('Doctor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Point']['name'], array('controller' => 'points', 'action' => 'view', $doctor['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospital'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Hospital']['name'], array('controller' => 'hospitals', 'action' => 'view', $doctor['Hospital']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospitalids'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['hospitalids']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Sex']['name'], array('controller' => 'sexes', 'action' => 'view', $doctor['Sex']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Religion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Religion']['name'], array('controller' => 'religions', 'action' => 'view', $doctor['Religion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualification'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['qualification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Degree'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['degree']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Specialization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['DoctorSpecialization']['name'], array('controller' => 'doctor_specializations', 'action' => 'view', $doctor['DoctorSpecialization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Expertise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['DoctorExpertise']['name'], array('controller' => 'doctor_expertises', 'action' => 'view', $doctor['DoctorExpertise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expertiseids'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['expertiseids']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chamber'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['chamber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatag'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['metatag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor'), array('action' => 'edit', $doctor['Doctor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor'), array('action' => 'delete', $doctor['Doctor']['id']), array(), __('Are you sure you want to delete # %s?', $doctor['Doctor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('action' => 'add')); ?> </li>
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
