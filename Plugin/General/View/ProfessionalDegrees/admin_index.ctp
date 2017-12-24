<?php
$this->viewVars['title_for_layout'] = __d('general', 'Professional Degrees');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('general', 'Professional Degrees'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($professionalDegrees as $professionalDegree):
		$row = array();
		$row[] = h($professionalDegree['ProfessionalDegree']['id']);
		$row[] = h($professionalDegree['ProfessionalDegree']['name']);
		$actions = array($this->Croogo->adminRowActions($professionalDegree['ProfessionalDegree']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $professionalDegree['ProfessionalDegree']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$professionalDegree['ProfessionalDegree']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$professionalDegree['ProfessionalDegree']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $professionalDegree['ProfessionalDegree']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
