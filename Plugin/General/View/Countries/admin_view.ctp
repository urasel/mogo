<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Countries'), h($country['Country']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Countries'), array('action' => 'index'));

if (isset($country['Country']['name'])):
	$this->Html->addCrumb($country['Country']['name'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Country'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Country'), array(
		'action' => 'edit',
		$country['Country']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Country'), array(
		'action' => 'delete', $country['Country']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $country['Country']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Countries'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Continents'), array('controller' => 'continents', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Continent'), array('controller' => 'continents', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Banks'), array('controller' => 'banks', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Bank'), array('controller' => 'banks', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Boothes'), array('controller' => 'boothes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Boothe'), array('controller' => 'boothes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Calling Codes'), array('controller' => 'country_calling_codes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Calling Code'), array('controller' => 'country_calling_codes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Capitals'), array('controller' => 'country_capitals', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Capital'), array('controller' => 'country_capitals', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Cities'), array('controller' => 'country_cities', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country City'), array('controller' => 'country_cities', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Currencies'), array('controller' => 'country_currencies', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Currency'), array('controller' => 'country_currencies', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Domains'), array('controller' => 'country_domains', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Domain'), array('controller' => 'country_domains', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Country Timezones'), array('controller' => 'country_timezones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Country Timezone'), array('controller' => 'country_timezones', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Holy Places'), array('controller' => 'holy_places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Holy Place'), array('controller' => 'holy_places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Hotels'), array('controller' => 'hotels', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Hotel'), array('controller' => 'hotels', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Points'), array('controller' => 'points', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Point'), array('controller' => 'points', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Postcodes'), array('controller' => 'postcodes', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Postcode'), array('controller' => 'postcodes', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Profiles'), array('controller' => 'profiles', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Profile'), array('controller' => 'profiles', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Schools'), array('controller' => 'schools', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New School'), array('controller' => 'schools', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Zones'), array('controller' => 'zones', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Zone'), array('controller' => 'zones', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="countries view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Continent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($country['Continent']['name'], array('controller' => 'continents', 'action' => 'view', $country['Continent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bn Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['bn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Iso Code 2'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Iso Code 3'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo $this->Html->status($country['Country']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>