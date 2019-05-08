<?php

App::uses('CroogoAppController', 'Croogo.Controller');

/**
 * Base Application Controller
 *
 * @package  Croogo
 * @link     http://www.croogo.org
 */
class AppController extends CroogoAppController {
	public function beforeFilter()
	{
		parent::beforeFilter();
		//debug($this->params);exit;
		if(isset($this->params['language']) && !empty($this->params['language']) && ($this->params['language'] == 'en' || $this->params['language'] == 'bn')){
			//echo $this->params['language'];
			$this->setLang($this->params['language']);
		}
		
		if($this->Session->check('Config.language')) { // Check for existing language session
			$this->language = $this->Session->read('Config.language'); // Read existing language
		} else {			
			$this->language = Configure::read('defaultLanguage'); // No language session => get default language from Config file
		}
		
		$this->setLang($this->language); // call protected method setLang with the lang shortcode
		$this->set('language',$this->language); // send $this->language value to the view
		
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
        }
		$site = $this->Session->read('site');
		if(!isset($site)){
			$this->Session->write('site',Configure::read('SITE'));
		}
		
	
		//debug($this->request);
		$this->Auth->allow('display');
		
		
	}
	
	protected function setLang($lang) { // protected method used to set the language
 		$this->Session->write('Config.language', $lang); // write our language to session
        Configure::write('Config.language', $lang); // tell CakePHP that we're using this language
 	}

}
