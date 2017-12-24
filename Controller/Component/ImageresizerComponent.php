<?php
App::uses('Component', 'Controller');
class ImageresizerComponent extends Component{
		public function resize($source_file, $new_filename, $max_width = 0, $max_height = 0,$watermark = false,$waterimage, $quality = 100) {
			ini_set('max_execution_time', '800');
			ini_set('memory_limit', '-1');
			ini_set('post_max_size', '64M');
			if(!($image_params = getimagesize($source_file))) {
				$this->__errors[] = 'Original file is not a valid image: ' . $orignal;
				return false;
			}
			
			$imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
	
	if($watermark){
		$watermark = $waterimage;
		$logoImage = imagecreatefrompng($watermark); 
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($logoImage);
		$sy = imagesy($logoImage);
		imagecopy($dst_img, $logoImage, imagesx($dst_img) - $sx - $marge_right, imagesy($dst_img) - $sy - $marge_bottom, 0, 0, imagesx($logoImage), imagesy($logoImage));
	}
     
    $image($dst_img, $new_filename, $quality);
 
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}

}
