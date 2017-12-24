<?php
$this->viewVars['title_for_layout'] = __d('general', 'Doctor Expertises');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Doctor Expertises'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('expertise_details'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($doctorExpertises as $doctorExpertise):
		$row = array();
		$row[] = h($doctorExpertise['DoctorExpertise']['id']);
		$row[] = h($doctorExpertise['DoctorExpertise']['name']);
		$row[] = h($doctorExpertise['DoctorExpertise']['expertise_details']);
		$actions = array($this->Croogo->adminRowActions($doctorExpertise['DoctorExpertise']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $doctorExpertise['DoctorExpertise']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$doctorExpertise['DoctorExpertise']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$doctorExpertise['DoctorExpertise']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $doctorExpertise['DoctorExpertise']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
