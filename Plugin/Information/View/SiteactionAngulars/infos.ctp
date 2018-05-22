<div class="points view">
<h2><?php echo __('Point'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($point['Point']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($point['Point']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['Country']['name'], array('controller' => 'countries', 'action' => 'view', $point['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $point['Zone']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $point['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $point['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($point['Point']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($point['Point']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($point['Point']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($point['Point']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map'); ?></dt>
		<dd>
			<?php echo h($point['Point']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($point['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $point['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($point['Point']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($point['Point']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($point['Point']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lng'); ?></dt>
		<dd>
			<?php echo h($point['Point']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Private'); ?></dt>
		<dd>
			<?php echo h($point['Point']['private']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($point['Point']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($point['Point']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($point['Point']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Point'), array('action' => 'edit', $point['Point']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Point'), array('action' => 'delete', $point['Point']['id']), array(), __('Are you sure you want to delete # %s?', $point['Point']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd District'), array('controller' => 'bd_districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Images'), array('controller' => 'doctor_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Image'), array('controller' => 'doctor_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospital Images'), array('controller' => 'hospital_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital Image'), array('controller' => 'hospital_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hospitals'), array('controller' => 'hospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hospital'), array('controller' => 'hospitals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institute Images'), array('controller' => 'institute_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute Image'), array('controller' => 'institute_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Images'), array('controller' => 'place_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Image'), array('controller' => 'place_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Doctor Images'); ?></h3>
	<?php if (!empty($point['DoctorImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['DoctorImage'] as $doctorImage): ?>
		<tr>
			<td><?php echo $doctorImage['id']; ?></td>
			<td><?php echo $doctorImage['point_id']; ?></td>
			<td><?php echo $doctorImage['file']; ?></td>
			<td><?php echo $doctorImage['position']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'doctor_images', 'action' => 'view', $doctorImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'doctor_images', 'action' => 'edit', $doctorImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'doctor_images', 'action' => 'delete', $doctorImage['id']), array(), __('Are you sure you want to delete # %s?', $doctorImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Doctor Image'), array('controller' => 'doctor_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Doctors'); ?></h3>
	<?php if (!empty($point['Doctor'])): ?>
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
	<?php foreach ($point['Doctor'] as $doctor): ?>
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
<div class="related">
	<h3><?php echo __('Related Hospital Images'); ?></h3>
	<?php if (!empty($point['HospitalImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['HospitalImage'] as $hospitalImage): ?>
		<tr>
			<td><?php echo $hospitalImage['id']; ?></td>
			<td><?php echo $hospitalImage['point_id']; ?></td>
			<td><?php echo $hospitalImage['file']; ?></td>
			<td><?php echo $hospitalImage['position']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hospital_images', 'action' => 'view', $hospitalImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hospital_images', 'action' => 'edit', $hospitalImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hospital_images', 'action' => 'delete', $hospitalImage['id']), array(), __('Are you sure you want to delete # %s?', $hospitalImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hospital Image'), array('controller' => 'hospital_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hospitals'); ?></h3>
	<?php if (!empty($point['Hospital'])): ?>
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
	<?php foreach ($point['Hospital'] as $hospital): ?>
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
<div class="related">
	<h3><?php echo __('Related Institute Images'); ?></h3>
	<?php if (!empty($point['InstituteImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['InstituteImage'] as $instituteImage): ?>
		<tr>
			<td><?php echo $instituteImage['id']; ?></td>
			<td><?php echo $instituteImage['point_id']; ?></td>
			<td><?php echo $instituteImage['file']; ?></td>
			<td><?php echo $instituteImage['position']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'institute_images', 'action' => 'view', $instituteImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'institute_images', 'action' => 'edit', $instituteImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'institute_images', 'action' => 'delete', $instituteImage['id']), array(), __('Are you sure you want to delete # %s?', $instituteImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Institute Image'), array('controller' => 'institute_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Institutes'); ?></h3>
	<?php if (!empty($point['Institute'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Level'); ?></th>
		<th><?php echo __('Eiin No'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Post Office'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Founded'); ?></th>
		<th><?php echo __('Teaching Staff'); ?></th>
		<th><?php echo __('Hours'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['Institute'] as $institute): ?>
		<tr>
			<td><?php echo $institute['id']; ?></td>
			<td><?php echo $institute['user_id']; ?></td>
			<td><?php echo $institute['point_id']; ?></td>
			<td><?php echo $institute['place_type_id']; ?></td>
			<td><?php echo $institute['type']; ?></td>
			<td><?php echo $institute['level']; ?></td>
			<td><?php echo $institute['eiin_no']; ?></td>
			<td><?php echo $institute['seo_name']; ?></td>
			<td><?php echo $institute['name']; ?></td>
			<td><?php echo $institute['post_office']; ?></td>
			<td><?php echo $institute['location']; ?></td>
			<td><?php echo $institute['mobile']; ?></td>
			<td><?php echo $institute['web']; ?></td>
			<td><?php echo $institute['email']; ?></td>
			<td><?php echo $institute['address']; ?></td>
			<td><?php echo $institute['founded']; ?></td>
			<td><?php echo $institute['teaching_staff']; ?></td>
			<td><?php echo $institute['hours']; ?></td>
			<td><?php echo $institute['lat']; ?></td>
			<td><?php echo $institute['lng']; ?></td>
			<td><?php echo $institute['metatag']; ?></td>
			<td><?php echo $institute['keyword']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'institutes', 'action' => 'view', $institute['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'institutes', 'action' => 'edit', $institute['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'institutes', 'action' => 'delete', $institute['id']), array(), __('Are you sure you want to delete # %s?', $institute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Place Images'); ?></h3>
	<?php if (!empty($point['PlaceImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['PlaceImage'] as $placeImage): ?>
		<tr>
			<td><?php echo $placeImage['id']; ?></td>
			<td><?php echo $placeImage['point_id']; ?></td>
			<td><?php echo $placeImage['file']; ?></td>
			<td><?php echo $placeImage['position']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'place_images', 'action' => 'view', $placeImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'place_images', 'action' => 'edit', $placeImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'place_images', 'action' => 'delete', $placeImage['id']), array(), __('Are you sure you want to delete # %s?', $placeImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Place Image'), array('controller' => 'place_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($point['Place'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Keyword'); ?></th>
		<th><?php echo __('Metatag'); ?></th>
		<th><?php echo __('Bangla Name'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Establish'); ?></th>
		<th><?php echo __('History'); ?></th>
		<th><?php echo __('Capacity'); ?></th>
		<th><?php echo __('Holiday'); ?></th>
		<th><?php echo __('Hours'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Popular'); ?></th>
		<th><?php echo __('Private'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['Place'] as $place): ?>
		<tr>
			<td><?php echo $place['id']; ?></td>
			<td><?php echo $place['user_id']; ?></td>
			<td><?php echo $place['point_id']; ?></td>
			<td><?php echo $place['name']; ?></td>
			<td><?php echo $place['mobile']; ?></td>
			<td><?php echo $place['fax']; ?></td>
			<td><?php echo $place['email']; ?></td>
			<td><?php echo $place['web']; ?></td>
			<td><?php echo $place['seo_name']; ?></td>
			<td><?php echo $place['keyword']; ?></td>
			<td><?php echo $place['metatag']; ?></td>
			<td><?php echo $place['bangla_name']; ?></td>
			<td><?php echo $place['place_type_id']; ?></td>
			<td><?php echo $place['image']; ?></td>
			<td><?php echo $place['country_id']; ?></td>
			<td><?php echo $place['zone_id']; ?></td>
			<td><?php echo $place['bd_district_id']; ?></td>
			<td><?php echo $place['bd_thanas_id']; ?></td>
			<td><?php echo $place['address']; ?></td>
			<td><?php echo $place['location']; ?></td>
			<td><?php echo $place['details']; ?></td>
			<td><?php echo $place['establish']; ?></td>
			<td><?php echo $place['history']; ?></td>
			<td><?php echo $place['capacity']; ?></td>
			<td><?php echo $place['holiday']; ?></td>
			<td><?php echo $place['hours']; ?></td>
			<td><?php echo $place['lat']; ?></td>
			<td><?php echo $place['lng']; ?></td>
			<td><?php echo $place['status']; ?></td>
			<td><?php echo $place['popular']; ?></td>
			<td><?php echo $place['private']; ?></td>
			<td><?php echo $place['created']; ?></td>
			<td><?php echo $place['updated']; ?></td>
			<td><?php echo $place['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'places', 'action' => 'view', $place['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'places', 'action' => 'edit', $place['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'places', 'action' => 'delete', $place['id']), array(), __('Are you sure you want to delete # %s?', $place['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($point['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['point_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), array(), __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Topics'); ?></h3>
	<?php if (!empty($point['Topic'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Point Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Popular'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Verifiedby'); ?></th>
		<th><?php echo __('Reviewedby'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($point['Topic'] as $topic): ?>
		<tr>
			<td><?php echo $topic['id']; ?></td>
			<td><?php echo $topic['user_id']; ?></td>
			<td><?php echo $topic['point_id']; ?></td>
			<td><?php echo $topic['image']; ?></td>
			<td><?php echo $topic['created']; ?></td>
			<td><?php echo $topic['updated']; ?></td>
			<td><?php echo $topic['popular']; ?></td>
			<td><?php echo $topic['active']; ?></td>
			<td><?php echo $topic['verifiedby']; ?></td>
			<td><?php echo $topic['reviewedby']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'topics', 'action' => 'view', $topic['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'topics', 'action' => 'edit', $topic['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'topics', 'action' => 'delete', $topic['id']), array(), __('Are you sure you want to delete # %s?', $topic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
