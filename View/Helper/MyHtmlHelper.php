<?php
App::uses('HtmlHelper', 'View/Helper');
class MyHtmlHelper extends HtmlHelper {
	public function url($url = null, $full = false) {
		//debug($url);exit;
        if(!isset($url['language']) && isset($this->params['language'])) {
          $url['language'] = $this->params['language'];
        }
        return parent::url($url, $full);
   }
   public function format_opening_hour($time) {
	  if ($time == '24:00') {
		$new_time = '<b>Midnight</b>';
	  }
	  else {
		list($hours, $minutes) = explode(':', $time);
		$hours = ltrim($hours, '0');
		$am_pm = ($hours >= 12) ? ' PM' : ' AM';
		if ($hours > 12) $hours -= 12;
		$new_time = $hours;
		if ($minutes != '00') {
		  $new_time .= '.'.$minutes;
		}
		$new_time .= '<b>'.$am_pm.'</b>';
	  }
	  return $new_time;
	}
	
	
	
	public function opening_hours_table($opening_hours, $extra_text='', $short_day_names=false) {
	  $dow = array(
	    array('long' => 'Saturday', 'short' => 'Sat'),
		array('long' => 'Sunday', 'short' => 'Sun'),
		array('long' => 'Monday', 'short' => 'Mon'),
		array('long' => 'Tuesday', 'short' => 'Tue'),
		array('long' => 'Wednesday', 'short' => 'Wed'),
		array('long' => 'Thursday', 'short' => 'Thu'),
		array('long' => 'Friday', 'short' => 'Fri')
		
	  );
	  $key = ($short_day_names) ? 'short' : 'long';

	  // first, find similar days and group them together
	  if (!empty($opening_hours)) {
		  //debug($opening_hours);exit;
		$opening_short = array();
		// start with current day
		for ($i=0; $i<7; $i++) {
		  $temp = array($i);
		  // try to find matching adjacent days
		  for ($j=$i+1;$j<7;$j++) {
			if (empty($opening_hours[$i]['optional_text']) &&
				empty($opening_hours[$j]['optional_text']) &&
				$opening_hours[$i]['open'] == $opening_hours[$j]['open'] &&
				$opening_hours[$i]['closed'] == $opening_hours[$j]['closed'] ||
				!empty($opening_hours[$i]['optional_text']) &&
				!empty($opening_hours[$j]['optional_text']) &&
				strtolower($opening_hours[$i]['optional_text']) == strtolower($opening_hours[$j]['optional_text']) ) {
			  // we have a match, store the day
			  $temp[] = $j;
			  if ($j == 6) $i = 6; // edge case
			}
			else {
			  // otherwise, move on to the next day
			  $i = $j-1;
			  $j = 7; // break
			}
		  }
		  $opening_short[] = $temp; // $temp will be an array of matching days (possibly only 1 day)
		}
	  }

	  $html = '<table>';
	  $colspan = '';
	  $todayIs = date('D');
	  if (!empty($opening_short)) {
		$colspan = ' colspan="3"';
		foreach ($opening_short as $os) {
		  $day_text = $dow[$os[0]][$key];
		  $forMatchDay = $dow[$os[0]]['short'];
		  if (count($os) > 1) { // if there's another, adjacent day with the same time
			$end = array_pop($os); // get the last one
			$end = $dow[$end][$key];
			$day_text = $day_text . ' - ' . $end; // append the day to the string
		  }
		  $hours_text = '';
		  // at this point, $day_text will be something like 'Monday' or 'Monday - Thursday'
		  if (!empty($opening_hours[$os[0]]['optional_text'])) {
			// optional string takes precedent over any opening hours that may be set
			$hours_text = htmlentities($opening_hours[$os[0]]['optional_text']);
		  }elseif (!empty($opening_hours[$os[0]]['open']) && !empty($opening_hours[$os[0]]['closed']) && empty($opening_hours[$os[0]]['optional_text']) && $forMatchDay == $todayIs) {
			
			$currentTime = strtotime(date('H:i'));
			$openTm = strtotime($opening_hours[$os[0]]['open']);
			$closeTm = strtotime($opening_hours[$os[0]]['closed']);
			if($currentTime > $openTm && $currentTime < $closeTm){
				$html .= '<tr>
					<td>'.$day_text.'</td>
					<td>:&nbsp;</td>
					<td>'.$hours_text.'<span class="openhour">(Open Now)</span></td>
				  </tr>';
			}else{
				$html .= '<tr>
					<td>'.$day_text.'</td>
					<td>:&nbsp;</td>
					<td>'.$hours_text.'<span class="closehour">(Closed Now)</span></td>
				  </tr>';
			}
			
		  }
		  elseif (!empty($opening_hours[$os[0]]['open'])) {
			// otherwise generate something like '9am - 5.30pm'
			$hours_text = $this->format_opening_hour($opening_hours[$os[0]]['open']) . ' - ' .$this->format_opening_hour($opening_hours[$os[0]]['closed']);
		  }
		  else {
			// if nothing, it must be closed on that day/days
			$hours_text = 'Closed';
		  }
		  // new row for our table
		  $html .= '<tr>
			<td>'.$day_text.'</td>
			<td>:&nbsp;</td>
			<td>'.$hours_text.'</td>
		  </tr>';
		}
	  }

	  // append the extra block of text at the end of the table
	  if (!empty($extra_text)) {
		$html .= '<tr>
		  <td'.$colspan.'>'.htmlentities($extra_text).'</td>
		</tr>';
	  }

	  $html .= '</table>';
	  return $html;
	}

}
