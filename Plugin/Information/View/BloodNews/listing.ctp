<?php
	  $this->loadHelpers(array('Language'));
	  $currentLng = $this->Session->read('Config.language');
	  $this->Html->addCrumb(__('Blood Needed'),'',array('class' => 'active')) ;
     
?>
<?php
echo '<h1>'.$title_for_layout.'</h1>';
echo '<div class="row"><div class="col-md-8">';
	echo '<div class="panel panel-info" style="margin-top:0px;">';
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		
		foreach($bloodNews as $news):
		//debug($news);
		$controller = 'blood_news';
		$modelName = 'BloodNews';
		echo '<div class="col-md-12">';
				if($currentLng == 'bn'){
					$languageID = 2;
				}else{
					$languageID = 1;
				}
				if(isset($news[$modelName.'Detail']['language_id'])){
					if($news[$modelName.'Detail']['language_id'] == $languageID && !empty($news[$modelName.'Detail']['details'])){
						$newsname = '<i class="fa fa-tint"></i> <span class="title">'.$news['BloodGroup']['name'].__(' Blood Needed').'</span>';
						$shortDescription = $news[$modelName.'Detail']['details'];
						$address = $news[$modelName.'Detail']['address'];
					}else if($news[$modelName.'Detail']['language_id'] == $languageID && !empty($news[$modelName.'Detail']['details'])){
						$newsname = '<i class="fa fa-tint"></i> <span class="title">'.$news['BloodGroup']['name'].__(' Blood Needed').'</span>';
						$shortDescription = $news[$modelName.'Detail']['details'];
						$address = $news[$modelName.'Detail']['address'];
					}else if(!empty($news[$modelName.'Detail']['details'])){
						$newsname = '<i class="fa fa-tint"></i> <span class="title">'.$news['BloodGroup']['name'].__(' Blood Needed').'</span>';
						$shortDescription = $news[$modelName.'Detail']['details'];
						$address = $news[$modelName.'Detail']['address'];
					}else if(!empty($news[$modelName.'Detail']['details'])){
						$newsname = '<i class="fa fa-tint"></i> <span class="title">'.$news['BloodGroup']['name'].__(' Blood Needed').'</span>';
						$shortDescription = $news[$modelName.'Detail']['details'];
						$address = $news[$modelName.'Detail']['address'];
					}
				}else{
					$newsname = '<i class="fa fa-tint"></i> <span class="title">'.$news['BloodGroup']['name'].__(' Blood Needed').'</span>';
					$shortDescription = $news[$modelName.'Detail']['details'];
					$address = $news[$modelName.'Detail']['address'];
		
				}
				
		//echo $this->Html->link($news['Point']['name'],array('controller' =>'pages','action' =>'categoryitem','?' => array('group'=> $news['PlaceType']['seo_name'],'place'=> $news['Point']['seo_name'],'id'=> $news['Point']['id'])));
		echo $this->Html->link($newsname, array('controller'=>'blood_news','action'=>'view','id'=> $news['BloodNews']['id'],'ext' => 'asp'),array('escape'=>false,'alt' =>$shortDescription));
		
		echo '<p>'.$shortDescription.'</p>';			
		echo '<p><b>'.__('Mobile').'</b>: '.$news['BloodNews']['mobile'].'</p>';			
		echo '<p><b>'.__('Address').'</b>: '.$address.'</p>';			
		if(in_array($userID,array('1'))){
		echo $this->Html->link(' [Edit]',array('controller'=>'points','action'=>$controller.'edit',$news[$modelName]['id']));
		}
		echo '<hr></hr>';
		echo '</div>';
		endforeach;
	echo '</div>';
	?>
	<div class="paging">
		<ul class="pagination">
		<?php
		echo $this->Paginator->prev(__('&laquo;'), array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next(__('&raquo;'), array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		?>
		</ul> 
	</div>
	<p>
	<?php
	
	if($currentLng == 'bn'){
		//$totalEntry = $this->Language->banglanumber($category[0]['total']);
		echo $this->Language->banglanumber($this->Paginator->counter(array('format' => __('Showing {:start}-{:end} records out of {:count} Total'))));
	}else{
		echo $this->Paginator->counter(array(
		'format' => __('Showing {:start}-{:end} records out of {:count} Total')
		));
	}
	
	?>	
	</p>
	<?php
	echo '</div>';
	echo '<div class="col-md-4">';
	
	echo '</div>';
echo '</div>';
				
?>
<script>
$(document).ready(function(){
		var $container = $('#posts-list2');

		$container.infinitescroll({
		  navSelector  : '.next',    // selector for the paged navigation 
		  nextSelector : '.next a',  // selector for the NEXT link (to page 2)
		  itemSelector : '.post-item',     // selector for all items you'll retrieve
		  debug		 	: true,
		  dataType	 	: 'html',
		  loading: {
			  finishedMsg: 'No more posts to load. All Hail Star Wars God!',
			  img: '<?php echo $this->webroot; ?>img/loading.gif'
			}
		  }
		);
		
		$('#btn-search').on('click', function(e) {

			e.preventDefault();
			$('#search').animate({width: 'toggle'}).focus();

		});
});
</script>