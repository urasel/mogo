<?php
$this->viewVars['title_for_layout'] = __d('profession', 'Doctors');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('profession', 'Doctors'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('hospital_id'),
		$this->Paginator->sort('hospitalids'),
		$this->Paginator->sort('dob'),
		$this->Paginator->sort('sex_id'),
		$this->Paginator->sort('religion_id'),
		$this->Paginator->sort('details'),
		$this->Paginator->sort('qualification'),
		$this->Paginator->sort('degree'),
		$this->Paginator->sort('doctor_specialization_id'),
		$this->Paginator->sort('doctor_expertise_id'),
		$this->Paginator->sort('expertiseids'),
		$this->Paginator->sort('designation'),
		$this->Paginator->sort('chamber'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('phone'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('website'),
		$this->Paginator->sort('image'),
		$this->Paginator->sort('keyword'),
		$this->Paginator->sort('metatag'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($doctors as $doctor):
		$row = array();
		$row[] = h($doctor['Doctor']['id']);
		$row[] = $this->Html->link($doctor['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$doctor['Point']['id'],
	));
		$row[] = h($doctor['Doctor']['name']);
		$row[] = h($doctor['Doctor']['seo_name']);
		$row[] = $this->Html->link($doctor['Hospital']['name'], array(
			'controller' => 'hospitals',
		'action' => 'view',
			$doctor['Hospital']['id'],
	));
		$row[] = h($doctor['Doctor']['hospitalids']);
		$row[] = h($doctor['Doctor']['dob']);
		$row[] = $this->Html->link($doctor['Sex']['name'], array(
			'controller' => 'sexes',
		'action' => 'view',
			$doctor['Sex']['id'],
	));
		$row[] = $this->Html->link($doctor['Religion']['name'], array(
			'controller' => 'religions',
		'action' => 'view',
			$doctor['Religion']['id'],
	));
		$row[] = h($doctor['Doctor']['details']);
		$row[] = h($doctor['Doctor']['qualification']);
		$row[] = h($doctor['Doctor']['degree']);
		$row[] = $this->Html->link($doctor['DoctorSpecialization']['name'], array(
			'controller' => 'doctor_specializations',
		'action' => 'view',
			$doctor['DoctorSpecialization']['id'],
	));
		$row[] = $this->Html->link($doctor['DoctorExpertise']['name'], array(
			'controller' => 'doctor_expertises',
		'action' => 'view',
			$doctor['DoctorExpertise']['id'],
	));
		$row[] = h($doctor['Doctor']['expertiseids']);
		$row[] = h($doctor['Doctor']['designation']);
		$row[] = h($doctor['Doctor']['chamber']);
		$row[] = h($doctor['Doctor']['address']);
		$row[] = h($doctor['Doctor']['phone']);
		$row[] = h($doctor['Doctor']['email']);
		$row[] = h($doctor['Doctor']['website']);
		$row[] = h($doctor['Doctor']['image']);
		$row[] = h($doctor['Doctor']['keyword']);
		$row[] = h($doctor['Doctor']['metatag']);
		$actions = array($this->Croogo->adminRowActions($doctor['Doctor']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $doctor['Doctor']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$doctor['Doctor']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$doctor['Doctor']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $doctor['Doctor']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
