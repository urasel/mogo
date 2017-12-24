<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));

if ($this->action == 'admin_animaledit') {
	$this->Html->addCrumb($this->request->data['Point']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Points') . ': ' . $this->request->data['Point']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Point',array('type'=>'file','url' => array('action' =>'animaledit') )));


$this->append('tab-heading');
	
	echo $this->Croogo->adminTab(__d('information', 'Animal Information'), '#place');
	echo $this->Croogo->adminTab(__d('information', 'Photo Gallery'), '#photogallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');
	//debug($this->request->data);
	$dataClass = ucfirst($this->request->data['PlaceType']['singlename']);
	$imageClass = $dataClass.'Image';
	echo $this->Html->tabStart('place');
		echo $this->Form->input($dataClass.'.id');	
		echo $this->Form->input('Point.place_type_id');		
		echo $this->Form->input($dataClass.'.kingdom');	
		echo $this->Form->input($dataClass.'.rank');	
		echo $this->Form->input($dataClass.'.name');	
		echo $this->Form->input($dataClass.'.bn_name');		
		echo $this->Form->input($dataClass.'.counters');		
		echo $this->Form->input($dataClass.'.family');		
		echo $this->Form->input($dataClass.'.species');		
		echo $this->Form->input($dataClass.'.genus');		
		echo $this->Form->input($dataClass.'.scientific_name');		
		echo $this->Form->input($dataClass.'.breeding_range');
		echo $this->Form->input($dataClass.'.youtube');	
		if(isset($this->data[$dataClass]['youtube'])){
		$fileTag = $this->data[$dataClass]['youtube'];
		echo "<iframe width='420' height='315' src='http://www.youtube.com/embed/$fileTag?autoplay=0'></iframe>"; 
		}
		echo $this->Form->input($dataClass.'.seo_name');	
		echo $this->Form->input($dataClass.'.keyword');	
		echo $this->Form->input($dataClass.'.metatag');	
		echo $this->Form->input($dataClass.'.bn_metatag');	
		echo $this->Form->input($dataClass.'.address');	
		echo $this->Form->input($dataClass.'.details');	
		echo $this->Form->input($dataClass.'.bn_details');	
		echo $this->Form->input($dataClass.'.popular');	
		echo $this->Form->input($dataClass.'.private');	
		$placeTypeName = $this->data['PlaceType']['name'];
		echo $this->Form->input('Point.placeTypeName', array('type'=>'hidden','value' => "$placeTypeName"));
		echo $this->Form->input('Point.id');	
		echo $this->Form->input('Point.active');	
			
	echo $this->Html->tabEnd();

	
	echo $this->Html->tabStart('photogallery');
	//debug($this->data);
		if(isset($this->data[$imageClass]) && count($this->data[$imageClass]) > 0){
			foreach ($this->data[$imageClass] as $image){
				$imageID = 'del-'.$image['id'];
				$imageConID = 'condel-'.$image['id'];
				echo "<div class='tab-pane'  id='$imageConID' style='width:200px;'>";
				$imglink = "animals/photogallery/".$image['file'];
				echo $this->Html->image($imglink,array('class' =>'snapimageimg img-responsive'));
				echo "<button class='btn btn-danger fulldelbtn' id='$imageID' type='button'>Detele Image</button>";
				echo '</div>';
			}
		}
		echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','multiple'=>'multiple','name' =>"data[$dataClass][images][]"));
		?>
		<script>
		$('.fulldelbtn').click(function(){
				var delID = $(this).attr('id');
				var modelname = "<?php echo $dataClass.'Image'; ?>";
				var foldername = "<?php echo $this->data['PlaceType']['pluralname']; ?>";
				var classname = "<?php echo $dataClass; ?>";
				var classid = "<?php echo $this->data[$dataClass]['id']; ?>";
				var classImageFile = "<?php echo $this->data[$dataClass]['image']; ?>";
				$.ajax({
					dataType: "html",
					type: "POST",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/information/hospital_images/ajaxdelete',
					data: ({imageid:delID,modelName:modelname,folder:foldername,classname:classname,classid:classid,classImageFile:classImageFile}),
					success: function (data, textStatus){
						$("#con"+delID).remove();
				 
					}
			});
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
		//$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();
$this->Js->alert('Hey there');
$this->append('form-end', $this->Form->end());
