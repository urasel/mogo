<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Hotel Categories'), h($hotelCategory['HotelCategory']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Hotel Categories'), array('action' => 'index'));

if (isset($hotelCategory['HotelCategory']['name'])):
	$this->Html->addCrumb($hotelCategory['HotelCategory']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Hotel Category'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Hotel Category'), array(
		'action' => 'edit',
		$hotelCategory['HotelCategory']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Hotel Category'), array(
		'action' => 'delete', $hotelCategory['HotelCategory']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $hotelCategory['HotelCategory']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotel Categories'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel Category'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('controller' => 'hotels', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('controller' => 'hotels', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="hotelCategories view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Star'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['star']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>