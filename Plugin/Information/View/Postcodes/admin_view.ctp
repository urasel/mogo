<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Postcodes'), h($postcode['Postcode']['title']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Postcodes'), array('action' => 'index'));

if (isset($postcode['Postcode']['title'])):
	$this->Html->addCrumb($postcode['Postcode']['title'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Postcode'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Postcode'), array(
		'action' => 'edit',
		$postcode['Postcode']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Postcode'), array(
		'action' => 'delete', $postcode['Postcode']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $postcode['Postcode']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Postcodes'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Postcode'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Place Types'), array('controller' => 'place_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place Type'), array('controller' => 'place_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('controller' => 'countries', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('controller' => 'countries', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Divisions'), array('controller' => 'bd_divisions', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Division'), array('controller' => 'bd_divisions', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Districts'), array('controller' => 'bd_districts', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd District'), array('controller' => 'bd_districts', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bd Thanas'), array('controller' => 'bd_thanas', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="postcodes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $postcode['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['Point']['name'], array('controller' => 'points', 'action' => 'view', $postcode['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['Country']['name'], array('controller' => 'countries', 'action' => 'view', $postcode['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Divisions'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['divisions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdDivision']['name'], array('controller' => 'bd_divisions', 'action' => 'view', $postcode['BdDivision']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Districts'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['districts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdDistrict']['name'], array('controller' => 'bd_districts', 'action' => 'view', $postcode['BdDistrict']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Thanas'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['thanas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Newthanas'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['newthanas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bd Thanas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postcode['BdThanas']['name'], array('controller' => 'bd_thanas', 'action' => 'view', $postcode['BdThanas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Title'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seo Name'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Post Code'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['post_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lng'); ?></dt>
		<dd>
			<?php echo h($postcode['Postcode']['lng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>