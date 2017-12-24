<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));

if ($this->action == 'topicedit') {
	$this->Html->addCrumb($this->request->data['Point']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Points') . ': ' . $this->request->data['Point']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Point',array('type'=>'file')));
//debug($this->request->data);
$this->append('tab-heading');
	
	echo $this->Croogo->adminTab(__d('information', 'English Data'), '#english');
	echo $this->Croogo->adminTab(__d('information', 'Bangla Data'), '#bangla');
	echo $this->Croogo->adminTab(__d('information', 'General Information'), '#point');
	echo $this->Croogo->adminTab(__d('information', 'Location'), '#location');
	echo $this->Croogo->adminTab(__d('information', 'Publishing'), '#publish');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('bangla');
				echo $this->Form->unlockField('TopicData.1.languageid');
				echo $this->Form->input('id');
				echo $this->Form->input('TopicData.1.id', array('type'=>'hidden','tabindex'=> "1"));
				echo $this->Form->input('TopicData.1.languageid', array('type'=>'hidden','value'=>2,'label'=>'Topic Name','tabindex'=> "2"));
				echo $this->Form->input('TopicData.1.name', array('label'=>'Topic Name','tabindex'=> "1","data-validation" => "required"));
				echo $this->Form->input('TopicData.1.short_description', array('rows'=> 2,'label'=>'Short Description','tabindex'=> "2","data-validation" => "required"));
				echo $this->Form->input('TopicData.1.details', array('type'=>'textarea','label'=>'Details  [For Language Change Type ctrl+ g]','tabindex'=> "3"));
				echo $this->Form->input('TopicData.1.keyword', array('label'=>'Keyword','tabindex'=> "5"));
				echo $this->Form->input('TopicData.1.metatag', array('label'=>'Meta Description','tabindex'=> "6"));
				?>
				<script src="https://www.google.com/jsapi" type="text/javascript"></script>
				<script type="text/javascript" language="javascript">
					google.load("elements", "1", {
						packages: "transliteration"
					});

					function onLoad() {
						var options = {
							sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
							destinationLanguage: [google.elements.transliteration.LanguageCode.BENGALI],
							shortcutKey: 'ctrl+g',
							transliterationEnabled: true
						};
							
					var control = new google.elements.transliteration.TransliterationControl(options);
					control.makeTransliteratable(['TopicBnName','TopicBnShortDescription','TopicBnDetails','TopicBnKeyword','TopicBnMetatag']);
					}
					google.setOnLoadCallback(onLoad);
				</script>
				<?php
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('english');
				echo $this->Form->unlockField('TopicData.0.languageid');
				echo $this->Form->input('TopicData.0.id', array('type'=>'hidden','tabindex'=> "1"));
				echo $this->Form->input('TopicData.0.languageid', array('type'=>'hidden','value'=>1,'label'=>'Topic Name','tabindex'=> "1"));
				echo $this->Form->input('TopicData.0.name', array('label'=>'Topic Name','tabindex'=> "1"));
				echo $this->Form->input('TopicData.0.short_description', array('rows'=> 2,'label'=>'Short Description','tabindex'=> "2"));
				//echo $this->Form->input('en.details', array('type'=>'textarea','class'=>'form-control ckeditor','label'=>'Details','tabindex'=> "3"));
				echo $this->Form->input('TopicData.0.details', array('type'=>'textarea','label'=>'Details  [For Language Change Type ctrl+ g]','tabindex'=> "3"));
				echo $this->Form->input('TopicData.0.keyword', array('label'=>'Keyword','tabindex'=> "5"));
				echo $this->Form->input('TopicData.0.metatag', array('label'=>'Meta Description','tabindex'=> "6"));
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('point');

		echo $this->Form->input('id');
		echo $this->Form->input('place_type_id', array('tabindex'=> "1"));
		echo $this->Form->unlockField('Crop.x1');
		echo $this->Form->unlockField('Crop.y1');
		echo $this->Form->unlockField('Crop.x2');
		echo $this->Form->unlockField('Crop.y2');
		echo $this->Form->unlockField('Crop.w');
		echo $this->Form->unlockField('Crop.h');
		echo $this->Form->input('Crop.x1', array('type'=>'hidden','id'=>'x1'));		
		echo $this->Form->input('Crop.y1', array('type'=>'hidden','id'=>'y1'));
		echo $this->Form->input('Crop.x2', array('type'=>'hidden','id'=>'x2'));		
		echo $this->Form->input('Crop.y2', array('type'=>'hidden','id'=>'y2'));
		echo $this->Form->input('Crop.w', array('type'=>'hidden','id'=>'w'));		
		echo $this->Form->input('Crop.h', array('type'=>'hidden','id'=>'h'));
		
		echo $this->Form->input('active', array('class'=>'checkbox','label'=>'Active','tabindex'=> "8"));
		
		?>
		<?php
		echo '<p class="error"></p>';
		echo $this->Form->unlockField('image');
		echo $this->Form->input('newimage', array('type'=>'file','id'=>'image_file','onchange'=>'fileSelectHandler()'));
		//echo $this->Html->image('sago.jpg',array('id'=>'preview'));
		//echo '<img id="preview" />';
		$imglink = "topics/large/".$this->data['Point']['image'];
		echo $this->Html->image($imglink,array('id'=>'preview'));
		?>
		<?php
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('location');
	
		if(!empty($this->data['Country']['name'])){
		echo '<div class="input text"><label for="CountryID">Country : </label>'.$this->data['Country']['name'].'</div>';
		}
		if(!empty($this->data['BdDivision']['name'])){
		echo '<div class="input text"><label for="DivisionID">Division : </label>'.$this->data['BdDivision']['name'].'</div>';
		}
		if(!empty($this->data['BdDistrict']['name'])){
		echo '<div class="input text"><label for="DistrictID">District : </label>'.$this->data['BdDistrict']['name'].'</div>';
		}
		if(!empty($this->data['BdThanas']['name'])){
		echo '<div class="input text"><label for="ThanaID">Thana : </label>'.$this->data['BdThanas']['name'].'</div>';
		}
	
	
		echo $this->Form->input('countryid', array('label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		echo $this->Form->input('Location.country_id', array('type' =>'hidden','id'=>'CountryId','empty'=>'Country Name'));
		echo '<div id="zoneDiv"></div>';
		echo '<div id="districtDiv"></div>';
		echo '<div id="thanaDiv"></div>';
		echo '<span class="locationdiv">';
		echo $this->Form->input('Location.location', array('placeholder'=>'Type Area Name','tabindex'=> "5"));
		echo '</span>';
		echo $this->Form->input('Location.maplocation', array('id'=>'maplocation','type'=>'hidden'));
		echo $this->Form->input('Location.address', array('label'=>'Address','tabindex'=> "6"));
		
		echo $this->Form->input('loadmap', array('type'=>'checkbox','class'=>'checkbox','label'=>'Topic Location','tabindex'=> "9"));
		echo '<div class="panel-heading">Click On the MAP to Save Location</div>';
		?>
		<input id="mapinput" type="hidden" style="width: 80%;" value="Institut Teknologi Telkom, Sukapura, Dayeuhkolot, Bandung 40257, Indonesia" maxlength="100">
		<div id="google_map"></div>
		
		<?php
	echo $this->Html->tabEnd();
	echo $this->Html->tabStart('publish');
		echo $this->Form->input('popular', array('class'=>'checkbox','type'=>'checkbox','label'=>'Popular Topic ?','tabindex'=> "16"));
		echo $this->Form->input('active', array('class'=>'checkbox','label'=>'Active','tabindex'=> "16"));
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
$this->Js->alert('Hey there');
$this->append('form-end', $this->Form->end());
