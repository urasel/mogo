<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Continents'), h($continent['Continent']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Continents'), array('action' => 'index'));

if (isset($continent['Continent']['name'])):
	$this->Html->addCrumb($continent['Continent']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Continent'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Continent'), array(
		'action' => 'edit',
		$continent['Continent']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Continent'), array(
		'action' => 'delete', $continent['Continent']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $continent['Continent']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Continents'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Continent'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="continents view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($continent['Point']['name'], array('controller' => 'points', 'action' => 'view', $continent['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($continent['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $continent['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Title'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Area'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Population'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['population']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Countries'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['countries']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Details'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Details'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Ranking'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['ranking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Major Biomes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_biomes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Major Biomes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_biomes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Major Cities'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Major Cities'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_cities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bordering Bodies Of Water'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bordering_bodies_of_water']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Bordering Bodies Of Water'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_bordering_bodies_of_water']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Major Rivers And Lakes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_rivers_and_lakes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Major Rivers And Lakes'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_rivers_and_lakes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Major Geographical Features'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['major_geographical_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Major Geographical Features'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_major_geographical_features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Facts About Asia'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['facts_about_asia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Facts About Asia'); ?></dt>
		<dd>
			<?php echo h($continent['Continent']['bn_facts_about_asia']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>