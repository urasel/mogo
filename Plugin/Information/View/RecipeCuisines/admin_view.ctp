<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recipe Cuisines'), h($recipeCuisine['RecipeCuisine']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipe Cuisines'), array('action' => 'index'));

if (isset($recipeCuisine['RecipeCuisine']['name'])):
	$this->Html->addCrumb($recipeCuisine['RecipeCuisine']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Recipe Cuisine'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Recipe Cuisine'), array(
		'action' => 'edit',
		$recipeCuisine['RecipeCuisine']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Recipe Cuisine'), array(
		'action' => 'delete', $recipeCuisine['RecipeCuisine']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $recipeCuisine['RecipeCuisine']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipe Cuisines'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe Cuisine'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Recipes'), array('controller' => 'recipes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Recipe'), array('controller' => 'recipes', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="recipeCuisines view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name Bn'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['name_bn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Order'); ?></dt>
		<dd>
			<?php echo h($recipeCuisine['RecipeCuisine']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Isactive'); ?></dt>
		<dd>
			<?php echo $this->Html->status($recipeCuisine['RecipeCuisine']['isactive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>