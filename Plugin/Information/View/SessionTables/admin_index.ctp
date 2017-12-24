<?php
$this->viewVars['title_for_layout'] = __d('information', 'Session Tables');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Session Tables'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('useragent'),
		$this->Paginator->sort('sessionName'),
		$this->Paginator->sort('userip'),
		$this->Paginator->sort('clickcount'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($sessionTables as $sessionTable):
		$row = array();
		$row[] = h($sessionTable['SessionTable']['id']);
		$row[] = h($sessionTable['SessionTable']['useragent']);
		$row[] = h($sessionTable['SessionTable']['sessionName']);
		$row[] = h($sessionTable['SessionTable']['userip']);
		$row[] = h($sessionTable['SessionTable']['clickcount']);
		$row[] = $this->Time->format($sessionTable['SessionTable']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($sessionTable['SessionTable']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($sessionTable['SessionTable']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $sessionTable['SessionTable']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$sessionTable['SessionTable']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$sessionTable['SessionTable']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $sessionTable['SessionTable']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
