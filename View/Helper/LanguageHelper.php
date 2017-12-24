﻿<?phpclass LanguageHelper extends AppHelper {	public function banglanumber( $str ) {		$engNumber = array(1,2,3,4,5,6,7,8,9,0);		$bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');		$converted = str_replace($engNumber, $bangNumber, $str);	 		return $converted;	}	public function datediff($created){		$displayDate = '';		$today = new DateTime(date('y-m-d'));		$createdDate = new DateTime($created);			$interval = $createdDate->diff($today);			if($interval->y <= 0 && $interval->m <= 0 && $interval->d > 0){				if($interval->d == 1){				$displayDate = $interval->format('%d day ago');				}else if($interval->d == 7){				$displayDate = $interval->format('1 week ago');				}else{				$displayDate = $interval->format('%d days ago');					}			}else if($interval->y <= 0 && $interval->m <= 0 && $interval->d <= 0){				$displayDate = $interval->format('1 day ago');			}else if($interval->y <= 0 && $interval->m >= 0){				if($interval->m == 1){				$displayDate = $interval->format('%m month ago');				}else{				$displayDate = $interval->format('%m months ago');					}			}else{				if($interval->y == 1){				$displayDate = $interval->format('%y year ago');				}else{				$displayDate = $interval->format('%y years ago');					}			}		return $displayDate;	}	public function bangladate($str){		$replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");		$search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 		// convert all bangle char to English char 		$banglaDate = str_replace($search_array, $replace_array, $str);   		return $banglaDate;	}	/*	public function degreelat($dec) {		$vars = explode(".",$dec);		$deg = $vars[0];		 $deg = str_replace("-", "", "$deg");		$tempma = "0.".$vars[1];		$tempma = $tempma * 3600;		$min = floor($tempma / 60);		$sec = $tempma - ($min*60);		$sec = round("$sec", 2);	 	  if (strpos($dec, '-') !== false) { 	   $latPos = "South ";	   } else {	   $latPos = "North ";	  }	return "$deg&deg;$min&apos;$sec&quot; $latPos";	} 	*/	public function degreelat($dec) {		$vars = explode(".",$dec);		$deg = '';		$tempma = '';		$min = '';		$sec = '';		$latPos = '';		if(is_array($vars) && count($vars) > 1){			$deg = $vars[0];			$deg = str_replace("-", "", "$deg");			$tempma = "0.".$vars[1];			$tempma = $tempma * 3600;			$min = floor($tempma / 60);			$sec = $tempma - ($min*60);			$sec = round("$sec", 2);						if (strpos($dec, '-') !== false) { 			   $latPos = "South ";			   } else {			   $latPos = "North ";			  }		}			return "$deg&deg;$min&apos;$sec&quot; $latPos";	} 	/*	public function degreelng($dec) { 		$vars = explode(".",$dec);		$deg = $vars[0];		 $deg = str_replace("-", "", "$deg");		$tempma = "0.".$vars[1];	 		$tempma = $tempma * 3600;		$min = floor($tempma / 60);		$sec = $tempma - ($min*60);		$sec = round("$sec", 2);	 	  if (strpos($dec, '-') !== false) { 	   $latPos = "West ";	   } else {	   $latPos = "East ";	  }  	return "$deg&deg;$min&apos;$sec&quot; $latPos";	}	*/	public function degreelng($dec) { 		$vars = explode(".",$dec);		$deg = '';		$tempma = '';		$min = '';		$sec = '';		$latPos = '';		if(is_array($vars) && count($vars) > 1){			$deg = $vars[0];			$deg = str_replace("-", "", "$deg");			//debug($vars);			$tempma = "0.".$vars[1];		 			$tempma = $tempma * 3600;			$min = floor($tempma / 60);			$sec = $tempma - ($min*60);			$sec = round("$sec", 2);		 		  if (strpos($dec, '-') !== false) { 		   $latPos = "West ";		   } else {		   $latPos = "East ";		  }  		}	return "$deg&deg;$min&apos;$sec&quot; $latPos";	}}