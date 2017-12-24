<?php
App::uses('Component', 'Controller');
class ImageresizerComponent extends Component{
		public function resize($original, $new_filename, $new_width = 0, $new_height = 0,$watermark = false,$waterimage, $quality = 100) {
			ini_set('max_execution_time', '800');
			ini_set('memory_limit', '-1');
			ini_set('post_max_size', '64M');
			if(!($image_params = getimagesize($original))) {
				$this->__errors[] = 'Original file is not a valid image: ' . $orignal;
				return false;
			}
			
			$width = $image_params[0];
			$height = $image_params[1];
			
			
			
			if ($width > $height) {
			$percentage = ($new_width / $width);
			} else {
			$percentage = ($new_height / $height);
			}
			//gets the new value and applies the percentage, then rounds the value
			$scaled_width = round($width * $percentage);
			$scaled_height = round($height * $percentage);
				 
			$ext = $image_params[2];
			switch($ext) {
				case IMAGETYPE_GIF:
					$return = $this->__resizeGif($original, $new_filename,$new_width,$new_height, $scaled_width, $scaled_height, $width, $height,$watermark, $waterimage,$quality);
					break;
				case IMAGETYPE_JPEG:
					$return = $this->__resizeJpeg($original, $new_filename,$new_width , $new_height,  $scaled_width, $scaled_height, $width, $height,$watermark,$waterimage, $quality);
					break;
				case IMAGETYPE_PNG:
					$return = $this->__resizePng($original, $new_filename, $new_width , $new_height,  $scaled_width, $scaled_height, $width, $height,$watermark,$waterimage, $quality);
					break;    
				default:
					$return = $this->__resizeJpeg($original, $new_filename, $scaled_width, $scaled_height, $width, $height,$watermark, $quality);
					break;
			}
			
			return $return;
		}
    
    public function getErrors() {
        return $this->__errors;
    }
    
    private function __resizeGif($original, $new_filename, $new_width , $new_height, $scaled_width, $scaled_height, $width, $height,$watermark,$waterimage, $quality) {
       $photo = imagecreatefromgif($original); 
		$photoFrame = imagecreatetruecolor($new_width,$new_height); 
		imagefilledrectangle($photoFrame, 0, 0, $new_width, $new_height, imagecolorallocate($photoFrame, 255, 255, 255));
		$c_x = ($new_width /2)-($scaled_width/2);
		$c_y = ($new_height/2) -($scaled_height/2);
		imagecopyresampled($photoFrame, $photo, $c_x, $c_y, 0, 0, $scaled_width, $scaled_height, $width, $height); 
		if($watermark){
		$watermark = $waterimage;
		$logoImage = imagecreatefrompng($watermark); 
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($logoImage);
		$sy = imagesy($logoImage);
		imagecopy($photoFrame, $logoImage, imagesx($photoFrame) - $sx - $marge_right, imagesy($photoFrame) - $sy - $marge_bottom, 0, 0, imagesx($logoImage), imagesy($logoImage));
		}
		imagegif($photoFrame, $new_filename, $quality); 
		imagedestroy($photoFrame);
		return false;
    }
    
    private function __resizeJpeg($original, $new_filename,$new_width , $new_height,  $scaled_width, $scaled_height, $width, $height,$watermark,$waterimage, $quality) {
        $photo = imagecreatefromjpeg($original); 
		$photoFrame = imagecreatetruecolor($new_width,$new_height); 
		imagefilledrectangle($photoFrame, 0, 0, $new_width, $new_height, imagecolorallocate($photoFrame, 255, 255, 255));

		$c_x = ($new_width /2)-($scaled_width/2);
		$c_y = ($new_height/2) -($scaled_height/2);
		
		imagecopyresampled($photoFrame, $photo, $c_x, $c_y, 0, 0, $scaled_width, $scaled_height, $width, $height);
		if($watermark){
		$watermark = $waterimage;
		$logoImage = imagecreatefrompng($watermark); 
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($logoImage);
		$sy = imagesy($logoImage);
		imagecopy($photoFrame, $logoImage, imagesx($photoFrame) - $sx - $marge_right, imagesy($photoFrame) - $sy - $marge_bottom, 0, 0, imagesx($logoImage), imagesy($logoImage));
		}
		imagejpeg($photoFrame, $new_filename, $quality); 
		imagedestroy($photoFrame);
		return false;
      
    }
    
    private function __resizePng($original, $new_filename,$new_width , $new_height,  $scaled_width, $scaled_height, $width, $height,$watermark,$waterimage,  $quality) {
        $error = false;
        
        $quality = ceil($quality / 10); // 0 - 100 value
        if(0 == $quality) {
            $quality = 9;
        } else {
            $quality = ($quality - 1) % 9;
        }

        
        if(!($src = imagecreatefrompng($original))) {
            $this->__errors[] = 'There was an error creating your resized image (png).';
            $error = true;
        }
        
        if(!($tmp = imagecreatetruecolor($new_width,$new_height))) {
            $this->__errors[] = 'There was an error creating your true color image (png).';
            $error = true;
        }
        imagefilledrectangle($tmp, 0, 0, $new_width, $new_height, imagecolorallocate($tmp, 255, 255, 255));
        imagealphablending($tmp, false);
        
        $c_x = ($new_width /2)-($scaled_width/2);
		$c_y = ($new_height/2) -($scaled_height/2);
		imagecopyresampled($tmp, $src, $c_x, $c_y, 0, 0, $scaled_width, $scaled_height, $width, $height); 
        
        imagesavealpha($tmp, true);
		if($watermark){
		$watermark = $waterimage;
		$logoImage = imagecreatefrompng($watermark); 
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($logoImage);
		$sy = imagesy($logoImage);
		imagecopy($photoFrame, $logoImage, imagesx($photoFrame) - $sx - $marge_right, imagesy($photoFrame) - $sy - $marge_bottom, 0, 0, imagesx($logoImage), imagesy($logoImage));
		}
        
        if(!($new_image = imagepng($tmp, $new_filename, $quality))) {
            $this->__errors[] = 'There was an error writing your image to file (png).';
            $error = true;
        }
        
        imagedestroy($tmp);
        //ob_flush();
        if(false == $error) {
            return $new_image;
			ob_flush();
        }
		
        return false;
		
    }
}
