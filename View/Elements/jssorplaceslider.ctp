<?php
echo $this->Html->css('jssorstyle');
echo $this->Html->script('jssor/jquery-1.9.1.min');
echo $this->Html->script('jssor/jssor');
echo $this->Html->script('jssor/jssor.slider.min');
?>

<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 749px;
        height: 456px; background: #fff; overflow: hidden;">
<script>		
jQuery(document).ready(function(b){function a(){var c=b("#slider1_container").parent().width();c?d.$ScaleWidth(c):window.setTimeout(a,30)}var d=new $JssorSlider$("slider1_container",{$AutoPlay:!0,$AutoPlayInterval:1500,$PauseOnHover:1,$DragOrientation:3,$ArrowKeyNavigation:!0,$SlideDuration:800,$SlideshowOptions:{$Class:$JssorSlideshowRunner$,$Transitions:[{$Duration:1200,x:.3,$During:{$Left:[.3,.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,
x:-.3,$SlideOut:!0,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,x:-.3,$During:{$Left:[.3,.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,x:.3,$SlideOut:!0,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,y:.3,$During:{$Top:[.3,.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,
$Outside:!0},{$Duration:1200,y:-.3,$SlideOut:!0,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,y:-.3,$During:{$Top:[.3,.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,y:.3,$SlideOut:!0,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,x:.3,$Cols:2,$During:{$Left:[.3,.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,
$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,x:.3,$Cols:2,$SlideOut:!0,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,y:.3,$Rows:2,$During:{$Top:[.3,.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,y:.3,$Rows:2,$SlideOut:!0,$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},
$Opacity:2},{$Duration:1200,y:.3,$Cols:2,$During:{$Top:[.3,.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,y:-.3,$Cols:2,$SlideOut:!0,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,x:.3,$Rows:2,$During:{$Left:[.3,.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,
$Outside:!0},{$Duration:1200,x:-.3,$Rows:2,$SlideOut:!0,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,x:.3,y:.3,$Cols:2,$Rows:2,$During:{$Left:[.3,.7],$Top:[.3,.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,x:.3,y:.3,$Cols:2,$Rows:2,$During:{$Left:[.3,.7],$Top:[.3,.7]},$SlideOut:!0,
$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:!0},{$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,$Delay:20,$Clip:3,$SlideOut:!0,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,
$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},{$Duration:1200,$Delay:20,$Clip:12,$SlideOut:!0,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}],$TransitionsOrder:1,$ShowLink:!0},$ArrowNavigatorOptions:{$Class:$JssorArrowNavigator$,$ChanceToShow:1},$ThumbnailNavigatorOptions:{$Class:$JssorThumbnailNavigator$,$ChanceToShow:2,$ActionMode:1,$SpacingX:8,$DisplayPieces:10,$ParkingPosition:360}});a();navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)||
b(window).bind("resize",a)});

</script>
    
        <div u="loading" style="position: relative; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #fff; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(/mogo/img/sliderimage/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>
        <div u="slides" style="cursor: move; position: relative; left: 0px; top: 0px; width: 749px; height: 356px; overflow: hidden;">
            
			<?php 
				//debug($placeimage);exit;
				
				$filepath = $foldername;
				foreach ($placeimage as $image){
				echo '<div>';
				$imglink = $filepath.'/photogallery/'.$image['file'];
				echo $this->Html->image($imglink,array('u' =>'image','alt'=>"$placename Slider Image"));
				$tmbimglink = $filepath.'/photogallery/thumbs/'.$image['file'];
				echo $this->Html->image($tmbimglink,array('u' =>'thumb','alt'=>"$placename Slider Thumb"));
				echo '</div>';
				}
			?>
           
        </div>
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 8px;">
        </span>
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
        </span>
        <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 749px; height: 82px; left:0px; bottom: 0px;">
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 75px; height: 75px; top: 0; left: 0;">
                    <div class='w'><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                    <div class='c'>
                    </div>
                </div>
            </div>
        </div>
    </div>