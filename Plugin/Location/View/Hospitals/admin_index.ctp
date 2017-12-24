<?php
$this->viewVars['title_for_layout'] = __d('location', 'Hospitals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('location', 'Hospitals'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('hospital_category_id'),
		$this->Paginator->sort('speciality'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('hours'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('web'),
		$this->Paginator->sort('fax'),
		$this->Paginator->sort('phone'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('keyword'),
		$this->Paginator->sort('metatag'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($hospitals as $hospital):
		$row = array();
		$row[] = h($hospital['Hospital']['id']);
		$row[] = $this->Html->link($hospital['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$hospital['Point']['id'],
	));
		$row[] = h($hospital['Hospital']['name']);
		$row[] = h($hospital['Hospital']['seo_name']);
		$row[] = $this->Html->link($hospital['HospitalCategory']['name'], array(
			'controller' => 'hospital_categories',
		'action' => 'view',
			$hospital['HospitalCategory']['id'],
	));
		$row[] = h($hospital['Hospital']['speciality']);
		$row[] = h($hospital['Hospital']['details']);
		$row[] = h($hospital['Hospital']['hours']);
		$row[] = h($hospital['Hospital']['address']);
		$row[] = h($hospital['Hospital']['email']);
		$row[] = h($hospital['Hospital']['web']);
		$row[] = h($hospital['Hospital']['fax']);
		$row[] = h($hospital['Hospital']['phone']);
		$row[] = h($hospital['Hospital']['image']);
		$row[] = h($hospital['Hospital']['keyword']);
		$row[] = h($hospital['Hospital']['metatag']);
		$row[] = $this->Time->format($hospital['Hospital']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($hospital['Hospital']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($hospital['Hospital']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $hospital['Hospital']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$hospital['Hospital']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$hospital['Hospital']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $hospital['Hospital']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
