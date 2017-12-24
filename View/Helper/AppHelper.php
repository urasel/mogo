<?php

App::uses('CroogoAppHelper', 'Croogo.View/Helper');


/**
 * Base Application Helper
 *
 * @package  Croogo
 * @link     http://www.croogo.org
 */
class AppHelper extends CroogoAppHelper {
	public function url($url = null, $full = false) {
			if(is_array($url)){
				//debug($this->params);
	            if(!isset($url['language']) && isset($this->params['language'])) {

	              $url['language'] = $this->params['language'];

	            }

	        }
		//debug($url);
		
        return parent::url($url, $full);
   }

}
