<?php
$this->viewVars['title_for_layout'] = __d('general', 'Professional Studies');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Professional Studies'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('details'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($professionalStudies as $professionalStudy):
		$row = array();
		$row[] = h($professionalStudy['ProfessionalStudy']['id']);
		$row[] = h($professionalStudy['ProfessionalStudy']['name']);
		$row[] = h($professionalStudy['ProfessionalStudy']['details']);
		$actions = array($this->Croogo->adminRowActions($professionalStudy['ProfessionalStudy']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $professionalStudy['ProfessionalStudy']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$professionalStudy['ProfessionalStudy']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$professionalStudy['ProfessionalStudy']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $professionalStudy['ProfessionalStudy']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
