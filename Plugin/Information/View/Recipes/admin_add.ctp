<?php
$this->viewVars['title_for_layout'] = __d('information', 'Recipes');
$this->extend('/Common/admin_edit');
$dataClass = 'Recipe';

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Recipes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Recipe']['title'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Recipes') . ': ' . $this->request->data['Recipe']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Recipe',array('type'=>'file')));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Recipe'), '#recipe');
	echo $this->Croogo->adminTab(__d('information', 'Photo Gallery'), '#photogallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('recipe');

		echo $this->Form->input('id');

		echo $this->Form->input('title', array(
			'label' =>  __d('information', 'Title'),
		));
		echo $this->Form->input('short_note', array(
			'label' =>  __d('information', 'Short Note'),
		));
		echo $this->Form->input('ingredients', array(
			'label' =>  __d('information', 'Ingredients'),
		));
		echo $this->Form->input('instructions', array(
			'label' =>  __d('information', 'Instructions'),
		));
		echo $this->Form->input('recipe_notes', array(
			'label' =>  __d('information', 'Recipe Notes'),
		));
		echo $this->Form->input('recipe_cuisine_id', array(
			'label' =>  __d('information', 'Recipe Cuisine'),
		));
		echo $this->Form->input('skill_level', array(
			'label' =>  __d('information', 'Skill Level'),
		));
		echo $this->Form->input('prep_time', array(
			'label' =>  __d('information', 'Prep Time'),
		));
		echo $this->Form->input('cook_time', array(
			'label' =>  __d('information', 'Cook Time'),
		));
		echo $this->Form->input('passive_time', array(
			'label' =>  __d('information', 'Passive Time'),
		));
		/*
		echo $this->Form->input('user_id', array(
			'label' =>  __d('information', 'User'),
		));
		*/
		echo $this->Form->input('publish', array(
			'label' =>  __d('information', 'Is Published?'),
		));
		echo $this->Form->input('approved', array(
			'label' =>  __d('information', 'Is Approved?'),
		));

	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('photogallery');
	//debug($this->data);
		/*
		echo '<div class="accomodation">';
		echo '<div class="addMoreBlock">';
		echo $this->Form->input('position', array(
			'label' =>  __d('information', 'Position'),
			'name' => 'data[postimage][position][]',
			'options' => array('Featured','Others'),
		));
		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
			'name' => 'data[postimage][name][]',
		));
		echo $this->Form->input('source', array(
			'label' =>  __d('information', 'Source'),
			'name' => 'data[postimage][source][]',
		));
	//debug($this->data);
		$dataClass = 'TransportRoute';
		echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[postimage][images][]", 'accept'=>"image/*"));
		echo $this->Form->button('Remove',array('type'=>'button','class' => 'blocremoveBtn btn-danger pull-right'));
		?>
		<script>
		$('.blocremoveBtn').click(function(){
			$(this).parent('div').remove();
		});
		</script>
		<?php
		echo '</div>';
		echo '</div>';
		*/
		echo '<div class="accomodationmore">';
			echo '<div class="imageContainer">';
			echo '<div class="addMoreBlock">';
				echo $this->Form->input('position', array(
					'label' =>  __d('information', 'Position'),
					'name' => 'data[postimage][position][]',
					'options' => array('Featured'=>'Featured','Others'=>'Others'),
				));
				echo $this->Form->input('name', array(
					'label' =>  __d('information', 'Name'),
					'name' => 'data[postimage][name][]',
				));
				echo $this->Form->input('source', array(
					'label' =>  __d('information', 'Source'),
					'name' => 'data[postimage][source][]',
				));
			//debug($this->data);
				$dataClass = 'TransportRoute';
				echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[postimage][images][]", 'accept'=>"image/*"));
				echo $this->Form->button('Remove',array('type'=>'button','class' => 'blocremoveBtn btn-danger pull-right'));
				?>
				<script>
				$('.blocremoveBtn').click(function(){
					$(this).parent('div').remove();
				});
				</script>
				<?php
			echo '</div>';
			echo '</div>';
		
		
		echo '</div>';
		echo '<p><a id="add_row" class="addmorebtn btn btn-success pull-left">Add More</a></p>';
		
		?>
		<script>
		$('.addmorebtn').click(function(){
			
			var moreData = $('.imageContainer').html();
			$('.accomodationmore').append(moreData);
		});
		</script>
		<?php
		
	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());
