<?php
$this->viewVars['title_for_layout'] = __d('information', 'Blood Donation Records');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Blood Donation Records'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('blood_donar_id'),
		$this->Paginator->sort('patient_name'),
		$this->Paginator->sort('bag'),
		$this->Paginator->sort('donation_date'),
		$this->Paginator->sort('patient_phone'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($bloodDonationRecords as $bloodDonationRecord):
		$row = array();
		$row[] = $this->Html->link($bloodDonationRecord['BloodDonar']['name'], array(
			'controller' => 'blood_donars',
		'action' => 'view',
			$bloodDonationRecord['BloodDonar']['id'],
	));
		$row[] = h($bloodDonationRecord['BloodDonationRecord']['patient_name']);
		$row[] = h($bloodDonationRecord['BloodDonationRecord']['bag']);
		$row[] = $this->Time->format($bloodDonationRecord['BloodDonationRecord']['donation_date'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = h($bloodDonationRecord['BloodDonationRecord']['patient_phone']);
		$actions = array($this->Croogo->adminRowActions($bloodDonationRecord['BloodDonationRecord']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $bloodDonationRecord['BloodDonationRecord']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$bloodDonationRecord['BloodDonationRecord']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$bloodDonationRecord['BloodDonationRecord']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $bloodDonationRecord['BloodDonationRecord']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
