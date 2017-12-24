<?php

App::uses('CroogoAppController', 'Croogo.Controller');

/**
 * Base Application Controller
 *
 * @package  Croogo
 * @link     http://www.croogo.org
 */
class AppController extends CroogoAppController {
	public $components = array('Location');
	public function beforeFilter()
	{
		parent::beforeFilter();
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
		
		/*-----------Robot Access off Start----------*/
		
		  //debug($this->Session->read());
		  //debug($this->url);exit;
		  $ReferredUrl = Router::url( $this->here, true );
		  $this->Session->write('refererUrl',$ReferredUrl);
		  $SecureSession = $this->Session->read();
		  $userAgent = $SecureSession['Config']['userAgent'];
		  $customTrackNo = $this->Session->read("userTrack-info-.$userAgent");
		  $clickedHistory = '';
		  $currentCount = '';
		  //echo $customTrackNo ;exit;
		  $crawlers = array(
			'Google' => 'Google',
			'MSN' => 'msnbot',
				  'Rambler' => 'Rambler',
				  'Yahoo' => 'Yahoo',
				  'AbachoBOT' => 'AbachoBOT',
				  'accoona' => 'Accoona',
				  'AcoiRobot' => 'AcoiRobot',
				  'ASPSeek' => 'ASPSeek',
				  'CrocCrawler' => 'CrocCrawler',
				  'Dumbot' => 'Dumbot',
				  'FAST-WebCrawler' => 'FAST-WebCrawler',
				  'GeonaBot' => 'GeonaBot',
				  'Gigabot' => 'Gigabot',
				  'Lycos spider' => 'Lycos',
				  'MSRBOT' => 'MSRBOT',
				  'Altavista robot' => 'Scooter',
				  'AltaVista robot' => 'Altavista',
				  'ID-Search Bot' => 'IDBot',
				  'eStyle Bot' => 'eStyle',
				  'Scrubby robot' => 'Scrubby',
				  'Facebook' => 'facebookexternalhit',
		   );
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		  //Is it a proxy address
		  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		  }else{
			$ip=$_SERVER['REMOTE_ADDR'];
		  }
		$actionCategory = $this->params->category;
		if(empty($actionCategory)){
			$actionCategory = $this->params->action;
		}
		   $queryCountry = $this->Session->read('queryCountry');
		   $sessionQueryCountry = $this->Session->read('queryCountry');
		   if(empty($sessionQueryCountry) && !isset($this->params['country'])){
				$countryISO = $this->Location->ip_info($ip, "Country Code");
				$this->loadModel('Country');
				$countryInfo = $this->Country->find('first',array('fields' => array('Country.id','Country.seo_name'),'conditions' => array('Country.iso_code_2' => $countryISO)));
				//debug($countryInfo);exit;
				if(isset($countryInfo['Country']['seo_name'])){
					$queryCountry = $countryInfo['Country']['seo_name'];
					
				}else{
					$queryCountry = Configure::read('queryCountry');
				}
				$this->Session->write('queryCountry',$queryCountry);
			
		   }else if(isset($this->params['country'])){
			   $queryCountry = $this->params['country'];
			   $this->Session->write('queryCountry',$queryCountry);
		   }else{
			   $queryCountry = Configure::read('queryCountry');
			   $this->Session->write('queryCountry',$queryCountry);
		   }
		   $this->set('queryCountry',$queryCountry);
		
		  $trackNo = "userTrack-info-.$userAgent";
		  $this->loadModel('SessionTable');
		  /*
		  if(empty($customTrackNo)){
		   $customTrackNo = 'usr'.rand(10, 595).date('dmYHis');
		   $this->Session->write("userTrack-info-.$userAgent",$customTrackNo);
		   
		   $this->SessionTable->create();
		   $this->request->data['SessionTable']['useragent'] = $trackNo;
		   $this->request->data['SessionTable']['sessionName'] = $customTrackNo;
		   $this->request->data['SessionTable']['lastcategory'] = $actionCategory;
		   $this->request->data['SessionTable']['userip'] = $ip;
		   $this->request->data['SessionTable']['clickcount'] = 0;
			if ($this->SessionTable->save($this->request->data)) {}
			
		  }else{
		   //$clickedHistory = $this->params->category;
		   $this->Session->write("clickedHistory",$customTrackNo);
		   //debug(unserialize($clickedHistoryread)); exit;
		   //$clickedHistory[] = $this->params->category;
		   $sessionDetails = $this->SessionTable->find('first',array('conditions' => array('SessionTable.sessionName' => $customTrackNo)));
		   //debug($sessionDetails);exit;
		   
		   if(isset($sessionDetails['SessionTable']['lastcategory'])){
			   $this->Session->write('sessiontableID',$sessionDetails['SessionTable']['id']);
			   $lastActionName = $sessionDetails['SessionTable']['lastcategory'];
			   $currentCount = $sessionDetails['SessionTable']['clickcount'];
			   $verified = $sessionDetails['SessionTable']['verified'];
			   if($lastActionName == $actionCategory && $verified == 0){
				   $this->SessionTable->id = $sessionDetails['SessionTable']['id'];
				   $data['SessionTable']['clickcount'] = $currentCount+1;
				   $data['SessionTable']['lastcategory'] = $actionCategory;
				   if($this->SessionTable->save($data)){};
			   }else{
				   $this->SessionTable->id = $sessionDetails['SessionTable']['id'];
				   $data['SessionTable']['clickcount'] = $currentCount+1;
				   $data['SessionTable']['lastcategory'] = $actionCategory;
				   if($this->SessionTable->save($data)){};
			   }
				
		   }else{
			   $trackNo = "userTrack-info-.$userAgent";
			   $customTrackNo = 'usr'.rand(10, 595).date('dmYHis');
			   $this->SessionTable->create();
			   $this->request->data['SessionTable']['useragent'] = $trackNo;
			   $this->request->data['SessionTable']['sessionName'] = $customTrackNo;
			   $this->request->data['SessionTable']['lastcategory'] = $actionCategory;
			   $this->request->data['SessionTable']['userip'] = $ip;
			   $this->request->data['SessionTable']['clickcount'] = 0;
			   if ($this->SessionTable->save($this->request->data)) {}
			   
		   }
		   //debug($sessionDetails);exit;
		   //debug($currentCount);exit;
		   if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
				//return $this->redirect(array('plugin'=>'information','controller'=>'home_posts','action' => 'googlecaptcha'));
				//$this->robotcheck();
				return;
		   }else if($currentCount > 5 && $verified == 0){
				$this->Session->write('robotChecking', true);
				//return $this->redirect(array('plugin'=>'information','controller'=>'home_posts','action' => 'googlecaptcha'));
				//$this->robotcheck();
				return;
		   }else{
			   return;
		   }
		   
		  }
		  */
		  /*----------Robot Access off End-----------*/
		
		//debug($this->request);
		$this->Auth->allow('display');
		
		
		
		
	}
	public function robotcheck(){
		$this->redirect(array('plugin'=>'information','controller'=>'home_posts','action' => 'googlecaptcha'));
	}
	protected function setLang($lang) { // protected method used to set the language
 		$this->Session->write('Config.language', $lang); // write our language to session
        Configure::write('Config.language', $lang); // tell CakePHP that we're using this language
 	}

}
