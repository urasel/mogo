<div class="placeTypes view">
<h2><?php echo __('Place Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parentid'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['parentid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codeblock'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['codeblock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Singlename'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['singlename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pluralname'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['pluralname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Image'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['type_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupname'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['groupname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topcat'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['topcat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($placeType['PlaceType']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Type'), array('action' => 'edit', $placeType['PlaceType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Type'), array('action' => 'delete', $placeType['PlaceType']['id']), array(), __('Are you sure you want to delete # %s?', $placeType['PlaceType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Questions'), array('controller' => 'quiz_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Question'), array('controller' => 'quiz_questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Institutes'); ?></h3>
	<?php if (!empty($placeType['Institute'])): ?>
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
	<?php foreach ($placeType['Institute'] as $institute): ?>
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
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($placeType['Place'])): ?>
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
	<?php foreach ($placeType['Place'] as $place): ?>
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
	<h3><?php echo __('Related Points'); ?></h3>
	<?php if (!empty($placeType['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Bn Name'); ?></th>
		<th><?php echo __('Seo Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Bd District Id'); ?></th>
		<th><?php echo __('Bd Thanas Id'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Icon'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Map'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Private'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($placeType['Point'] as $point): ?>
		<tr>
			<td><?php echo $point['id']; ?></td>
			<td><?php echo $point['name']; ?></td>
			<td><?php echo $point['bn_name']; ?></td>
			<td><?php echo $point['seo_name']; ?></td>
			<td><?php echo $point['country_id']; ?></td>
			<td><?php echo $point['zone_id']; ?></td>
			<td><?php echo $point['bd_district_id']; ?></td>
			<td><?php echo $point['bd_thanas_id']; ?></td>
			<td><?php echo $point['location']; ?></td>
			<td><?php echo $point['address']; ?></td>
			<td><?php echo $point['icon']; ?></td>
			<td><?php echo $point['image']; ?></td>
			<td><?php echo $point['map']; ?></td>
			<td><?php echo $point['place_type_id']; ?></td>
			<td><?php echo $point['contact']; ?></td>
			<td><?php echo $point['email']; ?></td>
			<td><?php echo $point['lat']; ?></td>
			<td><?php echo $point['lng']; ?></td>
			<td><?php echo $point['private']; ?></td>
			<td><?php echo $point['active']; ?></td>
			<td><?php echo $point['created']; ?></td>
			<td><?php echo $point['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'points', 'action' => 'view', $point['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'points', 'action' => 'edit', $point['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'points', 'action' => 'delete', $point['id']), array(), __('Are you sure you want to delete # %s?', $point['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Quiz Questions'); ?></h3>
	<?php if (!empty($placeType['QuizQuestion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Place Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Select Any'); ?></th>
		<th><?php echo __('Correct'); ?></th>
		<th><?php echo __('Incorrect'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($placeType['QuizQuestion'] as $quizQuestion): ?>
		<tr>
			<td><?php echo $quizQuestion['id']; ?></td>
			<td><?php echo $quizQuestion['place_type_id']; ?></td>
			<td><?php echo $quizQuestion['name']; ?></td>
			<td><?php echo $quizQuestion['select_any']; ?></td>
			<td><?php echo $quizQuestion['correct']; ?></td>
			<td><?php echo $quizQuestion['incorrect']; ?></td>
			<td><?php echo $quizQuestion['isactive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quiz_questions', 'action' => 'view', $quizQuestion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quiz_questions', 'action' => 'edit', $quizQuestion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quiz_questions', 'action' => 'delete', $quizQuestion['id']), array(), __('Are you sure you want to delete # %s?', $quizQuestion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Quiz Question'), array('controller' => 'quiz_questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
