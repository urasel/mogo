<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));


$this->Html->addCrumb(__d('croogo', 'Topic Add'), '/' . $this->request->url);


$this->append('form-start', $this->Form->create('Point'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'General Information'), '#point');
	echo $this->Croogo->adminTab(__d('information', 'Bangla Data'), '#bangla');
	echo $this->Croogo->adminTab(__d('information', 'English Data'), '#english');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('point');

		echo $this->Form->input('x1', array('name' => 'data[Crop][x1]','type'=>'hidden','id'=>'x1'));		
		echo $this->Form->input('y1', array('name' => 'data[Crop][y1]','type'=>'hidden','id'=>'y1'));
		echo $this->Form->input('x2', array('name' => 'data[Crop][x2]','type'=>'hidden','id'=>'x2'));		
		echo $this->Form->input('y2', array('name' => 'data[Crop][y2]','type'=>'hidden','id'=>'y2'));
		echo $this->Form->input('w', array('name' => 'data[Crop][w]','type'=>'hidden','id'=>'w'));		
		echo $this->Form->input('h', array('name' => 'data[Crop][h]','type'=>'hidden','id'=>'h'));

		echo $this->Form->input('countryid', array('label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		echo $this->Form->input('country_id', array('type' =>'hidden','id'=>'CountryId','empty'=>'Country Name'));
		echo '<div id="zoneDiv"></div>';
		echo '<div id="districtDiv"></div>';
		echo '<div id="thanaDiv"></div>';
		echo '<span class="locationdiv">';
		echo $this->Form->input('location', array('placeholder'=>'Type Area Name','tabindex'=> "5"));
		echo '</span>';
		echo $this->Form->input('maplocation', array('id'=>'maplocation','type'=>'hidden'));
		echo $this->Form->input('address', array('label'=>'Address','tabindex'=> "6"));
		
		echo $this->Form->input('place_type_id', array('tabindex'=> "1"));
		?>
		<p class="error"></p>
		<input type="file" name="data[Topic][image]" id="image_file" onchange="fileSelectHandler()" />
		<img id="preview" />
		<?php
		

	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('bangla');
				echo $this->Form->input('Topic.bn.languageid', array('type'=>'hidden','value'=>2,'label'=>'Topic Name','tabindex'=> "2"));
				echo $this->Form->input('Topic.bn.name', array('label'=>'Topic Name','tabindex'=> "1","data-validation" => "required"));
				echo $this->Form->input('Topic.bn.short_description', array('rows'=> 2,'label'=>'Short Description','tabindex'=> "2","data-validation" => "required"));
				echo $this->Form->input('Topic.bn.details', array('type'=>'textarea','label'=>'Details  [For Language Change Type ctrl+ g]','tabindex'=> "3"));
				echo $this->Form->input('Topic.bn.keyword', array('label'=>'Keyword','tabindex'=> "5"));
				echo $this->Form->input('Topic.bn.metatag', array('label'=>'Meta Description','tabindex'=> "6"));
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
				echo $this->Form->input('Topic.en.languageid', array('type'=>'hidden','value'=>1,'label'=>'Topic Name','tabindex'=> "1"));
				echo $this->Form->input('Topic.en.name', array('label'=>'Topic Name','tabindex'=> "1"));
				echo $this->Form->input('Topic.en.short_description', array('rows'=> 2,'label'=>'Short Description','tabindex'=> "2"));
				//echo $this->Form->input('Topic.en.details', array('type'=>'textarea','class'=>'form-control ckeditor','label'=>'Details','tabindex'=> "3"));
				echo $this->Form->input('Topic.en.details', array('type'=>'textarea','label'=>'Details  [For Language Change Type ctrl+ g]','tabindex'=> "3"));
				echo $this->Form->input('Topic.en.keyword', array('label'=>'Keyword','tabindex'=> "5"));
				echo $this->Form->input('Topic.en.metatag', array('label'=>'Meta Description','tabindex'=> "6"));
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
