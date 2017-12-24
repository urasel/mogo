<?php
$this->viewVars['title_for_layout'] = __d('information', 'Place Type Slugs');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Place Type Slugs'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['PlaceTypeSlug']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Place Type Slugs') . ': ' . $this->request->data['PlaceTypeSlug']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('PlaceTypeSlug'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Place Type Slug'), '#place-type-slug');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('place-type-slug');

		echo $this->Form->input('id');

		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo '<div class="input_fields_wrap">';
		echo '<div class="optioncontainer">';
		echo '<div class="row-fluid">';
			echo '<div class="span10">';
			echo $this->Form->input('title',array('label'=>false,'name' =>'data[PlaceTypeSlug][title][0]','placeholder'=>"Title of Search"));
			echo $this->Form->input('slug',array('label'=>false,'name' =>'data[PlaceTypeSlug][slug][0]','placeholder'=>"Slug"));
			echo $this->Form->input('params',array('label'=>false,'name' =>'data[PlaceTypeSlug][params][0]','placeholder'=>"Search Params"));
			echo '</div>';
			echo '<div class="span1">';
			echo '<p class="remove_field">Remove</p>';
			echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<button class="add_field_button">Add More Option</button>';
		?>
		<script>
			$(document).ready(function() {
				var max_fields      = 8; //maximum input boxes allowed
				var wrapper         = $(".input_fields_wrap"); //Fields wrapper
				var add_button      = $(".add_field_button"); //Add button ID
			   
				var x = 0; //initlal text box count
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					if(x < max_fields){ //max input box allowed
						x++; //text box increment
						$(wrapper).append('<div>'+
							'<div class="optioncontainer"><div class="row-fluid"><div class="span10"><div class="input text"><input type="text" id="PlaceTypeSlugTitle" maxlength="255" data-title="Title of Search" data-trigger="focus" data-placement="right" placeholder="Title of Search" class="input-block-level" name="data[PlaceTypeSlug][title]['+x+']" data-original-title="" title=""></div><div class="input text required"><input type="text" required="required" id="PlaceTypeSlugSlug" maxlength="50" data-title="Slug" data-trigger="focus" data-placement="right" placeholder="Slug" class="input-block-level" name="data[PlaceTypeSlug][slug]['+x+']" data-original-title="" title=""></div><div class="input text"><input type="text" id="PlaceTypeSlugParams" maxlength="255" data-title="Search Params" data-trigger="focus" data-placement="right" placeholder="Search Params" class="input-block-level" name="data[PlaceTypeSlug][params]['+x+']" data-original-title="" title=""></div></div><div class="span1"><p class="remove_field">Remove</p></div></div></div>'
							); //add input box
					}
				});
			   
				$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
					e.preventDefault(); 
					$(this).parent('div').parent('div').parent('div').remove(); x--;
				})
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
