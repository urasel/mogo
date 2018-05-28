<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Siteactions Controller
 *
 * @property Siteaction $Siteaction
 * @property PaginatorComponent $Paginator
 */
class SiteactionsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public $components = array('Operation');
	/*
	public function beforeFilter() {
		//debug($this->params);exit;
		if ($this->action == 'infos') {
			$string = $this->params['point'];
			$postID = $this->params['id'];
		}
	}
	*/

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('searchitem','findplace','direction');
		if ($this->action == 'searchitem') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'topic') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'findplace') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'direction') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		
		
	}
	

	public function index() {
		$this->Siteaction->recursive = 0;
		$this->set('siteactions', $this->paginate());
	}
	
	public function changeLanguage($lng) {
			$url = $this->referer();
			if($lng == 'bn'){
			$url = str_replace('/en/','/bn/',$url);
			}else if($lng == 'en'){
			$url = str_replace('/bn/','/en/',$url);
			}else{
			$url = '/';
			}
		    //debug($url);exit;
			parent::setLang($lng);
		$this->redirect($url);
	}
	
	public function infos($category = 'default', $subcategory = null,$id = null) {
		
		//debug($this->params);exit;
		$stringlength = strlen($this->params['point']);
		$cutlength = strlen($stringlength);
		$combindedID = $this->params['id'];
		
		$passcounter = substr($this->params['id'],0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		
		//debug($_SESSION);exit;
		
		$this->loadModel('Information.Point');
		$id = substr($combindedID,$cutlength);
		$id = substr($id,0,-4);
		$options = array(
			'conditions' => array('Point.id' => $id),
			'fields' =>array(
			'Point.id',
			'Point.name',
			'Point.totalvisit',
			'PlaceType.id',
			'PlaceType.singlename'
			)
		);
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			$fieldAddress = 'bn_address';
			$fieldMetatag = 'bn_metatag';
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
			$fieldMetatag = 'metatag';
		}
		if(isset($this->params['country']) && $this->params['country'] != 'all'){
			$queryCountry = $this->params['country'];
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name","Country.id")));
			
			$passCountryName = $countryName['Country']['name'];
			$passCountryId = $countryName['Country']['id'];
		}else{
			$queryCountry = 'all';
			$passCountryName = '';
			$passCountryId = '';
		}
		
		$this->set(compact('queryCountry','passCountryName','passCountryId'));
		$pointDetails = $this->Point->find('first', $options);
		//debug($pointDetails);exit;
		$breadcumpArray = $this->generatebreadcump($pointDetails['PlaceType']['id'],$breadCumb);
		
		$this->set('breadcumpArray', $breadcumpArray);
		if (empty($pointDetails['Point']['name'])) {
			$this->Session->setFlash(__('Invalid URL For Access.'));
			return $this->redirect(array('action' => 'index'));
		}else{
			$currentCount = $pointDetails['Point']['totalvisit'];
			$this->Point->id = $id;
			$this->Point->saveField('totalvisit',$currentCount+1);
		}
		$id = $pointDetails['Point']['id'];
		$typeid = $pointDetails['PlaceType']['singlename'];
		$PlaceTypeID = $pointDetails['PlaceType']['id'];
		$className = ucfirst($pointDetails['PlaceType']['singlename']);
		$singleName = $pointDetails['PlaceType']['singlename'];
		
		if($typeid == 'service'){
			$this->loadModel('Doctor');
			$expertises = $this->Doctor->find('first',array('conditions' => array('Doctor.point_id' => $id),'fields'=> array('Doctor.expertiseids')));
			$expertises = json_decode($expertises['Doctor']['expertiseids']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$layout = $singleName;
			$className = ucfirst($singleName);
			
			$imageDB = $className.'Image';
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_division_id = BdDivision.id')
						),
						'DoctorSpecialization' => array(
							'foreignKey' => false,
							'conditions' => array('Doctor.doctor_specialization_id = DoctorSpecialization.id')
						)
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'DoctorExpertise' => array(
								'foreignKey' => false,
								'fields' => array('DoctorExpertise.name'),
								'conditions' => array('DoctorExpertise.id' => $expertises)
						)
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.id',
					'Point.name',
					'Point.seo_name',
					'Point.lat',
					'Point.lng',
					'Point.bd_district_id',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'Country.name',
					'BdDivision.name',
					'BdDistrict.name',
					"BdThanas.$fieldName as name ",
					'DoctorSpecialization.name',
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			$title_for_layout = $pointDetails['Point']['name'];
			$this->set('title_for_layout', $title_for_layout);
			$metadescription = $pointDetails[$className]['metatag'];
			$this->set('metadescription', $metadescription);
			$nearbies = $this->__nearbies($className,$pointDetails);							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
			
		}else if($typeid == 'topic'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			$dataTable = $className.'Data';
			$this->loadModel('Topic');
			$this->Topic->recursive = 1;
			//debug($this->Point); exit;
			$options = array(
				'conditions' => array('Topic.point_id' => $id),
				'fields' =>array(
					'Topic.*',
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					"User.firstname",
					"User.lastname",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'Country.name',
					'BdDivision.name',
					'BdDistrict.name',
					"BdThanas.$fieldName as name ",
					 "$className.*",
					
					
				)
			);
			$this->Topic->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Topic.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
						'User' => array(
							'foreignKey' => false,
							'conditions' => array('Topic.user_id = User.id')
						),
					)
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Topic->find('first', $options);
			//debug($pointDetails);exit;
			//$title_for_layout = $pointDetails['Point']['name'];
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'];
			}else{
				$title_for_layout = $pointDetails[$className]['name'];
			}
			$this->set('title_for_layout', $title_for_layout);
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);exit;							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'hospital'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'HospitalCategory' => array(
							'foreignKey' => false,
							'conditions' => array("$className.hospital_category_id = HospitalCategory.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
						'User' => array(
							'foreignKey' => false,
							'conditions' => array("$className.user_id = User.id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			
			
			
			//debug($this->Point); exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					"HospitalCategory.*",
					"Country.name",
					"Country.bn_name",
					"BdDivision.$fieldName as name",
					"BdDistrict.$fieldName as name",
					"BdThanas.$fieldName as name",
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				//$array[] = $pointDetails['PlaceType']['name'];
				$array[] = $pointDetails['Country']['name'];
				//debug($array);exit;
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array('Point.country_id = Country.id')
							),
							'BdDivision' => array(
								'foreignKey' => false,
								'conditions' => array('Point.zone_id = BdDivision.id')
							),
							'BdDistrict' => array(
								'foreignKey' => false,
								'conditions' => array('Point.bd_district_id = BdDistrict.id')
							),
							'BdThanas' => array(
								'foreignKey' => false,
								'conditions' => array('Point.bd_thanas_id = BdThanas.id')
							),
							'User' => array(
								'foreignKey' => false,
								'conditions' => array("$className.user_id = User.id")
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							)
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
			}
			
			if(!empty($pointDetails['Point']['address'])){
				$address = $pointDetails['Point']['address'];
			}else{
				$address = $pointDetails['BdDistrict']['name'].','.$pointDetails['Country']['name'];
			}
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].' '.$address;
				$hospitalCatName = 'bn_name';
			}else{
				$title_for_layout = $pointDetails[$className]['name'].' '.$address;
				$hospitalCatName = 'name';
			}
			if(!empty($pointDetails[$className]['hospital_categories'])){
				$hospital_cat_ids = json_decode($pointDetails[$className]['hospital_categories']);
				//debug($hospital_cat_ids);exit;
				$this->loadModel('HospitalCategory');
				$hospitalSelectedCategories = $this->HospitalCategory->find('all',array('fields'=>array('id',"$hospitalCatName as name"),'conditions'=>array('HospitalCategory.id' => $hospital_cat_ids)));
				//debug($hospitalSelectedCategories);exit;
			}else{
				$hospitalSelectedCategories = '';
			}
			
			$this->set('title_for_layout', $title_for_layout);
			$metadescription = $pointDetails[$className]['metatag'];
			$this->set('metadescription', $metadescription);
			$keyword = $pointDetails[$className]['keyword'];
			$this->set('keyword', $keyword);
			
			/*****************************Detail Ready Part Start*****************/
			$detailsString = '';
			if(!empty($pointDetails[$className]['details']) && $currentLng == 'en'){
				$detailsString = $pointDetails[$className]['details'];
			}else if(!empty($pointDetails[$className]['bn_details']) && $currentLng == 'bn'){
				$detailsString = $pointDetails[$className]['bn_details'];
			}else if(!empty($pointDetails[$className]['details'])){
				$detailsString = $pointDetails[$className]['details'];
			}else if(!empty($pointDetails[$className]['bn_details'])){
				$detailsString = $pointDetails[$className]['bn_details'];
			}else{
				
				$hospitalName = $pointDetails[$className]['name'];
				$founded = $pointDetails[$className]['founded'];
				$foundedby = $pointDetails[$className]['founded_by'];
				$storied = $pointDetails[$className]['storied'];
				$area = $pointDetails[$className]['area'];
				$daily_patient = $pointDetails[$className]['daily_patient'];
				$placeType = $pointDetails['PlaceType']['name'];
				$country = $pointDetails['Country']['name'];
				if(!empty($pointDetails['HospitalCategory']['name'])){
					$hospitalType = $pointDetails['HospitalCategory']['name'];
					$detailsString .= "$hospitalName is a multi-disciplinary $hospitalType in $country, confidently providing comprehensive health care with the latest medical, surgical and diagnostic facilities. ";
				}
				$detailsString .= "$hospitalName provided services by expert medical professionals, skilled nurses and technologists.";
				if(!empty($pointDetails[$className]['founded'])){
					$founded = $pointDetails[$className]['founded'];
					if(!empty($foundedby)){
						$detailsString .= "The Hospital is founded $founded year before by $foundedby. ";
					}else{
						$detailsString .= "The Hospital is founded $founded year before. ";
					}
					
				}
				if(!empty($storied)){
					if(!empty($area)){
						$detailsString .= "<br/>$hospitalName is an $storied-storied building built with $area floor space.";
					}else{
						$detailsString .= "$hospitalName is an $storied-storied building. ";
					}
					
				}
				if(!empty($pointDetails[$className]['address'])){
					$hospitaladdress = $pointDetails[$className]['address'];
					$detailsString .= "$hospitalName is situated at $hospitaladdress. ";
				}
				if(!empty($daily_patient)){
					$detailsString .= "In $hospitalName over $daily_patient patients availed out-patient consultation daily. ";
				}
				$detailsString .= "<br/><blockquote>If you have more information like Established year, Name of Founder, History & other relevant information of $hospitalName , please feel free to send them as your feedback. We always welcome your input and your link will be placed on this page as well.</blockquote>";
			}
			$this->set('detailsString', $detailsString);
			/*****************************Detail Ready Part End*****************/
			
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($pointDetails);exit;
			//debug($nearbies);exit;
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('hospitalSelectedCategories', $hospitalSelectedCategories);
			
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'institute'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'Continent' => array(
							'foreignKey' => false,
							'conditions' => array('Country.continent_id = Continent.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
						'User' => array(
							'foreignKey' => false,
							'conditions' => array("$className.user_id = User.id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'PlaceTypeSlug' => array(
							'foreignKey' => false,
							'fields' => array('id','title','seo_title','slug','params'),
							'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
						),
					),
				)
			);
			
			
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					"Country.seo_name",
					'Country.seo_title',
					'Country.id',
					"Continent.$fieldName as name",
					"Continent.seo_name",
					"BdDivision.$fieldName as name",
					"BdDivision.seo_name",
					"BdDistrict.$fieldName as name",
					"BdDistrict.seo_name",
					"BdThanas.$fieldName as name",
					"BdThanas.seo_name",
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				//$array[] = $pointDetails['PlaceType']['name'];
				$array[] = $pointDetails['Country']['name'];
				//debug($array);exit;
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array('Point.country_id = Country.id')
							),
							'Continent' => array(
								'foreignKey' => false,
								'conditions' => array('Country.continent_id = Continent.id')
							),
							'BdDivision' => array(
								'foreignKey' => false,
								'conditions' => array('Point.zone_id = BdDivision.id')
							),
							'BdDistrict' => array(
								'foreignKey' => false,
								'conditions' => array('Point.bd_district_id = BdDistrict.id')
							),
							'BdThanas' => array(
								'foreignKey' => false,
								'conditions' => array('Point.bd_thanas_id = BdThanas.id')
							),
							'User' => array(
								'foreignKey' => false,
								'conditions' => array("$className.user_id = User.id")
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							),
							'PlaceTypeSlug' => array(
								'foreignKey' => false,
								'fields' => array('id','title','seo_title','slug','params'),
								'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
							),
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
			}
			if(!empty($pointDetails['Point']['address'])){
				$address = $pointDetails['Point']['address'];
			}else{
				$address = $pointDetails['BdDistrict']['name'].','.$pointDetails['Country']['name'];
			}
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].' '.$address;
			}else{
				$title_for_layout = $pointDetails[$className]['name'].' '.$address;
			}
			$this->set('title_for_layout', $title_for_layout);
			//$metadescription = $pointDetails[$className]['metatag'];
			//if(empty($metadescription)){
				$placename = $pointDetails['Point']['name'];
				$placeType = $pointDetails['PlaceType']['name'];
				$instituteaddress = $pointDetails['Institute']['address'];
				$instituteThana = $pointDetails['BdThanas']['name'];
				$instituteDistrict = $pointDetails['BdDistrict']['name'];
				$instituteDivision = $pointDetails['BdDivision']['name'];
				$instituteCountry = $pointDetails['Country']['name'];
				$instituteEiinNo = $pointDetails['Institute']['eiin_no'];
				$latDegree = $this->Operation->degreelat($pointDetails[$className]['lat']);
				$lngDegree = $this->Operation->degreelng($pointDetails[$className]['lng']);
				$metadescription = "";
				
				if(!empty($placeType)){
					$metadescription .= "The $placename is a well known $placeType listed in $placeType category.";
				}
				if(!empty($instituteEiinNo)){
					$metadescription .= " The EIIN number of $placename is ' $instituteEiinNo '";
				}
				if(!empty($instituteaddress)){
					$metadescription .= " and $placename is situated at $instituteaddress.";
				}else{
					$metadescription .= " and $placename is situated at $instituteThana, $instituteDistrict, $instituteDivision, $instituteCountry.";
				}
				if(!empty($latDegree) && !empty($lngDegree)){
					$metadescription .= "The geographical coordinates of $placename are $latDegree, $lngDegree.";
				}
				
				$metadescription .= "<br/><blockquote>If you have more information like Established year, Name of Founder, History & other relevant information of $placename , please feel free to send them as your feedback. We always welcome your input and your link will be placed on this page as well.</blockquote>";
			//}else{
				//$metadescription = $pointDetails[$className]['metatag'];
			//}
			
			
			
			$this->set('metadescription', $metadescription);
			
			/*****************************Detail Ready Part Start*****************/
			$detailsString = '';
			if(!empty($pointDetails[$className]['details']) && $currentLng == 'en'){
				$detailsString = $pointDetails[$className]['details'];
			}else if(!empty($pointDetails[$className]['bn_details']) && $currentLng == 'bn'){
				$detailsString = $pointDetails[$className]['bn_details'];
			}else if(!empty($pointDetails[$className]['details'])){
				$detailsString = $pointDetails[$className]['details'];
			}else if(!empty($pointDetails[$className]['bn_details'])){
				$detailsString = $pointDetails[$className]['bn_details'];
			}else{
				
				$placename = $pointDetails[$className]['name'];
				$founded = $pointDetails[$className]['founded'];
				$foundedby = $pointDetails[$className]['founded_by'];
				$storied = $pointDetails[$className]['storied'];
				$area = $pointDetails[$className]['area'];
				$placeType = $pointDetails['PlaceType']['name'];
				$country = $pointDetails['Country']['name'];
				if(!empty($pointDetails['HospitalCategory']['name'])){
					$hospitalType = $pointDetails['HospitalCategory']['name'];
					$detailsString .= "$placename is a multi-disciplinary $hospitalType in $country, confidently providing comprehensive health care with the latest medical, surgical and diagnostic facilities. ";
				}
				$detailsString .= "$placename provided services by expert medical professionals, skilled nurses and technologists.";
				if(!empty($pointDetails[$className]['founded'])){
					$founded = $pointDetails[$className]['founded'];
					if(!empty($foundedby)){
						$detailsString .= "The Hospital is founded $founded year before by $foundedby. ";
					}else{
						$detailsString .= "The Hospital is founded $founded year before. ";
					}
					
				}
				if(!empty($storied)){
					if(!empty($area)){
						$detailsString .= "<br/>$placename is an $storied-storied building built with $area floor space.";
					}else{
						$detailsString .= "$placename is an $storied-storied building. ";
					}
					
				}
				if(!empty($pointDetails[$className]['address'])){
					$hospitaladdress = $pointDetails[$className]['address'];
					$detailsString .= "$placename is situated at $hospitaladdress. ";
				}
				if(!empty($daily_patient)){
					$detailsString .= "In $placename over $daily_patient patients availed out-patient consultation daily. ";
				}
				$detailsString .= "<br/><blockquote>If you have more information like Established year, Name of Founder, History & other relevant information of $placename , please feel free to send them as your feedback. We always welcome your input and your link will be placed on this page as well.</blockquote>";
			}
			$this->set('detailsString', $detailsString);
			/*****************************Detail Ready Part End*****************/
			
			
			$keyword = $pointDetails[$className]['keyword'];
			$this->set('keyword', $keyword);
			
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);exit;
			//debug($timedata);
			//exit;
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('queryCountry', $queryCountry);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'location'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					'Country.seo_name',
					'Country.seo_title',
					'Country.id',
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				//$array[] = $pointDetails['PlaceType']['name'];
				$array[] = $pointDetails['Country']['name'];
				//debug($array);exit;
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array('Point.country_id = Country.id')
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							)
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
			}
			
			if(!empty($pointDetails[$className]['area1'])){
			$area1 = $pointDetails[$className]['area1'].', ';
			}else{
			$area1 = '';
			}
			if(!empty($pointDetails[$className]['area2'])){
			$area2 = $pointDetails[$className]['area2'].', ';
			}else{
			$area2 = '';
			}
			if(!empty($pointDetails[$className]['area3'])){
			$area3 = $pointDetails[$className]['area3'].', ';
			}else{
			$area3 = '';
			}
			if(!empty($pointDetails['Point']['address'])){
				$address = $pointDetails['Point']['address'];
			}else{
				$address = $area3.$area2.$area1;
			}
			
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].','.$address.' -Infomap24.com';
				
			}else{
				$title_for_layout = $pointDetails[$className]['name'].','.$address.' -Infomap24.com';
			}
			
			$this->set('title_for_layout', $title_for_layout);
			
			$latDegree = $this->Operation->degreelat($pointDetails[$className]['lat']);
			$lngDegree = $this->Operation->degreelng($pointDetails[$className]['lng']);
			$placeName = $pointDetails[$className]['name'];
			$country = $pointDetails['Country']['name'];
			
			$metadescription = "Welcome to the $placeName information page. You can view here the full area map of $placeName. $placeName lies in $address  $country and its geographical coordinates are $latDegree, $lngDegree";
			$this->set('metadescription', $metadescription);
			
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);exit;
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('queryCountry', $queryCountry);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'motorcycle'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'MotorcycleSpecification' => array(
							'foreignKey' => false,
							'conditions' => array("MotorcycleSpecification.motorcycle_id = $className.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.motorcycle_id" => $id)
						)
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					'Country.seo_name',
					'Country.seo_title',
					'Country.id',
					"$className.*",
					'MotorcycleSpecification.*',
					 
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			
			if(!empty($pointDetails[$className]['area1'])){
			$area1 = $pointDetails[$className]['area1'].', ';
			}else{
			$area1 = '';
			}
			if(!empty($pointDetails[$className]['area2'])){
			$area2 = $pointDetails[$className]['area2'].', ';
			}else{
			$area2 = '';
			}
			if(!empty($pointDetails[$className]['area3'])){
			$area3 = $pointDetails[$className]['area3'].', ';
			}else{
			$area3 = '';
			}
			if(!empty($pointDetails['Point']['address'])){
				$address = $pointDetails['Point']['address'];
			}else{
				$address = $area3.$area2.$area1;
			}
			
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].' | Infomap24.com - Information Directory '.$pointDetails['Country']['name'];
				
			}else{
				$title_for_layout = $pointDetails[$className]['name'].' | Infomap24.com - Information Directory '.$pointDetails['Country']['name'];
			}
			
			$this->set('title_for_layout', $title_for_layout);
			
			
			$name = $pointDetails[$className]['name'];
			$placeType = $pointDetails['PlaceType']['name'];
			//$motorCycleCat = $pointDetails[$className]['family'];
			
			$metadescription = "$name listed in $placeType category.";
			
			$this->set('metadescription', $metadescription);
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);							
			$this->set('place', $pointDetails);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'yellowPage'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					'Country.seo_name',
					'Country.seo_title',
					'Country.id',
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				//$array[] = $pointDetails['PlaceType']['name'];
				$array[] = $pointDetails['Country']['name'];
				//debug($array);exit;
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array('Point.country_id = Country.id')
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							)
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
			}
			
			if(!empty($pointDetails[$className]['area1'])){
			$area1 = $pointDetails[$className]['area1'].', ';
			}else{
			$area1 = '';
			}
			if(!empty($pointDetails[$className]['area2'])){
			$area2 = $pointDetails[$className]['area2'].', ';
			}else{
			$area2 = '';
			}
			if(!empty($pointDetails[$className]['area3'])){
			$area3 = $pointDetails[$className]['area3'].', ';
			}else{
			$area3 = '';
			}
			if(!empty($pointDetails['Point']['address'])){
				$address = $pointDetails['Point']['address'];
			}else{
				$address = $area3.$area2.$area1;
			}
			
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].' | Infomap24.com - Information Directory '.$pointDetails['Country']['name'];
				
			}else{
				$title_for_layout = $pointDetails[$className]['name'].' | Infomap24.com - Information Directory '.$pointDetails['Country']['name'];
			}
			
			$this->set('title_for_layout', $title_for_layout);
			
			$latDegree = $this->Operation->degreelat($pointDetails[$className]['lat']);
			$lngDegree = $this->Operation->degreelng($pointDetails[$className]['lng']);
			$placeName = $pointDetails[$className]['name'];
			$country = $pointDetails['Country']['name'];
			
			
			$metadescription = "Welcome to the $placeName information page. You can view here the full area map of $placeName. $placeName lies in $address  $country and its geographical coordinates are $latDegree, $lngDegree";
			$this->set('metadescription', $metadescription);
			
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);exit;
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('queryCountry', $queryCountry);
			/*
			$infoDetails = $pointDetails[$className]['details'];
			if(empty($infoDetails)){
				$categoryName = $pointDetails['PlaceType']['seo_name'];
				if($this->render("Elements/details/$categoryName")){
					$infoDetails = $this->render("Elements/details/$categoryName");
				}else{
					$infoDetails = '';
				}
				
			}else{
				$infoDetails = '';
			}
			*/
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'airport'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'AirportType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.airport_type_id = AirportType.id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'PlaceTypeSlug' => array(
							'foreignKey' => false,
							'fields' => array('id','title','seo_title','slug','params'),
							'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
						),
					),
				)
			);
			debug($this->Point);exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'AirportType.name',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					'Country.seo_name',
					'Country.seo_title',
					'Country.id',
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			debug($pointDetails);exit;
			
			
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				//$array[] = $pointDetails['PlaceType']['name'];
				$array[] = $pointDetails['Country']['name'];
				//debug($array);exit;
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							),
							'AirportType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.airport_type_id = AirportType.id")
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							),
							'PlaceTypeSlug' => array(
								'foreignKey' => false,
								'fields' => array('id','title','seo_title','slug','params'),
								'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
							),
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
				///debug($pointDetails);exit;
			}
			
			
			$address = $pointDetails['Point']['address'];
			
			//debug($pointDetails);exit;
			
			
			$title_for_layout = $pointDetails[$className]['name'].','.$address;
			$this->set('title_for_layout', $title_for_layout);
			
			$latDegree = $this->Operation->degreelat($pointDetails[$className]['lat']);
			$lngDegree = $this->Operation->degreelng($pointDetails[$className]['lng']);
			$placename = $pointDetails[$className]['name'];
			$placeType = $pointDetails['PlaceType']['name'];
			$airportType = $pointDetails['AirportType']['name'];
			$iata = $pointDetails[$className]['iata_code'];
			$ident = $pointDetails[$className]['ident'];
			$gps_code = $pointDetails[$className]['gps_code'];
			$elevation_ft = $pointDetails[$className]['elevation_ft'];
			$location = $pointDetails[$className]['municipality'];
			$country = $pointDetails['Country']['name'];
			$metadescription = "";
			if(!empty($airportType)){
				$metadescription .= "$placename : $placename is a $airportType listed in $placeType category.";
			}
			if(!empty($iata)){
				$metadescription .= " The International Air Transport Association number of $placename is ' $iata '.";
			}
			if(!empty($airportType) && !empty($location) && !empty($country)  ){
				$metadescription .= " $placename is a $airportType of $location, $country ";
			}
			if(!empty($ident)){
				$metadescription .= " and the local code of $placename is ' $ident '.";
			}
			if(!empty($elevation_ft)){
				$metadescription .= " The Elevation Feet of $placename is ' $elevation_ft '.";
			}
			if(!empty($gps_code)){
				$metadescription .= " The GPS code of $placename is ' $gps_code '.";
			}
			if(!empty($latDegree) && !empty($lngDegree)){
				$metadescription .= "and its geographical coordinates are $latDegree, $lngDegree.";
			}
			//$metadescription = "$placename : $placename is a $airportType listed in $placeType category. The International Air Transport Association number of $placename is ' $iata ' and the local code of $placename is ' $ident '. $placename is a $airportType of $location, $country and its geographical coordinates are $latDegree, $latDegree";
			
			$this->set('metadescription', $metadescription);
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('queryCountry', $queryCountry);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'stadium'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
						'Continent' => array(
							'foreignKey' => false,
							'conditions' => array('Country.continent_id = Continent.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'PlaceTypeSlug' => array(
							'foreignKey' => false,
							'fields' => array('id','title','seo_title','slug','params'),
							'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
						),
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					'Country.id',
					'Country.seo_name',
					'Country.seo_title',
					'Country.id',
					"Continent.seo_name",
					"$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);
			if(empty($pointDetails['Point']['lat']) || empty($pointDetails['Point']['lng']) || empty($pointDetails['Point']['map'])){
				/********************************/
				$array = '';
				$array[] = $pointDetails['Point']['name'];
				$array[] = $pointDetails['Country']['name'];
				$this->Operation->updateLatLng($array,'Point',$pointDetails['Point']['id']);
				
				//debug($result);exit;
				/********************************/
				$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							),
							'Continent' => array(
								'foreignKey' => false,
								'conditions' => array('Country.continent_id = Continent.id')
							),
						),
						'hasMany' => array(
							$imageDB => array(
									'foreignKey' => false,
									'fields' => array('file'),
									'conditions' => array("$imageDB.point_id" => $id)
							),
							'PlaceTypeSlug' => array(
								'foreignKey' => false,
								'fields' => array('id','title','seo_title','slug','params'),
								'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
							),
						),
					)
				);
				$pointDetails = $this->Point->find('first', $options);
				///debug($pointDetails);exit;
			}
			
			
			$address = $pointDetails['Point']['address'];
			
			
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'].' '.$address;
			}else{
				$title_for_layout = $pointDetails[$className]['name'].' '.$address;
			}
			$this->set('title_for_layout', $title_for_layout);
			
			$latDegree = $this->Operation->degreelat($pointDetails['Point']['lat']);
			$lngDegree = $this->Operation->degreelng($pointDetails['Point']['lng']);
			
			$placename = $pointDetails[$className]['name'];
			$tenant_or_use = $pointDetails[$className]['tenant_or_use'];
			$placeType = $pointDetails['PlaceType']['name'];
			$capacity = $pointDetails[$className]['capacity'];
			$seats = $pointDetails[$className]['seats'];
			$builton = $pointDetails[$className]['builton'];
			$location = $pointDetails[$className]['city'];
			$country = $pointDetails['Country']['name'];
			
			$metadescription = "$placename : $placename is a $placeType listed in $placeType category, it uses for $tenant_or_use. $placename build on ' $builton ' and total capacity is $capacity where the total sits are ' $seats '<br/>. $placename is a $placeType of $location, $country and its geographical coordinates are $latDegree, $lngDegree";
			
			$this->set('metadescription', $metadescription);
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('queryCountry', $queryCountry);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else if($typeid == 'animal'){
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			
			$title_for_layout = $pointDetails[$className]['name'];
			$this->set('title_for_layout', $title_for_layout);
			
			$name = $pointDetails[$className]['name'];
			$placeType = $pointDetails['PlaceType']['name'];
			$family = $pointDetails[$className]['family'];
			$species = $pointDetails[$className]['species'];
			$genus = $pointDetails[$className]['genus'];
			
			$metadescription = "$name listed in $placeType category. $name is a member of $family Family. The Species of $name is $species,  an Genus is $genus.";
			
			$this->set('metadescription', $metadescription);
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}else{
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
						'User' => array(
							'foreignKey' => false,
							'conditions' => array("$className.user_id = User.id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'PlaceTypeSlug' => array(
							'foreignKey' => false,
							'fields' => array('id','title','seo_title','slug','params'),
							'conditions' => array("PlaceTypeSlug.place_type_id" => $PlaceTypeID,"PlaceTypeSlug.isactive" => 1)
						),
					),
				)
			);
			
			
			
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					"Country.seo_name",
					"BdDivision.$fieldName as name",
					"BdDivision.seo_name",
					"BdDistrict.$fieldName as name",
					"BdDistrict.seo_name",
					"BdThanas.$fieldName as name",
					"BdThanas.seo_name",
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'];
			}else{
				$title_for_layout = $pointDetails[$className]['name'];
			}
			
			
			$this->set('title_for_layout', $title_for_layout);
			$metadescription = $pointDetails[$className]['metatag'];
			$this->set('metadescription', $metadescription);
			$keyword = $pointDetails[$className]['keyword'];
			$this->set('keyword', $keyword);
			
			$nearbies = $this->__nearbies($className,$pointDetails);	
			//debug($nearbies);exit;
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render($singleName);
		}
		
		
	}
	
	
	public function topic(){
			$id = $this->params->pass[2];
			$id = substr($id,0,-4);
			$currentLng = $this->Session->read('Config.language');
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
				$firstName = 'bn_firstname';
				$lastnameName = 'bn_lastname';
			}else{
				$fieldName = 'name';
				$firstName = 'firstname';
				$lastnameName = 'lastname';
			}
			$options = array(
				'conditions' => array('Point.id' => $id),
				'fields' =>array(
					'Point.id',
					'Point.name',
					'Point.seo_name',
					'Point.bd_district_id',
					'Point.image',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					"User.$firstName as firstname",
					"User.$lastnameName as lastname",
					"User.image",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'Country.name',
					'BdDivision.name',
					'BdDistrict.name',
					"BdThanas.$fieldName as name ",
					"TopicData.*",
				)
			);
			
			unset($this->params['language']);
			
			$this->loadModel('Information.Point');
			$this->Point->recursive = 2;
			$this->Point->bindModel(array(
					'hasOne' => array(
						'TopicData' => array(
							'foreignKey' => false,
							'conditions' => array("TopicData.point_id = Point.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
						'User' => array(
							'foreignKey' => false,
							'conditions' => array('TopicData.user_id = User.id')
						)
					)));
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			$breadcumpArray = $this->generatebreadcump($pointDetails['PlaceType']['id'],$breadCumb);
			//debug($breadcumpArray);exit;
			$this->set('breadcumpArray', $breadcumpArray);
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'];
				$short_description = $pointDetails[$className]['bn_short_description'];
				$details = $pointDetails[$className]['bn_details'];
				$keyword = $pointDetails[$className]['bn_keyword'];
				$metadescription = $pointDetails[$className]['bn_metatag'];
			}else if($currentLng == 'bn' && empty($pointDetails[$className]['bn_name'])){
				$title_for_layout = $pointDetails[$className]['name'];
				$short_description = $pointDetails[$className]['short_description'];
				$details = $pointDetails[$className]['details'];
				$keyword = $pointDetails[$className]['keyword'];
				$metadescription = $pointDetails[$className]['metatag'];
			}else if($currentLng == 'en' && empty($pointDetails[$className]['name'])){
				$title_for_layout = $pointDetails[$className]['bn_name'];
				$short_description = $pointDetails[$className]['bn_short_description'];
				$details = $pointDetails[$className]['bn_details'];
				$keyword = $pointDetails[$className]['bn_keyword'];
				$metadescription = $pointDetails[$className]['bn_metatag'];
				
			}else{
				$title_for_layout = $pointDetails[$className]['name'];
				$short_description = $pointDetails[$className]['short_description'];
				$details = $pointDetails[$className]['details'];
				$keyword = $pointDetails[$className]['keyword'];
				$metadescription = $pointDetails[$className]['metatag'];
			}
		
			
			$singleName = $pointDetails['PlaceType']['singlename'];
			
			$this->set('title_for_layout', $title_for_layout);
			$nearbyoptions = array(
				'limit' => 8,
				'conditions' => array(
					"TopicData.id !=" => $pointDetails['Point']['id'],
					"TopicData.place_type_id" => $pointDetails['PlaceType']['id'],
					),
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'TopicData.*',
					 
				)
			);
			$this->loadModel('TopicData');
			$this->TopicData->bindModel(array(
					'hasOne' => array(
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('PlaceType.id = TopicData.place_type_id')
						),
					)
				)
			);
			
			
			$nearbies = $this->TopicData->find('all', $nearbyoptions);
			//debug($nearbies);exit;							
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('recentposts', $nearbies);
			$this->set(compact('title_for_layout','short_description','details','keyword','metadescription'));
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this ->render($singleName);
	
	}
	
	public function bucket(){
			//debug($this->params);exit;
			$stringlength = strlen($this->params->pass[1]);
			$cutlength = strlen($stringlength);
			$combindedID = $this->params->pass[2];
			$modelName = $this->params->pass[4];
			$viewFileName = '';
			$passcounter = substr($this->params->pass[2],0,$cutlength);
			if($passcounter != $stringlength){
				throw new NotFoundException(__('Invalid Item'));
			}
			
			
			
			$this->loadModel("Information.$modelName");
			$this->$modelName->recursive = 2;
			$id = substr($combindedID,$cutlength);
			$id = substr($id,0,-4);
			unset($this->params['language']);
			$currentLng = $this->Session->read('Config.language');
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
			}else{
				$fieldName = 'name';
			}
			$options = array(
				'conditions' => array("$modelName.id" => $id),
				'fields' =>array(
				"$modelName.*",
				'PlaceType.id',
				"PlaceType.$fieldName as name",
				'PlaceType.icon',
				'PlaceType.singlename',
				'PlaceType.seo_name'
				)
			);
			
			$pointDetails = $this->$modelName->find('first', $options);
			$breadcumpArray = $this->generatebreadcump($pointDetails['PlaceType']['id'],$breadCumb);
			//debug($breadcumpArray);exit;
			$this->set('breadcumpArray', $breadcumpArray);
			//debug($pointDetails);exit;
			if(in_array($modelName,array('BabyName'))){
				$layout = 'generalview';
				$title_for_layout = $pointDetails['PlaceType']['name'].' '.$pointDetails[$modelName]['name'].' '.__('Details');
				$viewFileName = 'bucket';
			}else{
				$layout = $pointDetails['PlaceType']['singlename'];
				$title_for_layout = $pointDetails['Point']['name'].','.$pointDetails['BdDistrict']['name'].','.$pointDetails['Country']['name'];
				$viewFileName = $pointDetails['PlaceType']['seo_name'];
			}
			
			
			$nearbyoptions = array(
				'limit' => 8,
				'conditions' => array(
					"$modelName.id !=" => $pointDetails[$modelName]['id'],
					"$modelName.place_type_id" => $pointDetails['PlaceType']['id'],
					),
				'fields' => array(
					"$modelName.*",
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					 
					
				)
			);
			
			$nearbies = $this->$modelName->find('all', $nearbyoptions);
			//debug($nearbies);exit;	
			
			$this->set('title_for_layout', $title_for_layout);
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('modelName', $modelName);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this->render($viewFileName);
	
	}
	
	
	public function getPlaces(){
		$this->autoRender = false;
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'ajax';
		$this->loadModel('Information.Point');
		$this->Point->recursive = 1;
        if ($this->params['url']['term'] != '') {
		//debug($this->params['url']);exit;
			$conditions = array(
								array(
								"Point.name LIKE" => "%".$this->params['url']['term']."%",
								)
								);
			/*
			$this->Point->bindModel(array(
					'hasOne' => array(
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array('Point.place_type_id = PlaceType.id')
						)
					)
				)
			);
			*/
            $searchresult = $this->Point->find('all', array(
                'conditions' => $conditions,
				'fields' => array('Point.id','Point.name','Point.address','PlaceType.icon'),
				'order' =>	array('Point.name ASC'),
                'limit' => 10
                    )
            );
			//debug($searchresult);exit;
			$results = array();
			if(count($searchresult) > 0){
				foreach ($searchresult as $place) {
					//debug($place);
					$rpa['Result']['id'] = $place['Point']['id'];
					$rpa['Result']['label'] = $place['Point']['name'];
					$rpa['Result']['address'] = $place['Point']['address'];
					$rpa['Result']['icon'] = $place['PlaceType']['icon'];
					array_push($results, $rpa['Result']);
				}
			}else{
				$rpa['Result']['id'] = 0;
                $rpa['Result']['label'] = 'No Result Found';
                $rpa['Result']['address'] = 'No Result Found';
				$rpa['Result']['icon'] = 'icon';
				array_push($results, $rpa['Result']);
				
			}
            //debug($results);
            echo json_encode($results);
        }
        
	
	}
	
	public function sitemap(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$this->loadModel('Information.Point');
		$this->loadModel('Information.PlaceType');
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		//debug($this->params);exit;
		
		if(isset($this->params->query['country']) && $this->params->query['country'] != 'all'){
			$queryCountry = $this->params->query['country'];
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
			}else{
				$fieldName = 'name';
			}
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name","Country.id")));
			
			$passCountryName = $countryName['Country']['name'];
			$passCountryId = $countryName['Country']['id'];
		}else if(isset($this->params->query['country']) && is_numeric($this->params->query['country'])){
			$queryCountry = 'all';
			$passCountryName = 'all';
			$passCountryId = '';
		}else{
			$queryCountry = 'all';
			$passCountryName = 'all';
			$passCountryId = '';
		}
		
		
		$parentCats = '';
		$categories = '';
		//$disableCache = $this->Session->read('Config.cachestate');
		//debug($countryName);exit;
		$disableCache = false;
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			if(Cache::read('sitemapdatabn', 'long') == false || $disableCache == true){
				
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE 
				pl.topcat = 1 AND pl.isactive = 1
				GROUP BY pl.id
				ORDER BY pl.name ASC
				");
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				Cache::write('sitemapdatabn', $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read('sitemapdatabn', 'long');
				$parentCats = Cache::read('parentCats', 'long');
			}
			
		}else{
			$disableCache = true;
			$fieldName = 'name';
			if(Cache::read('sitemapdataen', 'long') == false  || $disableCache == true){
				
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE 
				pl.topcat = 1 AND pl.isactive = 1
				GROUP BY pl.id
				ORDER BY pl.name ASC
				");
				//debug($categories);
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				Cache::write('sitemapdataen', $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read('sitemapdataen', 'long');
				$parentCats = Cache::read('parentCats', 'long');
				//debug($categories);
			}
			
		}
		$title_for_layout = __('Sitemap');
		
		$this->set(compact('title_for_layout','categories','parentCats','queryCountry','passCountryName','passCountryId'));
	}
	
	public function subcategories(){
		if(isset($this->params['page'])){
		$this->request->params['named']['page'] = $this->params['page']?$this->params['page']:1;
		}
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$this->loadModel('Information.Point');
		$this->loadModel('Information.PlaceType');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		//debug($this->params);exit;
		$catname = $this->params['category'];
		$passID = $this->params['id'];
		$queryCountry = $this->params['country'];
		if($queryCountry == 'all'){
			$passCountryName = '';
			$passCountryId = '';
		}else if($queryCountry == ''){
			$passCountryName = '';
			$passCountryId = '';
		}else if(isset($this->params['country']) && is_numeric($this->params['country'])){
			$passCountryName = '';
			$passCountryId = '';
		}else{
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name","Country.id")));
			$passCountryName = $countryName['Country']['name'];
			$passCountryId = $countryName['Country']['id'];
		}
		
		if(isset($this->params['character'])){
			$character = $this->params['character'];
		}else{
			$character = '';
		}
		$stringlength = strlen($this->params['category']);
		$cutlength = strlen($stringlength);
		$combindedID = $this->params['id'];
		$passcounter = substr($combindedID,0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		$id = substr($combindedID,$cutlength);
		$parentID = substr($id,0,-4);
		$childs = $this->getchilds($parentID,$array);
		$childs = $this->getchilds($parentID,$array);
		if($childs == null){
			$childs[] = $parentID;
		}else{
			array_push($childs,$parentID);
		}
		//debug($childs); exit;
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			"PlaceType.$fieldName as name",
			'PlaceType.singlename',
			'PlaceType.seo_name'
			)
		);
		
		$pointDetails = $this->PlaceType->find('first', $options);
		//debug($pointDetails);exit;
		$singleName = $pointDetails['PlaceType']['singlename'];
		$parent_seo_name = $pointDetails['PlaceType']['seo_name'];
		$PlaceTypeID = $pointDetails['PlaceType']['id'];
		$entries = $this->_allcatitems($id,$singleName,$childs,$character,$queryCountry);
		//debug($entries);exit;
		$breadcumpArray = $this->generatebreadcump($parentID,$breadCumb);
		$parentCats = '';
		$disableCache = $this->Session->read('Config.cachestate');
		$disableCache = true;
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			if(Cache::read("subcatbn$parentID", 'long') == false || $disableCache == true){
				//$categories = $this->Point->query("SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id WHERE pl.parentid = $parentID AND p.private = 0 AND p.active = 1 AND pl.isactive = 1 GROUP BY p.place_type_id");
				/*
				$categories = $this->Point->query("
				SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				LEFT JOIN place_types AS pl2
					ON pl2.parentid = pl.id
				LEFT JOIN place_types AS pl3
					ON pl3.parentid = pl2.id
				LEFT JOIN points AS p
					ON pl.id = p.place_type_id
					OR pl2.id = p.place_type_id
					OR pl3.id = p.place_type_id
				WHERE pl.parentid = $parentID AND
				p.private = 0 AND p.active = 1 AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				*/
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE pl.parentid = $parentID
				AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				Cache::write("subcatbn$parentID", $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read("subcatbn$parentID", 'long');
				$parentCats = Cache::read('parentCats', 'long');
			}
			
		}else{
			$fieldName = 'name';
			if(Cache::read("subcaten$parentID", 'long') == false  || $disableCache == true){
				//$categories = $this->Point->query("SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id WHERE pl.parentid = $parentID AND p.private = 0 AND p.active = 1 AND pl.isactive = 1 GROUP BY p.place_type_id");
				/*
				$categories = $this->Point->query("
				SELECT COUNT(p.id) AS total,pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				LEFT JOIN place_types AS pl2
					ON pl2.parentid = pl.id
				LEFT JOIN place_types AS pl3
					ON pl3.parentid = pl2.id
				LEFT JOIN points AS p
					ON pl.id = p.place_type_id
					OR pl2.id = p.place_type_id
					OR pl3.id = p.place_type_id
				WHERE pl.parentid = $parentID AND
				p.private = 0 AND p.active = 1 AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				*/
				
				$categories = $this->Point->query("
				SELECT pl.id, pl.$fieldName as name,pl.seo_name,pl.icon
				FROM place_types AS pl
				WHERE pl.parentid = $parentID
				AND pl.isactive = 1
				GROUP BY pl.id, pl.name
				ORDER BY pl.name ASC
				");
				//debug($categories);exit;
				$hasChilds = $this->PlaceType->find('all',array('fields' => array('DISTINCT(PlaceType.parentid)'),'conditions' => array('PlaceType.parentid !=' => 0,'PlaceType.isactive' => 1)));
				foreach($hasChilds as $pCat){
					$parentCatId = $pCat['PlaceType']['parentid'];
					$parentCats[] = $parentCatId;
				}
				//debug($parentCats);exit;
				Cache::write("subcaten$parentID", $categories, 'long'); 
				Cache::write('parentCats', $parentCats, 'long'); 
			}else{
				$categories = Cache::read("subcaten$parentID", 'long');
				$parentCats = Cache::read('parentCats', 'long');
			}
			
		}
			if(isset($pointDetails['PlaceType']['name'])){
				$categoryName = $pointDetails['PlaceType']['name'];
				$title_for_layout = $categoryName. __(' Informations');
			}
			$this->loadModel('Country');
			$countries = $this->Country->find('list',array('fields'=> array('Country.id','Country.name')));
			//debug($countries); exit;
		$this->set(compact('title_for_layout','categories','parentCats','catname','passID','categoryName','breadcumpArray','entries','parent_seo_name','PlaceTypeID','character','countries','queryCountry','passCountryName','passCountryId'));
	}
	
	public function updateLatLng($className,$addressone,$addresstwo,$addressthree){
					if(!empty($institute['Institute']['location'])){
						$a1 = $institute['Institute']['location'];
						$a1 = explode(' ',$a1);
						if(count($a1) > 0){
							$aa1 = '';
							foreach($a1 as $a){
								//debug($a);exit;
								$aa1 .= $a.'+';
							}
							$aa1 = rtrim($aa1,'+');
						}
						$aa1 = $aa1;
					}
					
					if(!empty($institute['Institute']['post_office'])){
						$a2 = $institute['Institute']['post_office'];
						$a2 = explode(' ',$a2);
						if(count($a2) > 0){
							$aa2 = '';
							foreach($a1 as $a){
								//debug($a);exit;
								$aa2 .= $a.'+';
							}
							$aa2 = rtrim($aa2,'+');
						}
						$aa2 = $aa2;
					}
					
					if(!empty($institute['Institute']['thana'])){
						$a3 = $institute['Institute']['thana'];
						$a3 = explode(' ',$a3);
						if(count($a3) > 0){
							$aa3 = '';
							foreach($a3 as $a){
								//debug($a);exit;
								$aa3 .= $a.'+';
							}
							$aa3 = rtrim($aa3,'+');
						}
						$aa3 = $aa3;
					}
					if(!empty($institute['Institute']['district'])){
						$a4 = $institute['Institute']['district'];
						$a4 = explode(' ',$a4);
						if(count($a4) > 0){
							$aa4 = '';
							foreach($a4 as $a){
								//debug($a);exit;
								$aa4 .= $a.'+';
							}
							$aa4 = rtrim($aa4,'+');
						}
						$aa4 = $aa4;
					}
					if(!empty($institute['Institute']['division'])){
						$a5 = $institute['Institute']['division'];
						$a5 = explode(' ',$a5);
						if(count($a5) > 0){
							$aa5 = '';
							foreach($a5 as $a){
								//debug($a);exit;
								$aa5 .= $a.'+';
							}
							$aa5 = rtrim($aa5,'+');
						}
						$aa5 = $aa5;
					}
					$addressn = $aa3.','.$aa4.',Bangladesh';
					
					echo $address = $addressn;
					
					$url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
					//echo $url;
					//exit;
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					//debug($response_a);exit;
					$lat = $response_a->results[0]->geometry->location->lat;
					$long = $response_a->results[0]->geometry->location->lng;
					$address = $response_a->results[0]->formatted_address;
					
					$this->Institute->read(null, $institute['Institute']['id']);
					$this->Institute->set('address', $address);
					$this->Institute->set('lat', $lat);
					$this->Institute->set('lng', $long);
					$this->Institute->save();
	}
	public function getchilds($id, &$array = null){
		$this->loadModel('Information.PlaceType');
		$options = array(
			'conditions' => array('PlaceType.parentid' => $id)
		);
		
		$allChildCats = $this->PlaceType->find('list', $options);
		foreach($allChildCats as $k => $v){
			//debug($k);exit;
			$array[] = $k;
			$this->getchilds($k,$array);
		}
		return $array;
	}
	
	public function getparents($id, $array = null){
		$this->loadModel('Information.PlaceType');
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			'PlaceType.name',
			'PlaceType.seo_name',
			'PlaceType.parentid',
			)
		);
		
		$parentDetails = $this->PlaceType->find('first', $options);
		$currentLng = $this->Session->read('Config.language');
		//$array[]['placetype_id'] = $parentDetails['PlaceType']['id'];
		//$array[]['placetype_name'] = $parentDetails['PlaceType']['name'];
		//$array[]['placetype_seo_name'] = $parentDetails['PlaceType']['seo_name'];
		//debug($parentDetails);exit;
		$array[] = $parentDetails;
		if($parentDetails['PlaceType']['parentid'] != 0){
			$this->getparents($parentDetails['PlaceType']['parentid'],$array);
		}
		//debug($array);exit;
		return $array;
	}
	
	public function categories(){
		//debug($this->params);exit;
		if(isset($this->params['page'])){
		$this->request->params['named']['page'] = $this->params['page']?$this->params['page']:1;
		}
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			$fieldAddress = 'bn_address';
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
		}
		//debug($this->params->pass);exit;
		$catname = $this->params['category'];
		$passID = $this->params['id'];
		$queryCountry = $this->params['country'];
		$passCountryName  = $this->params['country'];
		
		if(is_numeric($queryCountry)){
			//debug($this->params);exit;
			if(isset($this->params->pass[1])){
				$character = $this->params->pass[1];
			}else{
				$character = '';
			}
			$queryCountry = 'all';
			$combindedID = $this->params->pass[0];
			$stringlength = strlen($this->params->pass[2]);
			$passCountryName  = $this->params->pass[4];
			$catname = $this->params->pass[2];
			$passID = $this->params->pass[0];
			if(isset($this->params->pass[4])){
				$this->request->params['named']['page'] = $this->params->pass[4]?$this->params->pass[4]:1;
			}
		}else{
			if(isset($this->params['character'])){
				$character = $this->params['character'];
			}else{
				$character = '';
			}
			$combindedID = $this->params['id'];
			$stringlength = strlen($this->params->pass[1]);
			$passCountryName  = $this->params['country'];
			$catname = $this->params['category'];
			$passID = $this->params['id'];
			if(isset($this->params['page'])){
				$this->request->params['named']['page'] = $this->params['page']?$this->params['page']:1;
			}
		}
		
		
		if($queryCountry == 'all'){
			$countryName = '';
		}else if($queryCountry == ''){
			$countryName = '';
		}else if(is_numeric($queryCountry)){
			$countryName = '';
		}else{
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name")));
			$countryName = $countryName['Country']['name'];
		}
		
		$cutlength = strlen($stringlength);
		$passcounter = substr($combindedID,0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		$id = substr($combindedID,$cutlength);
		$id = substr($id,0,-4);
		$childs = $this->getchilds($id,$array);
		//debug($childs); exit;
		if($childs == null){
			$childs[] = $id;
		}else{
			array_push($childs,$id);
		}
		//debug($childs); exit;
		
		$this->loadModel('Information.PlaceType');
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			"PlaceType.$fieldName as name",
			'PlaceType.singlename',
			'PlaceType.seo_name'
			)
		);
		
		$pointDetails = $this->PlaceType->find('first', $options);
		
		//debug($pointDetails);exit;
		$singleName = $pointDetails['PlaceType']['singlename'];
		$parent_seo_name = $pointDetails['PlaceType']['seo_name'];
		$PlaceTypeID = $pointDetails['PlaceType']['id'];
		
		
		$entries = $this->_allcatitems($id,$singleName,$childs,$character,$queryCountry);
		//debug($entries);exit;
		$breadcumpArray = $this->generatebreadcump($PlaceTypeID,$breadCumb);
		
			if(isset($pointDetails['PlaceType']['name'])){
				$categoryName = $pointDetails['PlaceType']['name'];
				$title_for_layout = $categoryName. __(' Informations');
			}
		//debug($entries);exit;
		$this->set(compact('title_for_layout','entries','passID','catname','categoryName','breadcumpArray','parent_seo_name','PlaceTypeID','character','queryCountry','passCountryName','countryName'));
	}
	public function _allcatitems($id,$singleName,$childs,$character,$queryCountry){
		$this->loadModel('Information.PlaceType');
		$currentLng = $this->Session->read('Config.language');
		//echo $singleName;exit;
		if($currentLng == 'bn'){
			if(!in_array($singleName ,array('motorcycle'))){
				$fieldName = 'bn_name';
				$fieldAddress = 'bn_address';
			}
			else{
				$fieldName = 'name';
			}
			
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
		}
		
		
		//debug($character);exit;
		$className = ucfirst($singleName);
		$loadModelName = 'Information.'.ucfirst($singleName);
		//debug($loadModelName);exit;
		$this->loadModel($loadModelName);
		$searchString = '';
		if(!empty($character)){
			$searchString[] = array("$className.name LIKE " => $character.'%');
		}
		
		if(!empty($singleName)){
			//echo $singleName;exit;
			if($singleName == 'topicData'){
			$searchString[] = array("TopicData.place_type_id" => $childs);
			$searchString[] = array("Point.active " => 1);
			}else if($singleName == 'animal'){
			$searchString[] = array("Animal.place_type_id" => $childs);
			}else if($singleName == 'doctor'){
			$searchString[] = array("Doctor.place_type_id" => $childs);
			}else if($singleName == 'continent'){
			$searchString[] = array("Continent.place_type_id" => $childs);
			}else if($singleName == 'medicine'){
			$searchString[] = array("Medicine.place_type_id" => $childs);
			}else if($singleName == 'motorcycle'){
			$searchString[] = array("Motorcycle.place_type_id" => $childs);
			}else if($singleName == 'babyName'){
			$searchString[] = array("BabyName.place_type_id" => $childs);
			}else{
				//echo $queryCountry.'rrr';exit;
				if($queryCountry == 'all'){
					$searchString[] = array("$className.place_type_id" => $childs);
				}else if($queryCountry == ''){
					$searchString[] = array("$className.place_type_id" => $childs);
				}else{
					
					$this->loadModel('Country');
					$countryId = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array('Country.id')));
					$countryId = $countryId['Country']['id'];
					$searchString[] = array("$className.place_type_id" => $childs,"$className.country_id" => $countryId);
				}
			
			}
		}
		
		if($singleName == 'topicData'){
			$className = 'TopicData';
			$this->loadModel($className);
			$this->$className->bindModel(array(
					'hasOne' => array(
					
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
					
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'Zone' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = Zone.id')
						)
					
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					'PlaceType.type_image',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.bn_name",
					"$className.short_description",
					"$className.bn_short_description",
					"$className.details",
					"$className.bn_details",
					"$className.image",
					"Point.id",
					"Point.name",
					"Point.seo_name",
					"Point.bn_name",
					"Point.image",
					"Country.$fieldName as name",
					"Country.seo_name",
					"Country.id",
					"Zone.$fieldName as name",
					"Zone.seo_name",
					"Zone.id",
					),
					'limit' => 10,
					'order' => "Point.name ASC",
			);
		
		}else if($singleName == 'animal'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.full_name as name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.full_name ASC",
			);
		
		}else if($singleName == 'doctor'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'continent'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.seo_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'bloodNews'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'medicine'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name"
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if($singleName == 'onlinetest'){
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name"
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if(in_array($singleName,array('babyName'))){
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.pluralname',
					'PlaceType.seo_name',
					"$className.id",
					"$className.name",
					"$className.seo_name",
					"$className.sex_id",
					"$className.bn_name",
					"$className.meaning",
					),
					'limit' => 10,
					'order' => "$className.name ASC",
			);
		
		}else if(in_array($singleName,array('motorcycle'))){
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					),
				'limit' => 10,
				'order' => "$className.name ASC",
			);
		
		}else{
			
			$this->$className->bindModel(array(
					'hasOne' => array(
					/*
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id","Point.place_type_id = $PlaceTypeID")
						),
					*/
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("$className.country_id = Country.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				)
			);
			
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					'Country.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
				'limit' => 10,
				'order' => "$className.name ASC",
			);
		
		}
			
			//debug($searchOptions);exit;
			
			
			
			$this->$className->recursive = 1;
			$this->paginate = $searchOptions;
			
			
			$entries = $this->paginate($className);
			//debug($entries);exit;
			return $entries;
	}
	public function categoryitem(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$metadescription = '';
		$this->loadModel('Point');
		$this->Point->recursive = -1;
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$id = $this->params->query['id'];
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$infoGroup = $this->Point->find('first',array('conditions' => array('Point.id' => $id)));
		$infoType = $infoGroup['Point']['place_type_id'];
		//debug($infoType);exit;
		if(in_array($infoType,array('1','2',))){
		$this->loadModel('Place');
		$this->Place->recursive = 1;
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$place = $this->Place->find('first', $options);
		//debug($place);
		if(!empty($place['Place']['keyword'])){
			$keywords = $place['Place']['keyword'];
		}else{
			$keywords = $place['Place']['name']." Details, Information about ".$place['Place']['name'];
		}
		if(!empty($place['Place']['metatag'])){
			$metadescription = $place['Place']['metatag'];
		}else{
			$metadescription.= $place['Place']['name'].' listed in '.$place['PlaceType']['name'].' category,';
			$metadescription.= 'located in '.$place['BdDistrict']['name'].'.';
			if(!empty($place['Place']['phone'])){
			$metadescription.= 'Contact information of '.$place['PlaceType']['name'].': Phone: '.$place['Place']['phone'].',';
			}
			if(!empty($place['Place']['web'])){
			$metadescription.= 'Website url of '.$place['PlaceType']['name'].' is: '.$place['Place']['web'].',';
			}
			$metadescription.=	'Here you can view Details information of '.$place['Place']['name'].' with Map location, Address, etc.';
			
		}
		$district = $place['Place']['bd_district_id'];
		$category = $place['Place']['place_type_id'];
		$title_for_layout = $place['Place']['name']. ' details in OxiMap Site';
		
		$fields = array('Place.name','Place.id','Place.seo_name','Place.address','PlaceType.seo_name','PlaceType.icon');
		$options = array('conditions' => array('Place.id !=' => $id,'Place.active' => 1,'Place.place_type_id' => $category,'Place.bd_district_id' => $district),'limit' => 8,'fields'=> $fields);
		$this->Place->bindModel(array(
            'hasMany' => array(
				'PlaceImage' => array(
					'className' => 'PlaceImage',
					'fields' => array('PlaceImage.file as topimage')
				)
		)));
		$nearbyPlace = $this->Place->find('all', $options);
		//debug($nearbyPlace);
		$this->set(compact('title_for_layout','place', 'nearbyPlace','keywords','metadescription'));
		}
		
		
	}
	
	
	public function areatype(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'locate';
		
	}
	
	public function privacy_policy(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$title_for_layout = __('Privacy & Policy');
		$this->set(compact('title_for_layout'));
	
	}
	
	public function terms_condition(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$title_for_layout = __('Terms & Condition');
		$this->set(compact('title_for_layout'));
	
	}
	public function contact(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$title_for_layout = __('Contact Us');
		$this->set(compact('title_for_layout'));
	
	}
	public function aboutus(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$title_for_layout = __('About Us');
		$this->set(compact('title_for_layout'));
	
	}
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	 public function send_email($dest=null){
					$Email = new CakeEmail('gmail');
					$Email->to($dest);
					$Email->subject('Automagically generated email');
					$Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
					$Email->from ('your_user@gmail.com');
					$Email->send();
			return $this->redirect(array('action' => 'index'));
	}
	public function send_html_email($dest=null, $aMsg=null)
	{
			$Email = new CakeEmail('gmail');
			$Email->to($dest);
			$Email->emailFormat('html');
			$Email->template('mytemplate')->viewVars( array('aMsg' => $aMsg));
			$Email->subject('Automagically generated email');
			$Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
			$Email->from ('your_user@gmail.com');
			$Email->send();
		   return ;
	}
	public function dashboard(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'dashboard';
		$this->loadModel('Point');
		$this->Point->PlaceType->recursive = -1;
		//$categories = $this->Point->query("SELECT COUNT(p.id) AS total, (SELECT COUNT(p.id) AS pl.id, pl.name,pl.seo_name,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id WHERE p.private = 0 AND p.active = 0 GROUP BY p.place_type_id");
		$query = "
				SELECT 
					SUM(IF(p.active = 1,1,0)) AS totalactive, 
					SUM(IF(p.active = 0,1,0)) AS totalinactive, 
					count(p.id) AS total,
					pl.id, pl.name,pl.seo_name,pl.singlename ,pl.icon FROM points p LEFT JOIN place_types pl ON p.place_type_id = pl.id GROUP BY p.place_type_id
				";
		$placeTypes = $this->Point->query($query);
		
		//$placeTypes = $this->Place->PlaceType->find('all',array('order' => array('PlaceType.name ASC' )));
		//debug($placeTypes);exit;
		$this->set('title_for_layout','Find Places In your Area');
		$this->set(compact('placeTypes'));
	
	}
	
	public function savemapimage(){
				$this->autoRender = false;
				//debug($this->request->params);exit;
				$stringlength = strlen($this->params['named']['slug']);
				$cutlength = strlen($stringlength);
				$combindedID = $this->request->params['named']['id'];
				$passcounter = substr($combindedID,0,$cutlength);
				if($passcounter != $stringlength){
					throw new NotFoundException(__('Invalid Item'));
				}
				$id = substr($combindedID,$cutlength);
				//$id = substr($id,0,-4);
				$lat = $this->request->params['named']['lat'];
				$lng = $this->request->params['named']['lng'];
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->loadModel('Information.Point');
					$this->Point->id = $id;
					$this->Point->saveField('map', $imageName);
				}
				
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Siteaction->create();
			if ($this->Siteaction->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'siteaction')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Siteaction->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'siteaction')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Siteaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'siteaction')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Siteaction->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'siteaction')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'siteaction')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Siteaction.' . $this->Siteaction->primaryKey => $id));
			$this->request->data = $this->Siteaction->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Siteaction->id = $id;
		if (!$this->Siteaction->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'siteaction')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Siteaction->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Siteaction')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Siteaction')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Siteaction->recursive = 0;
		$this->set('siteactions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Siteaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'siteaction')));
		}
		$options = array('conditions' => array('Siteaction.' . $this->Siteaction->primaryKey => $id));
		$this->set('siteaction', $this->Siteaction->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Siteaction->create();
			if ($this->Siteaction->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'siteaction')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Siteaction->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'siteaction')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Siteaction->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'siteaction')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Siteaction->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'siteaction')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'siteaction')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Siteaction.' . $this->Siteaction->primaryKey => $id));
			$this->request->data = $this->Siteaction->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Siteaction->id = $id;
		if (!$this->Siteaction->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'siteaction')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Siteaction->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Siteaction')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Siteaction')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function searchitem(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		if(isset($this->params['page'])){
		$this->request->params['named']['page'] = $this->params['page']?$this->params['page']:1;
		}
		$searchString = '';
		$selectFirst = 	'';
		//debug($this->params);exit;
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
			}else{
				$fieldName = 'name';
			}
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			if(!empty($this->request->data['Siteaction']['searchname'])){
				$matchTerm = str_replace(' ','%',$this->request->data['Siteaction']['searchname']);
				$selectFirst = explode(' ',$this->request->data['Siteaction']['searchname']);
				$selectFirst = $selectFirst[0];
				
			}
			$locaTionMatchString = '';
			if(!empty($matchTerm)){
				$searchString[] = array(
										"OR" => array(
										"Point.name LIKE" => "%".$matchTerm."%",
										"Point.bn_name LIKE" => "%".$matchTerm."%"
										)
										);
			}else{
			}
			
			if(!empty($this->request->data['Siteaction']['locationTypes'])){
				if(!empty($this->request->data['Siteaction']['locationId'])){
					$location = $this->request->data['Siteaction']['location'];
					$locationId = $this->request->data['Siteaction']['locationId'];
					$locationType = $this->request->data['Siteaction']['locationTypes'];
					
					$this->Session->write('searchCountryName',$location);
					$this->Session->write('searchCountryId',$locationId);
				}else{
					$locationId = 18;
					$locationType = 'c';
				}
				
				if($locationType == 'd'){
					$searchString[] = array("Point.bd_district_id" => $locationId);
				}else if($locationType == 'c'){
					$searchString[] = array("Point.country_id" => $locationId);
				}
				
			}
			
			
			//$itemid = $this->request->data['Siteaction']['place_id'];
			
			
			$searchString[] = array('Point.private' => 0);
			$searchString[] = array('Point.active' => 1);
		}
		//debug($searchString);exit;
		if(!empty($this->params['string'])){
			$matchTerm = str_replace(' ','%',$this->params['string']);
			$selectFirst = explode('%',$this->params['string']);
			$selectFirst = $selectFirst[0];
			
			if(!empty($matchTerm)){
				$searchString[] = array(
										"OR" => array(
										"Point.name LIKE" => "%".$matchTerm."%",
										"Point.bn_name LIKE" => "%".$matchTerm."%"
										)
										);
			}else{
			}
			$searchString[] = array('Point.private' => 0);
			$searchString[] = array('Point.active' => 1);
		}
		$title_for_layout = __('Your Search Results');
		$this->loadModel('Information.Point');
		/*
		$this->Point->bindModel(array(
					'hasOne' => array(
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
					)
				)
		);
		*/
		//debug($searchString);exit;
		$this->paginate = array(
				'conditions' => $searchString,
				'fields' => array('Point.id',"Point.name","Point.bn_name","Point.address",'Point.seo_name',"PlaceType.$fieldName as name",'PlaceType.icon','PlaceType.seo_name','PlaceType.singlename'),
				'order' => array("CASE WHEN `Point`.`name` LIKE '$selectFirst' THEN 0 WHEN `Point`.`name` LIKE '$selectFirst%' THEN 1  WHEN `Point`.`name` LIKE '%$selectFirst%' THEN 2  ELSE 3  END , `Point`.`name` DESC")
		);
		$places = $this->paginate('Point');
		//debug($places);exit;
		$this->set(compact('title_for_layout','places','matchTerm'));
	}
	
	public function map($category = 'default', $subcategory = null,$id = null) {
		//debug($this->params->pass);exit;
		//$urlID = $this->Point->find('first', array('conditions' => array('Point.seo_name' => ),'fields'=>array('id')));
		//debug($this->params->pass);exit;
		$stringlength = strlen($this->params->pass[1]);
		$cutlength = strlen($stringlength);
		$combindedID = $this->params->pass[2];
		$passcounter = substr($this->params->pass[2],0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		
		if(isset($this->params['country']) && $this->params['country'] != 'all'){
			$queryCountry = $this->params['country'];
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name","Country.id")));
			
			$passCountryName = $countryName['Country']['name'];
			$passCountryId = $countryName['Country']['id'];
		}else{
			$queryCountry = 'all';
			$passCountryName = '';
			$passCountryId = '';
		}
		
		$this->set(compact('queryCountry','passCountryName','passCountryId'));
		
		$id = substr($combindedID,$cutlength);
		$id = substr($id,0,-4);
		$options = array(
			'conditions' => array('Point.id' => $id),
			'fields' =>array(
			'Point.*',
			'PlaceType.id',
			'PlaceType.singlename'
			)
		);
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		
		//$this->Point->recursive = -1;
		$this->loadModel('Information.Point');
		$pointDetails = $this->Point->find('first', $options);
		if (empty($pointDetails['Point']['name'])) {
			$this->Session->setFlash(__('Invalid URL For Access.'));
			return $this->redirect(array('action' => 'index'));
		}
		$id = $pointDetails['Point']['id'];
		//debug($pointDetails);exit;
		$typeid = $pointDetails['PlaceType']['id'];
		$breadcumpArray = $this->generatebreadcump($pointDetails['PlaceType']['id'],$breadCumb);
		$className = ucfirst($pointDetails['PlaceType']['singlename']);
		$singleName = $pointDetails['PlaceType']['singlename'];
		
		
			$layout = $pointDetails['PlaceType']['singlename'];
			$className = ucfirst($pointDetails['PlaceType']['singlename']);
			$singleName = $pointDetails['PlaceType']['singlename'];
			$imageDB = $className.'Image';
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_division_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			
			
			
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					"BdDivision.$fieldName as name",
					"BdDistrict.$fieldName as name",
					"BdThanas.$fieldName as name",
					 "$className.*",
					
				)
			);
			//debug($options);exit;
			$pointDetails = $this->Point->find('first', $options);
			//debug($pointDetails);exit;
			if($className == 'Location'){
				if(!empty($pointDetails[$className]['area1'])){
				$area1 = $pointDetails[$className]['area1'].', ';
				}else{
				$area1 = '';
				}
				if(!empty($pointDetails[$className]['area2'])){
				$area2 = $pointDetails[$className]['area2'].', ';
				}else{
				$area2 = '';
				}
				if(!empty($pointDetails[$className]['area3'])){
				$area3 = $pointDetails[$className]['area3'].', ';
				}else{
				$area3 = '';
				}
				$address = $area3.$area2.$area1;
				
				if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
					$title_for_layout = $pointDetails[$className]['bn_name'].__(' distance and direction in map');
				}else{
					$title_for_layout = $pointDetails[$className]['name'].__(' distance and direction in map');
				}
				
				$latDegree = $this->Operation->degreelat($pointDetails['Point']['lat']);
				$lngDegree = $this->Operation->degreelng($pointDetails['Point']['lng']);
				$placeName = $pointDetails[$className]['name'];
				$country = $pointDetails['Country']['name'];
				
				$metadescription = "Welcome to the $placeName information page. You can view here the full area map of $placeName. $placeName lies in $address  $country and its geographical coordinates are $latDegree, $lngDegree";
				
			}else if($className == 'Stadium'){
				$city = $pointDetails[$className]['city'];
				$address = $pointDetails['Point']['address'];
				$country = $pointDetails['Country']['name'];
				if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
					$title_for_layout = $pointDetails[$className]['bn_name'].__(' distance and direction in map');
				}else{
					$title_for_layout = $pointDetails[$className]['name'].__(' distance and direction in map');
				}
				
				$latDegree = $this->Operation->degreelat($pointDetails['Point']['lat']);
				$lngDegree = $this->Operation->degreelng($pointDetails['Point']['lng']);
				$placeName = $pointDetails[$className]['name'];
				
				
				$metadescription = "Welcome to the $placeName information page. You can view here the full area map of $placeName. $placeName lies in $city  $country and its geographical coordinates are $latDegree, $lngDegree";
				
			}else{
				if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
					$title_for_layout = $pointDetails[$className]['bn_name'].__(' distance and direction in map');
					$metadescription = $pointDetails[$className]['bn_metatag'];
				}else{
					$title_for_layout = $pointDetails[$className]['name'].__(' distance and direction in map');
					$metadescription = $pointDetails[$className]['metatag'];
				}
			
			}
			
			$this->set('title_for_layout', $title_for_layout);
			$this->set('metadescription', $metadescription);
			
			if(!empty($pointDetails[$className]['keyword'])){
			$keyword = $pointDetails[$className]['keyword'];
			}else{
			$keyword = $pointDetails['Point']['name'].','.$pointDetails['BdDistrict']['name'];
			}
			$this->set('keyword', $keyword);
			
			/****************************Load Nearbies Items Start*******************************/
			$nearbies = $this->__nearbies($className,$pointDetails);
			//debug($nearbies);exit;
			/****************************Load Nearbies Items End*******************************/
			
										
			$this->set('place', $pointDetails);
			$this->set('nearbies', $nearbies);
			$this->set('breadcumpArray', $breadcumpArray);
			$selectedTemplate = Configure::read('selectedTemplate');
			$this->layout = $selectedTemplate.$layout;
			$this -> render('map');
	
		
		
	}
	
	public function __nearbies($className, $pointDetails){
		$nearbies = '';
		$this->loadModel('Information.'.$className);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			$fieldAddress = 'bn_address';
			$fieldMetatag = 'bn_metatag';
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
			$fieldMetatag = 'metatag';
		}
		if($className == 'Service'){
			$this->Point->bindModel(array(
						'hasOne' => array(
							$className => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							),
							'BdDivision' => array(
								'foreignKey' => false,
								'conditions' => array('Point.bd_division_id = BdDivision.id')
							),
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"Point.id !=" => $pointDetails['Point']['id'],
									"Point.place_type_id" => $pointDetails['PlaceType']['id'],
									"Point.bd_district_id" => $pointDetails['Point']['bd_district_id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									),
								'fields' => array(
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.totalvisit',
									'Point.created',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
									 "$className.name",
									 "$className.degree",
									 "$className.metatag",
									 "$className.address",
									 
								),
								'order' => array('distance ASC'),
							);
				
				$nearbies = $this->Point->find('all', $options);
		}else if($className == 'Topic'){
			$nearbyoptions = array(
					'limit' => 6,
					'conditions' => array(
						"Point.id !=" => $pointDetails['Point']['id'],
						"Point.place_type_id" => $pointDetails['PlaceType']['id'],
						"Point.bd_district_id" => $pointDetails['Point']['bd_district_id'],
						),
					'fields' => array(
						'Point.*',
						'PlaceType.id',
						"PlaceType.$fieldName as name",
						'PlaceType.icon',
						'PlaceType.seo_name',
						'PlaceType.pluralname',
						"$className.*",
						 
						
					)
				);
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							)
						)
					)
				);
			
				
				$nearbies = $this->$classNam->find('all', $nearbyoptions);
		}else if($className == 'Motorcycle'){
			$nearbyoptions = array(
					'limit' => 6,
					'conditions' => array(
						"Point.id !=" => $pointDetails['Point']['id'],
						"Point.place_type_id" => $pointDetails['PlaceType']['id'],
						),
					'fields' => array(
						'Point.*',
						'PlaceType.id',
						"PlaceType.$fieldName as name",
						'PlaceType.icon',
						'PlaceType.seo_name',
						'PlaceType.pluralname',
						"$className.*",
						 
						
					)
				);
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							)
						)
					)
				);
			
				
				$nearbies = $this->$className->find('all', $nearbyoptions);
				
		}else if($className == 'YellowPage'){
			$nearbyoptions = array(
					'limit' => 6,
					'conditions' => array(
						"Point.id !=" => $pointDetails['Point']['id'],
						"Point.place_type_id" => $pointDetails['PlaceType']['id'],
						"Point.bd_district_id" => $pointDetails['Point']['bd_district_id'],
						),
					'fields' => array(
						'Point.*',
						'PlaceType.id',
						"PlaceType.$fieldName as name",
						'PlaceType.icon',
						'PlaceType.seo_name',
						'PlaceType.pluralname',
						"$className.*",
						 
						
					)
				);
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array('Point.place_type_id = PlaceType.id')
							)
						)
					)
				);
			
				
				$nearbies = $this->$className->find('all', $nearbyoptions);
		}else if($className == 'Hospital'){
			$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							)
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									/*"$className.country_id" => $pointDetails['Point']['country_id'],*/
									),
								'fields' => array(
									"$className.name",
									"$className.bn_name",
									"$className.metatag",
									"$className.seo_name",
									"$className.address",
									"$className.bn_address",
									"$className.image",
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.map',
									'Point.totalvisit',
									'Point.created',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				
				$nearbies = $this->$className->find('all', $options);
			
		}else if($className == 'Institute'){
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							)
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									/*"$className.country_id" => $pointDetails['Point']['country_id'],*/
									),
								'fields' => array(
									"$className.id",
									"$className.name",
									"$className.bn_name",
									"$className.metatag",
									"$className.seo_name",
									"$className.address",
									"$className.bn_address",
									"$className.image",
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.map',
									'Point.totalvisit',
									'Point.created',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				//debug($options);exit;
				$nearbies = $this->$className->find('all', $options);
			
		}else if($className == 'Location'){
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							)
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									"$className.country_id" => $pointDetails['Point']['country_id'],
									),
								'fields' => array(
									"$className.name",
									"$className.bn_name",
									"$className.metatag",
									"$className.seo_name",
									"$className.address",
									"$className.bn_address",
									"$className.image",
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.lat',
									'Point.lng',
									'Point.map',
									'Point.totalvisit',
									'Point.created',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				
				$nearbies = $this->$className->find('all', $options);
			
		}else if($className == 'Airport'){
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'AirportType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.airport_type_id = AirportType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							),
							
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									/*"$className.country_id" => $pointDetails['Point']['country_id'],*/
									),
								'fields' => array(
									"$className.*",
									'AirportType.name',
									'Country.name',
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.map',
									'Point.totalvisit',
									'Point.created',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				
				$nearbies = $this->$className->find('all', $options);
			
		}else if($className == 'Stadium'){
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							),
							
							
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									/*"$className.country_id" => $pointDetails['Point']['country_id'],*/
									),
								'fields' => array(
									"$className.*",
									'Country.name',
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.map',
									'Point.lat',
									'Point.lng',
									'Point.totalvisit',
									'Point.created',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				
				$nearbies = $this->$className->find('all', $options);
			
		}else if($className == 'Animal'){
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
						)
					)
				);
				
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.family" => $pointDetails[$className]['family']
									),
								'fields' => array(
									"$className.*",
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.map',
									'Point.totalvisit',
									'Point.created',
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								)
							);
				
				
				$nearbies = $this->$className->find('all', $options);
			
		}else{
			
				$this->$className->bindModel(array(
						'hasOne' => array(
							'Point' => array(
								'foreignKey' => false,
								'conditions' => array("$className.point_id = Point.id")
							),
							'PlaceType' => array(
								'foreignKey' => false,
								'conditions' => array("$className.place_type_id = PlaceType.id")
							),
							'Country' => array(
								'foreignKey' => false,
								'conditions' => array("$className.country_id = Country.id")
							)
						)
					)
				);
				if(!empty($pointDetails['Point']['lat'])){
				$mainPointLat = $pointDetails['Point']['lat'];
				}else{
				$mainPointLat = 0;
				}
				
				if(!empty($pointDetails['Point']['lng'])){
				$mainPointLng = $pointDetails['Point']['lng'];
				}else{
				$mainPointLng = 0;
				}
				$options = array(
								'limit' => 6,
								'conditions' => array(
									"$className.id !=" => $pointDetails[$className]['id'],
									"$className.place_type_id" => $pointDetails['PlaceType']['id'],
									'Point.lat !=' => '',
									'Point.lng !=' => '',
									/*"$className.country_id" => $pointDetails['Point']['country_id'],*/
									),
								'fields' => array(
									"$className.name",
									"$className.bn_name",
									"$className.metatag",
									"$className.seo_name",
									"$className.address",
									"$className.bn_address",
									"$className.image",
									'Point.id',
									'Point.name',
									'Point.seo_name',
									'Point.totalvisit',
									'Point.created',
									'Point.map',
									'Point.lat',
									'Point.lng',
									'Country.seo_name',
									"( 9459 * ACOS( COS( RADIANS($mainPointLat) ) * COS( RADIANS(Point.lat) ) * COS( RADIANS(Point.lng) - RADIANS($mainPointLng) ) + SIN( RADIANS($mainPointLat) ) * SIN( RADIANS(Point.lat) ) ) ) AS distance",
									'PlaceType.id',
									"PlaceType.$fieldName as name",
									'PlaceType.icon',
									'PlaceType.seo_name',
									'PlaceType.pluralname',
								),
								'order' => array('distance ASC'),
							);
				
				//debug($options);exit;
				$nearbies = $this->$className->find('all', $options);
		}
		return $nearbies;
	}
	
	public function placesearch(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		$searchString = '';
		//debug($this->request->data);exit;
			unset($this->params['language']);
			$currentLng = $this->Session->read('Config.language');
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
			}else{
				$fieldName = 'name';
			}
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$itemname = $this->request->data['Siteaction']['placename'];
			if(isset($this->request->data['Siteaction']['placetypeid']) && !empty($this->request->data['Siteaction']['placetypeid'])){
				$itemid = $this->request->data['Siteaction']['placetypeid'];
				$searchString[] = array('Point.place_type_id' => $itemid);
			}
			if(!empty($itemname)){
				$searchString[] = array(
										"OR" => array(
										"Point.name LIKE" => "%".$itemname."%",
										"Point.bn_name LIKE" => "%".$itemname."%"
										)
										);
				
			}else{
			}
			
			$searchString[] = array('Point.private' => 0);
			$searchString[] = array('Point.active' => 1);
			//debug($searchString);exit;
		}
		$title_for_layout = __('Your Search Results');
		$this->loadModel('Information.Point');
		$this->Point->bindModel(array(
					'hasOne' => array(
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
					)
				)
		);
		$this->paginate = array(
				'conditions' => $searchString,
				'fields' => array('Point.id',"Point.name","Point.bn_name",'Point.seo_name',"BdDivision.$fieldName as name","BdThanas.$fieldName as name","BdDistrict.$fieldName as name","PlaceType.$fieldName as name",'PlaceType.icon','PlaceType.seo_name','PlaceType.singlename'),
				'order' => array(
					'Point.name' => 'ASC'
				)
		);
		$places = $this->paginate('Point');
		//debug($places);exit;
		$this->set(compact('title_for_layout','places'));
	}
	
	public function continents(){
		$this->loadModel('Information.Continent');	
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$this->Continent->recursive = 1;
		$continents = $this->Continent->find('all');
		$title_for_layout = '7 Continents of the World';
		//debug($continents); exit;
		$this->set(compact('title_for_layout','continents'));
	}
	
	public function countries(){
		//debug($this->params);exit;
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'continents';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$pointID = $this->params->pass[2];
		$pointID = substr($pointID,0,-4);
		$this->loadModel('Information.Point');	
		$this->Point->bindModel(array(
			'hasOne' => array(
						'Continent' => array(
							'foreignKey' => false,
							'fields' => array('Continent.id'),
							'conditions' => array("Continent.point_id = Point.id")
						),
			))			
		);
		$aboutPoint = $this->Point->find('first',array('fields' => array('Continent.id'),'conditions' => array('Point.id' => $pointID)));
		//debug($aboutPoint);exit;
		$continentID = $aboutPoint['Continent']['id'];
		$this->loadModel('Information.Continent');	
		$this->Continent->recursive = 1;
		$this->Continent->bindModel(array(
			'hasOne' => array(
						'PlaceType' => array(
							'foreignKey' => false,
							'fields' => array('PlaceType.id','PlaceType.name','PlaceType.bn_name','PlaceType.seo_name'),
							'conditions' => array("PlaceType.id = Continent.place_type_id")
						),
			),
			'hasMany' => array(
						'Country' => array(
							'foreignKey' => false,
							'fields' => array('Country.id','Country.point_id','Country.name','Country.bn_name','Country.title','Country.bn_title','Country.seo_name','Country.flag','Country.seo_title'),
							'conditions' => array("Country.continent_id = $continentID")
			)))			
		);
		
		
		$aboutContinent = $this->Continent->find('first',array('conditions' => array('Continent.id' => $continentID)));
		
		
		//debug($aboutContinent);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_title';
		}else{
			$fieldName = 'title';
		}
		$title_for_layout = $aboutContinent['Continent'][$fieldName];
		$this->set(compact('title_for_layout','aboutContinent'));
	}
	
	public function world(){
		//debug($this->params);exit;
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'continents';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$this->loadModel('General.Country');	
		$this->Country->recursive = -1;
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		
		$countries = $this->Country->find('all',array(
								'conditions' => array('Country.status' => 1,'Country.flag !=' => ''),
								'fields' => array('Country.id','Country.point_id',"Country.$fieldName as name",'Country.seo_name','Country.flag','Country.seo_title'),
								'order' => "Country.order ASC"
								));
		
		//debug($countries);exit;
		$title_for_layout = 'World Countries';
		$this->set(compact('title_for_layout','countries'));
	}
	
	public function country_details(){
		//debug($this->params);exit;
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'continents';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		$stringlength = strlen($this->params->pass[1]);
		$cutlength = strlen($stringlength);
		$combindedID = $this->params->pass[2];
		$passcounter = substr($this->params->pass[2],0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		$this->loadModel('Information.Point');
		$id = substr($combindedID,$cutlength);
		$countryID = substr($id,0,-4);
		$this->loadModel('General.Country');	
		$this->Country->recursive = 0;
		$this->Country->bindModel(array(
			'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = Country.point_id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("PlaceType.id = Continent.place_type_id")
						),
						'CountryAntheme' => array(
							'foreignKey' => false,
							'conditions' => array("CountryAntheme.country_id = Country.id")
						),
						'CountryCallingCode' => array(
							'foreignKey' => false,
							'conditions' => array("CountryCallingCode.country_id = Country.id")
						),
						'CountryCapital' => array(
							'foreignKey' => false,
							'conditions' => array("CountryCapital.country_id = Country.id")
						),
						'CountryCurrency' => array(
							'foreignKey' => false,
							'conditions' => array("CountryCurrency.country_id = Country.id")
						),
						'CountryDomain' => array(
							'foreignKey' => false,
							'conditions' => array("CountryDomain.country_id = Country.id")
						),
						'CountryLanguage' => array(
							'foreignKey' => false,
							'conditions' => array("CountryLanguage.country_id = Country.id")
						),
						'CountryPopulationAge' => array(
							'foreignKey' => false,
							'conditions' => array("CountryPopulationAge.country_id = Country.id")
						),
						'CountryPopulation' => array(
							'foreignKey' => false,
							'conditions' => array("CountryPopulation.country_id = Country.id")
						),
						'CountryReligion' => array(
							'foreignKey' => false,
							'conditions' => array("CountryReligion.country_id = Country.id")
						),
						'CountryTimezone' => array(
							'foreignKey' => false,
							'conditions' => array("CountryTimezone.country_id = Country.id")
						),
						'CountryDetail' => array(
							'foreignKey' => false,
							'conditions' => array("CountryDetail.country_id = Country.id")
						),
			))
			
		);
		
		
		$aboutCountry = $this->Country->find('first',array('conditions' => array('Country.id' => $countryID)));
		
		
		//debug($aboutCountry);exit;
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_title';
		}else{
			$fieldName = 'title';
		}
		$title_for_layout = $aboutCountry['Country'][$fieldName];
		$this->set(compact('title_for_layout','aboutCountry'));
	}
	
	public function tags(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'bootstrap';
		unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		if(isset($this->params['country']) && $this->params['country'] != 'all'){
			$queryCountry = $this->params['country'];
			$this->loadModel('Country');
			$countryName = $this->Country->find('first',array('conditions'=>array('Country.seo_name' => $queryCountry),'fields'=>array("Country.$fieldName as name","Country.id")));
			
			$passCountryName = $countryName['Country']['name'];
			$passCountryId = $countryName['Country']['id'];
		}else{
			$queryCountry = 'all';
			$passCountryName = '';
			$passCountryId = '';
		}
		
		$this->set(compact('queryCountry','passCountryName','passCountryId'));
		
		if(isset($this->params['page'])){
		$this->request->params['named']['page'] = $this->params['page']?$this->params['page']:1;
		}
		//debug($this->params);exit;
		$passData = $this->params->pass;
		$passID = substr($passData[0],0,-4);
		if(isset($passData[1])){
			$passtype = $passData[1];
		}else{
			$passtype = '';
		}
		if(isset($passData[2])){
			$passseotitle = $passData[2];
		}else{
			$passseotitle = '';
		}
		if(isset($passData[3])){
			$country = $passData[3];
			$passcountry = $passData[3];
		}else{
			$country = '';
			$passcountry = '';
		}
		if(isset($passData[4])){
			$division = $passData[4];
			$passdivision = $passData[4];
		}else{
			$division = '';
			$passdivision = '';
		}
		if(isset($passData[5]) && !empty($passData[5])){
			$district = $passData[5];
			$passdistrict = $passData[5];
		}else{
			$district = '';
			$passdistrict = '';
		}
		if(isset($passData[6])){
			$thana = $passData[6];
			$passthana = $passData[6];
		}else{
			$thana = '';
			$passthana = '';
		}
		$slugid = $passID;
		
		$this->loadModel('Information.PlaceTypeSlug');
		$TagDetails = $this->PlaceTypeSlug->find('first',array(
				'conditions' => array('PlaceTypeSlug.id' => $passID),
				'fields' => array('PlaceTypeSlug.params','PlaceTypeSlug.title','PlaceType.id','PlaceType.singlename'),
		));
		//debug($TagDetails);exit;
		$params = $TagDetails['PlaceTypeSlug']['params'];
		$className = ucfirst($TagDetails['PlaceType']['singlename']);
		$placeTypeID = $TagDetails['PlaceType']['id'];
		$contentTitle = $TagDetails['PlaceTypeSlug']['title'];
		$loadModelName = 'Information.'.$className;
		
		if($className == 'Stadium'){
		
		
		}
		
		$searchString = '';
		
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
			$fieldAddress = 'bn_address';
		}else{
			$fieldName = 'name';
			$fieldAddress = 'address';
		}
		if(!empty($params) && $className == 'Stadium'){
				$paramsArray = explode(',',$params);
				//debug($paramsArray);exit;
				if(in_array('country_id',$paramsArray) && !empty($country)){
					$this->loadModel('General.Country');
					$this->Country->recursive = -1;
					$country = $this->Country->find('first',array('fields' => array('Country.id',"Country.$fieldName as name"),'conditions' =>array('Country.seo_name' => $country)));
					$searchString[] = array('Point.country_id' => $country['Country']['id']);
					$title_for_layout = __($contentTitle,$country['Country']['name']);
				}
				if(in_array('capacity',$paramsArray) && !empty($division) ){
					$searchString[] = array('Stadium.capacity >=' => $division);
					$title_for_layout = __($contentTitle.__(' Capacity Greater Than %s'),$country['Country']['name'],$division);
				}
				
		}
		if(!empty($params) && $className == 'Institute'){
				$paramsArray = explode(',',$params);
				//debug($paramsArray);exit;
				if(in_array('country_id',$paramsArray)){
					$this->loadModel('General.Country');
					$this->Country->recursive = -1;
					$country = $this->Country->find('first',array('fields' => array('Country.id',"Country.$fieldName as name"),'conditions' =>array('Country.seo_name' => $country)));
					$searchString[] = array('Point.country_id' => $country['Country']['id']);
					$title_for_layout = __($contentTitle,$country['Country']['name']);
				}
				if(in_array('bd_division_id',$paramsArray) && !empty($division)){
					$this->loadModel('General.BdDivision');
					$this->BdDivision->recursive = -1;
					$division = $this->BdDivision->find('first',array('fields' => array('BdDivision.id',"BdDivision.$fieldName as name"),'conditions' =>array('BdDivision.seo_name' => $division)));
					$searchString[] = array('Point.zone_id' => $division['BdDivision']['id']);
					$title_for_layout = __($contentTitle,$division['BdDivision']['name']);
				}
				if(in_array('bd_district_id',$paramsArray) && !empty($district)){
					$this->loadModel('General.BdDistrict');
					$this->BdDistrict->recursive = -1;
					$district = $this->BdDistrict->find('first',array('fields' => array('BdDistrict.id',"BdDistrict.$fieldName as name"),'conditions' =>array('BdDistrict.seo_name' => $district)));
					$searchString[] = array('Point.bd_district_id' => $district['BdDistrict']['id']);
					$title_for_layout = __($contentTitle,$district['BdDistrict']['name']);
				}
				if(in_array('bd_thanas_id',$paramsArray) && !empty($thana)){
					$this->loadModel('General.BdThanas');
					$this->BdThanas->recursive = -1;
					$thana = $this->BdThanas->find('first',array('fields' => array('BdThanas.id',"BdThanas.$fieldName as name"),'conditions' =>array('BdThanas.seo_name' => $thana)));
					$searchString[] = array('Point.bd_thanas_id' => $thana['BdThanas']['id']);
					$title_for_layout = __($contentTitle,$thana['BdThanas']['name']);
				}
				if(in_array('SECONDARY_SCHOOL',$paramsArray)){
					$searchString[] = array('Institute.type' => 'SECONDARY_SCHOOL');
				}
				if(in_array('JUNIOR_SCHOOL',$paramsArray)){
					$searchString[] = array('Institute.type' => 'JUNIOR_SCHOOL');
				}
				if(in_array('INTERMEDIATE_COLLEGE',$paramsArray)){
					$searchString[] = array('Institute.type' => 'INTERMEDIATE_COLLEGE');
				}
				if(in_array('MADRASAH',$paramsArray)){
					$searchString[] = array('Institute.type' => 'MADRASAH');
				}
		}
		
		if(!empty($params) && $className == 'Postcode'){
				$paramsArray = explode(',',$params);
				//debug($paramsArray);exit;
				if(in_array('country_id',$paramsArray) && !empty($country)){
					$this->loadModel('General.Country');
					$this->Country->recursive = -1;
					$country = $this->Country->find('first',array('fields' => array('Country.id',"Country.$fieldName as name"),'conditions' =>array('Country.seo_name' => $country)));
					$searchString[] = array('Point.country_id' => $country['Country']['id']);
					$title_for_layout = __($contentTitle,$country['Country']['name']);
				}
				if(in_array('bd_division_id',$paramsArray) && !empty($division) ){
					$this->loadModel('General.BdDivision');
					$this->BdDivision->recursive = -1;
					$division = $this->BdDivision->find('first',array('fields' => array('BdDivision.id',"BdDivision.$fieldName as name"),'conditions' =>array('BdDivision.seo_name' => $division)));
					$searchString[] = array('Point.zone_id' => $division['BdDivision']['id']);
					$title_for_layout = __($contentTitle,$division['BdDivision']['name']);
				}
				if(in_array('bd_district_id',$paramsArray) && !empty($district)){
					$this->loadModel('General.BdDistrict');
					$this->BdDistrict->recursive = -1;
					$district = $this->BdDistrict->find('first',array('fields' => array('BdDistrict.id',"BdDistrict.$fieldName as name"),'conditions' =>array('BdDistrict.seo_name' => $district)));
					$searchString[] = array('Point.bd_district_id' => $district['BdDistrict']['id']);
					$title_for_layout = __($contentTitle,$district['BdDistrict']['name']);
				}
				if(in_array('bd_thanas_id',$paramsArray) && !empty($thana)){
					$this->loadModel('General.BdThanas');
					$this->BdThanas->recursive = -1;
					$thana = $this->BdThanas->find('first',array('fields' => array('BdThanas.id',"BdThanas.$fieldName as name"),'conditions' =>array('BdThanas.seo_name' => $thana)));
					$searchString[] = array('Point.bd_thanas_id' => $thana['BdThanas']['id']);
					$title_for_layout = __($contentTitle,$thana['BdThanas']['name']);
				}
			
		}
		if(!empty($params) && $className == 'Place'){
				$paramsArray = explode(',',$params);
				//debug($paramsArray);exit;
				//debug($paramsArray);
				if(in_array('country_id',$paramsArray) && !empty($country)){
					$this->loadModel('General.Country');
					$this->Country->recursive = -1;
					$country = $this->Country->find('first',array('fields' => array('Country.id',"Country.$fieldName as name"),'conditions' =>array('Country.seo_name' => $country)));
					$searchString[] = array('Point.country_id' => $country['Country']['id']);
					$title_for_layout = __($contentTitle,$country['Country']['name']);
				}
				/*
				if(in_array('bd_division_id',$paramsArray) && !empty($division) ){
					$this->loadModel('General.BdDivision');
					$this->BdDivision->recursive = -1;
					$division = $this->BdDivision->find('first',array('fields' => array('BdDivision.id',"BdDivision.$fieldName as name"),'conditions' =>array('BdDivision.seo_name' => $division)));
					$searchString[] = array('Point.zone_id' => $division['BdDivision']['id']);
					$title_for_layout = __($contentTitle,$division['BdDivision']['name']);
				}
				*/
				if(in_array('bd_district_id',$paramsArray) && !empty($district)){
					$this->loadModel('General.BdDistrict');
					$this->BdDistrict->recursive = -1;
					$district = $this->BdDistrict->find('first',array('fields' => array('BdDistrict.id',"BdDistrict.$fieldName as name"),'conditions' =>array('BdDistrict.seo_name' => $district)));
					$searchString[] = array('Point.bd_district_id' => $district['BdDistrict']['id']);
					$title_for_layout = __($contentTitle,$district['BdDistrict']['name']);
				}
				if(in_array('bd_thanas_id',$paramsArray) && !empty($thana)){
					$this->loadModel('General.BdThanas');
					$this->BdThanas->recursive = -1;
					$thana = $this->BdThanas->find('first',array('fields' => array('BdThanas.id',"BdThanas.$fieldName as name"),'conditions' =>array('BdThanas.seo_name' => $thana)));
					$searchString[] = array('Point.bd_thanas_id' => $thana['BdThanas']['id']);
					$title_for_layout = __($contentTitle,$thana['BdThanas']['name']);
				}
				
				
					
			
		}
		
		if(!empty($params) && $className == 'Airport'){
				$paramsArray = explode(',',$params);
				//debug($paramsArray);exit;
				if(in_array('country_id',$paramsArray) && !empty($country)){
					$this->loadModel('General.Country');
					$this->Country->recursive = -1;
					$country = $this->Country->find('first',array('fields' => array('Country.id',"Country.$fieldName as name"),'conditions' =>array('Country.seo_name' => $country)));
					$searchString[] = array('Point.country_id' => $country['Country']['id']);
					$title_for_layout = __($contentTitle,$country['Country']['name']);
				}
				if(in_array('bd_division_id',$paramsArray) && !empty($division) ){
					$this->loadModel('General.BdDivision');
					$this->BdDivision->recursive = -1;
					$division = $this->BdDivision->find('first',array('fields' => array('BdDivision.id',"BdDivision.$fieldName as name"),'conditions' =>array('BdDivision.seo_name' => $division)));
					$searchString[] = array('Point.zone_id' => $division['BdDivision']['id']);
					$title_for_layout = __($contentTitle,$division['BdDivision']['name']);
				}
				if(in_array('bd_district_id',$paramsArray) && !empty($district)){
					$this->loadModel('General.BdDistrict');
					$this->BdDistrict->recursive = -1;
					$district = $this->BdDistrict->find('first',array('fields' => array('BdDistrict.id',"BdDistrict.$fieldName as name"),'conditions' =>array('BdDistrict.seo_name' => $district)));
					$searchString[] = array('Point.bd_district_id' => $district['BdDistrict']['id']);
					$title_for_layout = __($contentTitle,$district['BdDistrict']['name']);
				}
				if(in_array('bd_thanas_id',$paramsArray) && !empty($thana)){
					$this->loadModel('General.BdThanas');
					$this->BdThanas->recursive = -1;
					$thana = $this->BdThanas->find('first',array('fields' => array('BdThanas.id',"BdThanas.$fieldName as name"),'conditions' =>array('BdThanas.seo_name' => $thana)));
					$searchString[] = array('Point.bd_thanas_id' => $thana['BdThanas']['id']);
					$title_for_layout = __($contentTitle,$thana['BdThanas']['name']);
				}
				if(in_array('heliport',$paramsArray)){
					$searchString[] = array('Airport.airport_type_id' => 1);
				}
				if(in_array('sea_plane_base',$paramsArray)){
					$searchString[] = array('Airport.airport_type_id' => 3);
				}
				if(in_array('largest_airport',$paramsArray)){
					$searchString[] = array('Airport.airport_type_id' => 6);
				}
				
				
					
			
		}
		
		$searchString[] = array('Point.place_type_id' => $placeTypeID);
		//debug($searchString);exit;
		if($className == 'Topic'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
			);
		
		}else if($className == 'Animal'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
			);
		
		}else if($className == 'Institute'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
			
		}else if($className == 'Postcode'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
			
		}else if($className == 'Stadium'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'Point.*',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
			
		}else if($className == 'Continent'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					),
					'limit' => 10,
			);
		
		}else if($className == 'Place'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
		}else if($className == 'Airport'){
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
		}else{
			$searchOptions = array(
				'conditions' => $searchString,
				'fields' => array(
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.singlename',
					'PlaceType.seo_name',
					"$className.id",
					"$className.point_id",
					"$className.name",
					"$className.seo_name",
					"$className.bn_name",
					"$className.address",
					"$className.bn_address",
					),
					'limit' => 10,
			);
			$title_for_layout = __($contentTitle,$country['Country']['name']);
		}
			
		//debug($searchOptions);exit;
			$this->loadModel($loadModelName);
			$this->$className->bindModel(array(
					'hasOne' => array(
					
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
					
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("$className.place_type_id = PlaceType.id")
						),
					/*
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						)
					*/
					)
				),false
			);
			
			$this->$className->recursive = 1;
			$this->paginate = $searchOptions;
			
			
			$entries = $this->paginate($className);
			if(isset($entries[0]['PlaceType']['name'])){
				$categoryName = $entries[0]['PlaceType']['name'];
				//$title_for_layout = $categoryName. __(' Informations');
			}
		//debug($entries);exit;
		$this->set(compact('title_for_layout','entries','slugid','passtype','passcountry','passdivision','passdistrict','passthana','passseotitle'));
	}
	
	public function generatebreadcump($id, &$arraynew = null){
		$this->loadModel('Information.PlaceType');
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		$options = array(
			'conditions' => array('PlaceType.id' => $id),
			'fields' =>array(
			'PlaceType.id',
			"PlaceType.$fieldName as name",
			'PlaceType.seo_name',
			'PlaceType.parentid',
			)
		);
		
		$parentDetails = $this->PlaceType->find('first', $options);
		$currentLng = $this->Session->read('Config.language');
		//$array[]['placetype_id'] = $parentDetails['PlaceType']['id'];
		//$array[]['placetype_name'] = $parentDetails['PlaceType']['name'];
		//$array[]['placetype_seo_name'] = $parentDetails['PlaceType']['seo_name'];
		//debug($parentDetails);exit;
		
		if(isset($parentDetails['PlaceType']['parentid']) && $parentDetails['PlaceType']['parentid'] != 0){
			$options = array(
				'conditions' => array('PlaceType.parentid' => $parentDetails['PlaceType']['id']),
				'fields' =>array(
				'PlaceType.id',
				)
			);
			$hasChild = $this->PlaceType->find('first', $options);
			//debug($hasChild);exit;
			if(isset($hasChild['PlaceType']['id']) && !empty($hasChild['PlaceType']['id'])){
				$parentDetails['hasChild'] = true;
				$arraynew[] = $parentDetails;
			}else{
				$parentDetails['hasChild'] = false;
				$arraynew[] = $parentDetails;
			}
			
			$this->generatebreadcump($parentDetails['PlaceType']['parentid'],$arraynew);
		}else{
			$parentDetails['hasChild'] = true;
			$arraynew[] = $parentDetails;
		}
		//debug($arraynew);exit;
		return $arraynew;
	}
	
	public function mappath(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'defaultmap';
		//debug($this->params);exit;
		$stringlength = strlen($this->params->pass[1]);
		$cutlength = strlen($stringlength);
		$combindedID = $this->params->pass[2];
		$passcounter = substr($this->params->pass[2],0,$cutlength);
		if($passcounter != $stringlength){
			throw new NotFoundException(__('Invalid Item'));
		}
		//unset($this->params['language']);
		$currentLng = $this->Session->read('Config.language');
		if($currentLng == 'bn'){
			$fieldName = 'bn_name';
		}else{
			$fieldName = 'name';
		}
		//debug($_SESSION);exit;
		$className = ucfirst($this->params->pass[0]);
		$this->loadModel("Information.Point");
		$id = substr($combindedID,$cutlength);
		$id = substr($id,0,-4);
			$imageDB = $className.'Image';
			$this->Point->bindModel(array(
					'hasOne' => array(
						$className => array(
							'foreignKey' => false,
							'conditions' => array("$className.point_id = Point.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_division_id = BdDivision.id')
						),
						'BdDistrict' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_district_id = BdDistrict.id')
						),
						'BdThanas' => array(
							'foreignKey' => false,
							'conditions' => array('Point.bd_thanas_id = BdThanas.id')
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			
			
			
			//debug($this->Point);
			//exit;
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				'fields' =>array(
					'Point.id',
					"Point.name",
					"Point.bn_name",
					'Point.seo_name',
					'Point.lat',
					'Point.lng',
					'Point.bd_district_id',
					'Point.place_type_id',
					'Point.address',
					'PlaceType.id',
					"PlaceType.$fieldName as name",
					'PlaceType.icon',
					'PlaceType.seo_name',
					'PlaceType.singlename',
					'PlaceType.pluralname',
					"Country.$fieldName as name",
					"BdDivision.$fieldName as name",
					"BdDistrict.$fieldName as name",
					"BdThanas.$fieldName as name",
					 "$className.*",
					
				)
			);
		$pointDetails = $this->Point->find('first',$options);
		$breadcumpArray = $this->generatebreadcump($pointDetails['PlaceType']['id'],$breadCumb);
		//debug($breadcumpArray);exit;
		//debug($pointDetails);exit;
		if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
			$title_for_layout = $pointDetails[$className]['bn_name'].__(' distance and direction in map');
		}else{
			$title_for_layout = $pointDetails[$className]['name'].__(' distance and direction in map');
		}
		
		$this->set(compact('breadcumpArray','pointDetails','title_for_layout'));
	}
	
	public function locate(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'locate';
		$this->set('title_for_layout','Find Places In your Area');
	}
	
	public function findplace(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'ajax';
		//debug($this->request->data);exit;
		$accessLat = $this->request->data['lat'];
		$accessLng = $this->request->data['lng'];
		$address = $this->request->data['address'];
		//debug($this->request->data);
		/* 
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * 
						COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) *  
						SIN( RADIANS( lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
						WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.lat < places.lat AND ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( lat ) ) ) ) < 4) <= 4
						HAVING distance < 200  ORDER BY place_type_id,distance ASC
					";
		*/
		/*
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( places.lat ) ) * COS( RADIANS( places.lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( places.lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
					WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id > places.id ORDER BY places.lat, places.lng ASC) <= 4
					HAVING distance < 8  ORDER BY place_type_id, distance ASC		
					";
		
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( places.lat ) ) * COS( RADIANS( places.lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( places.lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
					WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id > places.id) <= 4
					HAVING distance < 100 ORDER BY place_type_id, distance ASC		
					";
		*/
		$places = "SELECT places.id,places.name,places.lat,places.lng,places.place_type_id,pt.name,pt.icon, ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * 
		COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) *  
		SIN( RADIANS( lat ) ) ) ) AS distance  FROM places places LEFT JOIN place_types pt ON places.place_type_id = pt.id 
		WHERE (SELECT COUNT(*) FROM places b WHERE b.place_type_id = places.place_type_id AND b.id < places.id AND ( 3959 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) * SIN( RADIANS( lat ) ) ) ) < 4) <= 2
		AND places.place_type_id IN (1,3,10,12,13,14,18,19)
		HAVING distance < 10  ORDER BY place_type_id,distance ASC
		
		";
			//debug($places);exit;
			$this->loadModel('Place');
			$this->loadModel('Accesslog');
			$places = $this->Place->query($places);
			$userID = $this->Auth->user('id');
			if(!empty($userID)){
			  $this->request->data['Accesslog']['user_id'] = $userID;
			}
			$this->request->data['Accesslog']['address'] = $address;
			$this->request->data['Accesslog']['ip'] = $this->request->clientIp();
			$this->Accesslog->create();
			$this->Accesslog->save($this->request->data['Accesslog']);
			//debug($this->request->data['Accesslog']);exit;
		$this->set(compact('accessLat','accessLng','places','address'));
	
	}
	
	public function direction(){
		$selectedTemplate = Configure::read('selectedTemplate');
		$this->layout = $selectedTemplate.'locate';
		//debug($this->params->query);exit;
		$title_for_layout = '';
		$pageHeader = '';
		$placeid = $this->params->query['rcord'];
		$firstPointLat = $this->params->query['lat'];
		$firstPointLng = $this->params->query['lng'];
		if(!empty($this->params->query['plat'])){
		$secondPointLat = $this->params->query['plat'];
		}
		else{
		$secondPointLat = '23.729965';
		}
		if(!empty($this->params->query['plng'])){
		$secondPointLng = $this->params->query['plng'];
		}
		else{
		$startPointName = "Motijheel Thana";
		$secondPointLng = '90.417267';
		}
		$this->loadModel('Place');
		$placeDetails = $this->Place->find('first',array('conditions'=> array('Place.id' => $placeid )));
		//debug($placeDetails);
		if(!empty($this->params->query['address'])){
			$title = $this->params->query['address'];
			$title_for_layout = 'Direction From '.$title.' To '.$placeDetails['Place']['name'].' in InfoMap24';
			$pageHeader = 'From '.$title.' To '.$placeDetails['Place']['name'].' Map Direction in InfoMap24';
		}
		else{
			$title = "Motijheel Thana";
			$title_for_layout = 'Direction From '.$title.' To '.$placeDetails['Place']['name'].' in InfoMap24';
			$pageHeader = 'From '.$title.' To '.$placeDetails['Place']['name'].' Map Direction in InfoMap24';
		}
		
		$this->set(compact('firstPointLat','firstPointLng','secondPointLat','secondPointLng','title_for_layout','pageHeader','placeDetails'));
	}
}