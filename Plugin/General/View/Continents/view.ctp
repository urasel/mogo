<div class="continents view">
<h2><?php echo __('Continent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($continent['Point']['name'], array('controller' => 'points', 'action' => 'view', $continent['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($continent['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $continent['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Title'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Population'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Countries'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['countries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Details'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ranking'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['ranking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Biomes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_biomes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Major Biomes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_biomes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Cities'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Major Cities'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bordering Bodies Of Water'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bordering_bodies_of_water']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Bordering Bodies Of Water'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_bordering_bodies_of_water']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Rivers And Lakes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_rivers_and_lakes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Major Rivers And Lakes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_rivers_and_lakes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Geographical Features'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_geographical_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Major Geographical Features'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_geographical_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facts About Asia'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['facts_about_asia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bn Facts About Asia'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_facts_about_asia']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Continent'), array('action' => 'edit', $continent['Continent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Continent'), array('action' => 'delete', $continent['Continent']['id']), array(), __('Are you sure you want to delete # %s?', $continent['Continent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Continents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Continent'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
