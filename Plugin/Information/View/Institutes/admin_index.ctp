<?php
$this->viewVars['title_for_layout'] = __d('information', 'Institutes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Institutes'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('user_id'),
		$this->Paginator->sort('point_id'),
		$this->Paginator->sort('place_type_id'),
		$this->Paginator->sort('type'),
		$this->Paginator->sort('level'),
		$this->Paginator->sort('eiin_no'),
		$this->Paginator->sort('seo_name'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('post_office'),
		$this->Paginator->sort('location'),
		$this->Paginator->sort('mobile'),
		$this->Paginator->sort('web'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('address'),
		$this->Paginator->sort('founded'),
		$this->Paginator->sort('teaching_staff'),
		$this->Paginator->sort('hours'),
		$this->Paginator->sort('lat'),
		$this->Paginator->sort('lng'),
		$this->Paginator->sort('metatag'),
		$this->Paginator->sort('keyword'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($institutes as $institute):
		$row = array();
		$row[] = h($institute['Institute']['id']);
		$row[] = $this->Html->link($institute['User']['name'], array(
			'controller' => 'users',
		'action' => 'view',
			$institute['User']['id'],
	));
		$row[] = $this->Html->link($institute['Point']['name'], array(
			'controller' => 'points',
		'action' => 'view',
			$institute['Point']['id'],
	));
		$row[] = $this->Html->link($institute['PlaceType']['name'], array(
			'controller' => 'place_types',
		'action' => 'view',
			$institute['PlaceType']['id'],
	));
		$row[] = h($institute['Institute']['type']);
		$row[] = h($institute['Institute']['level']);
		$row[] = h($institute['Institute']['eiin_no']);
		$row[] = h($institute['Institute']['seo_name']);
		$row[] = h($institute['Institute']['name']);
		$row[] = h($institute['Institute']['post_office']);
		$row[] = h($institute['Institute']['location']);
		$row[] = h($institute['Institute']['mobile']);
		$row[] = h($institute['Institute']['web']);
		$row[] = h($institute['Institute']['email']);
		$row[] = h($institute['Institute']['address']);
		$row[] = h($institute['Institute']['founded']);
		$row[] = h($institute['Institute']['teaching_staff']);
		$row[] = h($institute['Institute']['hours']);
		$row[] = h($institute['Institute']['lat']);
		$row[] = h($institute['Institute']['lng']);
		$row[] = h($institute['Institute']['metatag']);
		$row[] = h($institute['Institute']['keyword']);
		$actions = array($this->Croogo->adminRowActions($institute['Institute']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $institute['Institute']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$institute['Institute']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$institute['Institute']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $institute['Institute']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
