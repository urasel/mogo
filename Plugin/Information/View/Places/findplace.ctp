<style>
.btn-lg, .btn-group-lg > .btn{
	padding:0px 16px;
}
</style>
<?php
echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">';

//debug($places);
$loopcontinue = true;
$groupID = '';
$sectionName = 'section';
$i = 0;
$tagID = '';
foreach($places as $place){
			//$tagID = $place['places']['place_type_id'];
			if($loopcontinue){
				/*HeaderContentStart*/
				$i++;
				$class = $sectionName.'_'.$i;
				$headerTitle = $place['pt']['name'];
				$headingID = 'header'.'_'.$i;
				$icon = $place['pt']['icon'];
				echo '<div class="panel panel-default">';
				echo "<div class='panel-heading' role='tab' id='$headingID'>";
				echo '<h4 class="panel-title">';
				echo "<a class='' data-toggle='collapse' data-parent='#accordion' href='#$class' aria-expanded='false' aria-controls='$class'><i class='$icon'></i>".$headerTitle."</a>";
				echo '</h4>';
				echo '</div>';
				echo "<div id='$class' class='panel-collapse collapse' role='tabpanel' aria-labelledby='$class'>";
				echo '<div class="panel-body">';
				echo '<div class="table-responsive">';
				echo "<table class='table table-bordered'  id='ajaxContent$i'>";
				echo '<thead>';
				echo '<tr>';
				echo '<th>Name</th><th>Direction</th><th>Distance</th>';
				
				echo "</tr></thead><tbody>";
				/*HeaderCondtentEnd*/
				$groupID = $place['places']['place_type_id'];
				$loopcontinue = false;
			}
			//debug($place);
			if($groupID == $place['places']['place_type_id']){
				/*Content Print Start*/
				echo '<tr>';
				echo '<td>'.$place['places']['name'].'</td>';
				echo '<td>';
				//echo $this->Html->link('Direction',array('controller' =>'pages','action' =>'mappath',$accessLat,$accessLng,$place['places']['lat'],$place['places']['lng'],$address),array('target' =>'_blank'));
				echo $this->Html->link('Direction',array('controller' =>'places','action' =>'mappath','?' => array('lat'=>$accessLat,'lng'=>$accessLng,'plat'=> $place['places']['lat'],'plng'=> $place['places']['lng'],'rcord'=> $place['places']['id'],'addr'=>$address)),array('target' =>'_blank'));
				echo '</td>';
				echo '<td>'.round($place[0]['distance'],2).'Km</td>';
				echo '</tr>';
				/*Content Print End*/
				
			}else{
				/*FooterContentStart*/
				//echo '<tr><td colspan="3"><button type="button" class="btn btn-default btn-lg btn-block">Block level button</button></td></tr>';
				echo "<tr><td colspan='3'><button type='button' tag='$i' group='$groupID' class=' ajaxContent btn btn-default btn-lg btn-block'>View More</button></td></tr>";
				echo '</tbody>';
				echo '</table>';
				
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				/*FooterContentEnd*/
				/*HeaderContentStart*/
				$i++;
				$class = $sectionName.'_'.$i;
				$headerTitle = $place['pt']['name'];
				$headingID = 'header'.'_'.$i;
				$icon = $place['pt']['icon'];
				echo '<div class="panel panel-default">';
				echo "<div class='panel-heading' role='tab' id='$headingID'>";
				echo '<h4 class="panel-title">';
				echo "<a class='' data-toggle='collapse' data-parent='#accordion' href='#$class' aria-expanded='false' aria-controls='$class'><i class='$icon'></i>".$headerTitle."</a>";
				echo '</h4>';
				echo '</div>';
				echo "<div id='$class' class='panel-collapse collapse' role='tabpanel' aria-labelledby='$class'>";
				echo '<div class="panel-body">';
				echo '<div class="table-responsive">';
				echo "<table class='table table-bordered'  id='ajaxContent$i'>";
				echo '<thead>';
				echo '<tr>';
				echo '<th>Name</th><th>Direction</th><th>Distance</th>';
				echo "</tr></thead><tbody>";
				/*HeaderCondtentEnd*/
				$groupID = $place['places']['place_type_id'];
				/*Content Print Start*/
				echo '<tr>';
				echo '<td>'.$place['places']['name'].'</td>';
				echo '<td>';
				echo $this->Html->link('Direction',array('controller' =>'places','action' =>'mappath','?' => array('lat'=>$accessLat,'lng'=>$accessLng,'plat'=> $place['places']['lat'],'plng'=> $place['places']['lng'],'rcord'=> $place['places']['id'],'addr'=>$address)),array('target' =>'_blank'));
				echo '</td>';
				echo '<td>'.round($place[0]['distance'],2).'Km</td>';
				echo '<tr>';
				/*Content Print End*/
			}

}
/*FooterContentStart*/
echo "<tr><td colspan='3'><button type='button' tag='$i' group='$groupID' class=' ajaxContent btn btn-default btn-lg btn-block'>View More</button></td></tr>";
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
/*FooterContentEnd*/

echo '</div>';
?>
<script>
$(document).ready(function(){$(".ajaxContent").click(function(){var a=$(this).attr("tag"),b=$(this).attr("group"),c="ajaxContent"+a;$.ajax({dataType:"html",type:"POST",evalScripts:!0,url:"<?php echo Router::url(array('controller'=>'places','action'=>'grouplaces'));?>",data:{groupid:b,lat:"<?php echo $accessLat;?>",lng:"<?php echo $accessLng;?>",address:"<?php echo $address;?>"},success:function(a,b){$("#"+c).html(a)}})})});
</script>
