<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Points Controller
 *
 * @property Point $Point
 * @property PaginatorComponent $Paginator
 */
class PointsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Imageresizer','Seotext','Operation');
	public $uses = array('Information.Point','Information.Topic');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Security->unlockedActions = array('admin_placeedit','admin_hospitaledit','admin_airportedit','admin_stadiumedit','admin_instituteedit','admin_postcodeedit','admin_locationedit','admin_animaledit','admin_topicadd','admin_topicedit','admin_transportServiceProvideredit','admin_transportServiceedit','admin_transportStopageedit','admin_yellowPageedit');
		if ($this->action == 'admin_placeedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_yellowPageedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_postcodeedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_hospitaledit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_airportedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_stadiumedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_instituteedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_locationedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_animaledit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_topicadd') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_topicedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_transportServiceProvideredit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_transportServiceedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_transportStopageedit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	public function updatedata(){
		$this->autoRender = false;
		$this->loadModel('Information.Postcode');
		$postcodes = $this->Postcode->find('all',array('fields' => array('id','post_code')));
		foreach($postcodes as $post){
		//debug($post);
			$this->Postcode->id = $post['Postcode']['id'];
			$pass = $post['Postcode']['post_code'];
			$engNumber = array(1,2,3,4,5,6,7,8,9,0);
			$bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
			//echo $pass ;exit;
			$converted = str_replace($engNumber, $bangNumber, $pass);
			$this->Postcode->saveField('post_code_bn',$converted );
			
		}
		//debug($postcodes);exit;
	}
	
	public function index() {
		$this->Point->recursive = 0;
		//debug($this->paginate());exit;
		$this->Point->bindModel(array(
					'hasOne' => array(
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
		$this->set('points', $this->paginate());
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
			$this->Point->create();
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Point->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
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
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Point->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Point')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Point')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Point->recursive = 0;
		$searchString = '';
		
		if ($this->request->is('post')) {
			//debug($this->params);exit;
			if(!empty($this->request->data['Point']['name']) && empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.name LIKE' => "%".$this->request->data['Point']['name']."%");
			}
			else if(empty($this->request->data['Point']['name']) && !empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.place_type_id' => $this->request->data['Point']['place_type_id']);
			}else if(!empty($this->request->data['Point']['name']) && !empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.name LIKE' => "%".$this->request->data['Point']['name']."%");
				$searchString[] = array('Point.place_type_id' => $this->request->data['Point']['place_type_id']);
			}
			$searchString[] = array('Point.private' => 0);
			
			$this->Session->write('pointindex',$searchString);
			//debug($searchString);exit;
			$this->paginate = array(
					'conditions' => $searchString,
					'fields' =>array('Point.id','Point.name','Point.seo_name','Point.active','Point.totalvisit','Point.updated','PlaceType.id','PlaceType.name','PlaceType.singlename','PlaceType.seo_name'),
					'limit' => 10,
					'order' => array(
						'Point.totalvisit' => 'DESC'
					)
			);
		
		}else{
		$sessionSearch = $this->Session->read('pointindex');
		
			$this->paginate = array(
				'conditions' => $sessionSearch,
				'limit' => 10,
				'fields' =>array('Point.id','Point.name','Point.seo_name','Point.active','Point.totalvisit','Point.updated','PlaceType.id','PlaceType.name','PlaceType.singlename','PlaceType.seo_name'),
				'order' => array(
					'Point.totalvisit' => 'DESC'
				)
			);
		}
		$this->Point->bindModel(array(
					'hasOne' => array(
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						
					),
					
				)
		);
		//debug($this->paginate());exit;
		$searchFields = array('place_type_id', 'name');
		$this->set('searchFields', $searchFields);
		$placeTypes = $this->Point->PlaceType->find('list',array('order'=>array('PlaceType.name ASC')));
		$this->set('placeTypes', $placeTypes);
		$this->set('points', $this->paginate());
	}
	
	
	public function admin_updatewiselist() {
		$this->Point->recursive = 0;
		$searchString = '';
		
		if ($this->request->is('post')) {
			//debug($this->params);exit;
			if(!empty($this->request->data['Point']['name']) && empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.name LIKE' => "%".$this->request->data['Point']['name']."%");
			}
			else if(empty($this->request->data['Point']['name']) && !empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.place_type_id' => $this->request->data['Point']['place_type_id']);
			}else if(!empty($this->request->data['Point']['name']) && !empty($this->request->data['Point']['place_type_id'])){
				$searchString[] = array('Point.name LIKE' => "%".$this->request->data['Point']['name']."%");
				$searchString[] = array('Point.place_type_id' => $this->request->data['Point']['place_type_id']);
			}
			$searchString[] = array('Point.private' => 0);
			
			$this->Session->write('pointindex',$searchString);
			//debug($searchString);exit;
			$this->paginate = array(
					'conditions' => $searchString,
					'fields' =>array('Point.id','Point.name','Point.seo_name','Point.active','Point.totalvisit','Point.updated','PlaceType.id','PlaceType.name','PlaceType.singlename','PlaceType.seo_name'),
					'limit' => 10,
					'order' => array(
						'Point.datachange' => 'DESC'
					)
			);
		
		}else{
		$sessionSearch = $this->Session->read('pointindex');
		
			$this->paginate = array(
				'conditions' => $sessionSearch,
				'limit' => 10,
				'fields' =>array('Point.id','Point.name','Point.seo_name','Point.active','Point.totalvisit','Point.updated','PlaceType.id','PlaceType.name','PlaceType.singlename','PlaceType.seo_name'),
				'order' => array(
					'Point.datachange' => 'DESC'
				)
			);
		}
		$this->Point->bindModel(array(
					'hasOne' => array(
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array('Point.country_id = Country.id')
						),
						'BdDivision' => array(
							'foreignKey' => false,
							'conditions' => array('Point.zone_id = BdDivision.id')
						),
						
					),
					
				)
		);
		//debug($this->paginate());exit;
		$searchFields = array('place_type_id', 'name');
		$this->set('searchFields', $searchFields);
		$placeTypes = $this->Point->PlaceType->find('list',array('order'=>array('PlaceType.name ASC')));
		$this->set('placeTypes', $placeTypes);
		$this->set('points', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point')));
		}
		$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
		$this->set('point', $this->Point->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Point->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Point->Country->find('list');
		$this->loadModel('Zone');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'point')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThanas->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
 
	
	public function topicadd() {
		$this->set('title_for_layout','Add New Topic');
		$modelName = 'Topic';
		
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['country_id'] 		= $this->request->data['Point']['country_id'];
			
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
			$this->request->data['Point']['location'] 			= $this->request->data['Point']['location'];
			$this->request->data['Point']['address'] 			= $this->request->data['Point']['address'];
			if(!empty($this->request->data[$modelName]['en']['name'])){
				$this->request->data['Point']['name'] 	= $this->request->data[$modelName]['en']['name'];
			}else if(!empty($this->request->data[$modelName]['bn']['name'])){
				$this->request->data['Point']['name'] 	= $this->request->data[$modelName]['bn']['name'];
			}else{
				$this->request->data['Point']['name'] 	= 'No Place Name';
			}
			
			$this->request->data['Point']['active'] 			= 1;
			if(!empty($this->request->data['Point']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Point']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			}
			
			unset($this->request->data['Point']['maplocation']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			if(!empty($this->request->data[$modelName]['en']['name'])){
			$string = $this->request->data[$modelName]['en']['name'];
			}else if(!empty($this->request->data[$modelName]['bn']['name'])){
			//$string = $this->request->data[$modelName]['bn']['name'];
			$string = 'Informations';
			}else{
			$string = 'Informations';
			}
			$string = $this->Seotext->formaturi($string,'_');
			$userData = $this->Session->read('Auth.User');
			$userID = $userData['id'];
			$this->request->data['Point']['seo_name'] 					= $string;
			$this->request->data[$modelName]['user_id'] 				= $userID;
			
			if(isset($this->request->data[$modelName]['image'])){
				$imagefile = $this->request->data[$modelName]['image'];
				
				/*Image Crop Function Start */
				$iWidth = 670;
				$iHeight = 570; // desired image result dimensions
				$iJpgQuality = 100;
				$sTempFileName = WWW_ROOT.'img'.DS.'cache'.DS. md5(time().rand());
				@chmod($sTempFileName, 0644);
				move_uploaded_file($imagefile['tmp_name'], $sTempFileName);
				if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
						//debug($aSize);exit;
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
						
                        // copy and resize part of an image with resampling
						//debug($this->request->data['Crop']);exit;
						$x1 = $this->request->data['Crop']['x1'];
						$y1 = $this->request->data['Crop']['y1'];
						$x2 = $this->request->data['Crop']['x2'];
						$y2 = $this->request->data['Crop']['y2'];
						$w = $this->request->data['Crop']['w'];
						$h = $this->request->data['Crop']['h'];
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$x1, (int)$y1, $iWidth, $iHeight, (int)$w, (int)$h);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

                        //return $sResultFileName;
						$imageDetails = getimagesize($sResultFileName);
						//debug($imageDetails);
						//echo $sResultFileName;exit;
						$newFilename = "InfoMap24_topics_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'small'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'medium'.DS.$newFilename,370,270,true,$largewaterimage,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'large'.DS.$newFilename,570,470,true,$largewaterimage,90);
						$this->request->data[$modelName]['image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						
                    }else{
					unset($this->request->data[$modelName]['image']);
					}
				
				
				/*Image Crop Function End*/
				
			}
			unset($this->request->data[$modelName]['modelname']);
			//debug($this->request->data);
			//if(!empty($this->request->data[$modelName]['en']['name'])){
				$this->request->data['TopicData'][0]['language_id'] = $this->request->data[$modelName]['en']['languageid'];
				$this->request->data['TopicData'][0]['name'] = $this->request->data[$modelName]['en']['name'];
				$this->request->data['TopicData'][0]['short_description'] = $this->request->data[$modelName]['en']['short_description'];
				$this->request->data['TopicData'][0]['details'] = $this->request->data[$modelName]['en']['details'];
				$this->request->data['TopicData'][0]['keyword'] = $this->request->data[$modelName]['en']['keyword'];
				$this->request->data['TopicData'][0]['metatag'] = $this->request->data[$modelName]['en']['metatag'];
			//}
			
			//if(!empty($this->request->data[$modelName]['bn']['name'])){
				$this->request->data['TopicData'][1]['language_id'] = $this->request->data[$modelName]['bn']['languageid'];
				$this->request->data['TopicData'][1]['name'] = $this->request->data[$modelName]['bn']['name'];
				$this->request->data['TopicData'][1]['short_description'] = $this->request->data[$modelName]['bn']['short_description'];
				$this->request->data['TopicData'][1]['details'] = $this->request->data[$modelName]['bn']['details'];
				$this->request->data['TopicData'][1]['keyword'] = $this->request->data[$modelName]['bn']['keyword'];
				$this->request->data['TopicData'][1]['metatag'] = $this->request->data[$modelName]['bn']['metatag'];
			//}
			unset($this->request->data[$modelName]['en']);
			unset($this->request->data[$modelName]['bn']);
			
			
			$this->Point->create();
			$this->Point->bindModel(array(
					'hasOne' => array(
						'Topic' => array(
							'foreignKey' => 'point_id',
							'conditions' => array("Point.id = Topic.point_id")
						)
					)
			));
			//debug($this->request->data);exit;
			if ($this->Point->saveAll($this->request->data)) {
				$this->loadModel('Topic');
				$topicID = $this->Topic->getLastInsertId();
				$this->request->data['TopicData'][0]['topic_id'] = $topicID;
				$this->request->data['TopicData'][1]['topic_id'] = $topicID;
				$this->loadModel('TopicData');
				$this->TopicData->create();
				$this->TopicData->saveAll($this->request->data['TopicData']);
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Topic Information could not be saved. Please, try again.'));
			}
			//debug($this->request->data);exit;
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThanas->find('list');
		$this->loadModel('PlaceType');
		$placeTypes = $this->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => 'topic')));
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes'));
		
	}
	
	
	public function admin_topicadd() {
		$this->layout = 'admintopic';
		$this->set('title_for_layout','Add New Topic');
		$modelName = 'TopicData';
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
			$this->request->data['Point']['location'] 			= $this->request->data['Location']['location'];
			$this->request->data['Point']['address'] 			= $this->request->data['Location']['address'];
			
			
			$this->request->data['Point']['active'] 			= 1;
			if(!empty($this->request->data['Location']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			}
			
			unset($this->request->data['Location']);
			if(!empty($this->request->data[$modelName]['en']['name'])){
			$string = $this->request->data[$modelName]['en']['name'];
			}else if(!empty($this->request->data[$modelName]['bn']['name'])){
			//$string = $this->request->data[$modelName]['bn']['name'];
			$string = 'Informations';
			}else{
			$string = 'Informations';
			}
			$string = $this->Seotext->formaturi($string,'_');
			
			$this->request->data['Point']['seo_name'] 					= $string;
			$this->request->data[$modelName]['seo_name'] 					= $string;
			
			if(!empty($this->request->data[$modelName]['bn']['name'])){
				$this->request->data['Point']['bn_name'] 	= $this->request->data[$modelName]['bn']['name'];
			}
			if(!empty($this->request->data[$modelName]['en']['name'])){
				$this->request->data['Point']['name'] 	= $this->request->data[$modelName]['en']['name'];
			}
			if(empty($this->request->data[$modelName]['en']['name'])){
				$this->request->data['Point']['name'] 	= $this->request->data[$modelName]['bn']['name'];
			}
			if(isset($this->request->data[$modelName]['image'])){
				$imagefile = $this->request->data[$modelName]['image'];
				
				/*Image Crop Function Start */
				$iWidth = 580;
				$iHeight = 400; // desired image result dimensions
				$iJpgQuality = 100;
				$sTempFileName = WWW_ROOT.'img'.DS.'cache'.DS. md5(time().rand());
				@chmod($sTempFileName, 0644);
				move_uploaded_file($imagefile['tmp_name'], $sTempFileName);
				if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
						//debug($aSize);exit;
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
						
                        // copy and resize part of an image with resampling
						//debug($this->request->data['Crop']);exit;
						$x1 = $this->request->data['Crop']['x1'];
						$y1 = $this->request->data['Crop']['y1'];
						$x2 = $this->request->data['Crop']['x2'];
						$y2 = $this->request->data['Crop']['y2'];
						$w = $this->request->data['Crop']['w'];
						$h = $this->request->data['Crop']['h'];
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$x1, (int)$y1, $iWidth, $iHeight, (int)$w, (int)$h);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

                        //return $sResultFileName;
						$imageDetails = getimagesize($sResultFileName);
						//debug($imageDetails);
						//echo $sResultFileName;exit;
						$newFilename = "InfoMap24_topics_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'small'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'medium'.DS.$newFilename,370,270,true,$largewaterimage,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'large'.DS.$newFilename,570,470,true,$largewaterimage,90);
						$this->request->data['Point']['image'] = $newFilename;
						$this->request->data['TopicData']['image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						
                    }
				
				/*Image Crop Function End*/
				
			}
			//unset($this->request->data['Topic']);
			unset($this->request->data[$modelName]['modelname']);
			//debug($this->request->data);exit;
			
				$this->request->data[$modelName]['language_id'] = $this->request->data[$modelName]['en']['languageid'];
				$this->request->data[$modelName]['name'] = $this->request->data[$modelName]['en']['name'];
				$this->request->data[$modelName]['short_description'] = $this->request->data[$modelName]['en']['short_description'];
				$this->request->data[$modelName]['details'] = $this->request->data[$modelName]['en']['details'];
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['en']['keyword'];
				$this->request->data[$modelName]['metatag'] = $this->request->data[$modelName]['en']['metatag'];
			
				$this->request->data[$modelName]['bn_name'] = $this->request->data[$modelName]['bn']['name'];
				$this->request->data[$modelName]['bn_short_description'] = $this->request->data[$modelName]['bn']['short_description'];
				$this->request->data[$modelName]['bn_details'] = $this->request->data[$modelName]['bn']['details'];
				$this->request->data[$modelName]['bn_keyword'] = $this->request->data[$modelName]['bn']['keyword'];
				$this->request->data[$modelName]['bn_metatag'] = $this->request->data[$modelName]['bn']['metatag'];
				$this->request->data[$modelName]['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
				if(isset($this->request->data['Point']['user_id'])){
					$this->request->data[$modelName]['user_id'] 				= $this->request->data['Point']['user_id'];
				}else{
					$this->request->data[$modelName]['user_id'] 				= $userID;
				}
				
			
			
			unset($this->request->data['Topic']);
			unset($this->request->data[$modelName]['image']);
			
			
			$this->Point->create();
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						'TopicData' => array(
							'foreignKey' => 'point_id',
							'conditions' => array("TopicData.point_id" => 'Point.id')
						)
					)
			));
			unset($this->request->data[$modelName]['en']);
			unset($this->request->data[$modelName]['bn']);
			//debug($this->request->data);exit;
			if ($this->Point->save($this->request->data)) {
					$pointID = $this->Point->getLastInsertId();
					$this->request->data[$modelName]['point_id'] = $pointID;
					//$this->request->data[$modelName][0]['point_id'] = $pointID;
			
				
				//debug($this->request->data);exit;
				$this->loadModel($modelName);
				$this->$modelName->create();
				$this->$modelName->save($this->request->data[$modelName]);
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Topic Information could not be saved. Please, try again.'));
			}
			
		}
		if($userData['role_id'] == 1){
			$this->loadModel('User');
			$users = $this->User->find('list',array('conditions' => array('User.status' => 1),'order' => 'User.name ASC'));
			$this->set('users',$users);
		}
		$countries = $this->Point->Country->find('list');
		$this->loadModel('Zone');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('PlaceType');
		$placeTypes = $this->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => 'topicData')));
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes'));
		
	}
	
	
	public function admin_topicedit($id = null) {
		$this->set('title_for_layout','Edit Topic Information');
		$this->layout = 'admintopic';
		$modelName = 'TopicData';
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__('Invalid point'));
		}
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		if ($this->request->is(array('post', 'put'))) {
			//debug($this->request->data);exit;
			if(isset($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['zone_id']) && !empty($this->request->data['Address']['zone_id'])){
			$this->request->data['Point']['zone_id'] 			= $this->request->data['Address']['zone_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
			$this->request->data['Point']['bd_district_id'] 	= $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
			$this->request->data['Point']['bd_thanas_id'] 		= $this->request->data['Address']['bd_thana_id'];
			}
			$this->request->data['Point']['location'] 			= $this->request->data['Location']['location'];
			$this->request->data['Point']['address'] 			= $this->request->data['Location']['address'];
			//$this->request->data['Point']['name'] 				= $this->request->data[$modelName][0]['name'];
			//$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName][1]['name'];
			
			if(!empty($this->request->data[$modelName]['bn_name'])){
				$this->request->data['Point']['bn_name'] 	= $this->request->data[$modelName]['bn_name'];
			}
			if(!empty($this->request->data[$modelName]['name'])){
				$this->request->data['Point']['name'] 	= $this->request->data[$modelName]['name'];
			}
			
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			if(!empty($this->request->data['Point']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Point']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
			}
			
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['maplocation']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			
			if(!empty($this->request->data[$modelName]['name'])){
				$string = $this->request->data[$modelName]['name'];
			}else if(!empty($this->request->data[$modelName]['bn_name'])){
				$string = $this->request->data[$modelName]['bn_name'];
			}else{
				$string = '';
			}
			$string = $this->Seotext->formaturi($string,'_');
			
			$this->request->data[$modelName]['verifiedby'] 				= 0;
			$this->request->data[$modelName]['reviewedby'] 				= 0;
			$this->request->data[$modelName]['point_id'] 				= $this->request->data['Point']['id'];
			if(isset($this->request->data['Point']['user_id'])){
				$this->request->data[$modelName]['user_id'] 				= $this->request->data['Point']['user_id'];
			}else{
				$this->request->data[$modelName]['user_id'] 				= '';
			}
			$this->request->data[$modelName]['point_id'] 				= $this->request->data['Point']['id'];
			$this->request->data['Point']['seo_name'] 					= $string;
			$this->request->data[$modelName]['seo_name'] 					= $string;
			if(!empty($this->request->data['Point']['newimage']['tmp_name'])){
				
				$imagefile = $this->request->data['Point']['newimage'];
				$image = $this->request->data['Point']['newimage'];
				if(!empty($image)){
					@unlink(WWW_ROOT.'img'.DS.'topics/large'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'topics/medium'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'topics/small'.DS.$image);
				}
				
				
			/*Image Crop Function Start */
				$iWidth = 580;
				$iHeight = 400; // desired image result dimensions
				$iJpgQuality = 100;
				$sTempFileName = WWW_ROOT.'img'.DS.'cache'.DS. md5(time().rand());
				@chmod($sTempFileName, 0644);
				move_uploaded_file($imagefile['tmp_name'], $sTempFileName);
				if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
						//debug($aSize);exit;
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
                        // copy and resize part of an image with resampling
						//debug($this->request->data['Crop']);exit;
						$x1 = $this->request->data['Crop']['x1'];
						$y1 = $this->request->data['Crop']['y1'];
						$x2 = $this->request->data['Crop']['x2'];
						$y2 = $this->request->data['Crop']['y2'];
						$w = $this->request->data['Crop']['w'];
						$h = $this->request->data['Crop']['h'];
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$x1, (int)$y1, $iWidth, $iHeight, (int)$w, (int)$h);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

                        //return $sResultFileName;
						$imageDetails = getimagesize($sResultFileName);
						//debug($imageDetails);
						//echo $sResultFileName;exit;
						$newFilename = "InfoMap24_topics_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'small'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'medium'.DS.$newFilename,370,270,true,$largewaterimage,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'topics'.DS.'large'.DS.$newFilename,570,270,true,$largewaterimage,90);
						$this->request->data['Point']['image'] = $newFilename;
						$this->request->data['TopicData']['image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						unset($this->request->data[$modelName]['newimage']);
                    }else{
					unset($this->request->data['Point']['newimage']);
					}
			
			}
			
				$this->request->data['TopicData']['popular'] 	= $this->request->data['Point']['popular'];
				$this->request->data['TopicData']['verifiedby'] 	= '';
				$this->request->data['TopicData']['reviewedby'] 	= '';
				$this->request->data['TopicData']['popular'] 	= $this->request->data['Point']['popular'];
				$this->request->data['TopicData']['verifiedby'] 	= '';
				$this->request->data['TopicData']['reviewedby'] 	= '';
			
			
			
			unset($this->request->data['Point']['newimage']);
			unset($this->request->data[$modelName][$modelName.'Data']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data['Crop']);
			unset($this->request->data['Location']);
			//debug($this->request->data);exit;
			
			$this->loadModel('Information.'.$modelName);
			//$this->$modelName->deleteAll(array("$modelName.point_id" => $this->request->data['Point']['id']), false);
			if ($this->Point->save($this->request->data['Point']) && $this->$modelName->saveAll($this->request->data[$modelName])) {
				$this->Session->setFlash(__('The Topic Information has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Topic Information could not be saved. Please, try again.'));
			}
		}else {
			$options = array(
				'conditions' => array('Point.' . $this->Point->primaryKey => $id),
				
			);
			$this->loadModel('Information.TopicData');
			$this->Point->recursive = 2;
			
			$this->Point->bindModel(array(
					'hasOne' => array(
						'TopicData' => array(
								'foreignKey' => false,
								'conditions' => array("TopicData.point_id" => $id)
						)
					),
					
			));
			$this->request->data = $this->Point->find('first', $options);
			//debug($this->request->data);exit;
		}
		if($userData['role_id'] == 1){
			$this->loadModel('User');
			$users = $this->User->find('list',array('conditions' => array('User.status' => 1),'order' => 'User.name ASC'));
			$this->set('users',$users);
		}
		$countries = $this->Point->Country->find('list');
		$this->loadModel('Zone');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('PlaceType');
		$placeTypes = $this->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => 'topicData')));
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes'));
	}
	
	
	public function admin_addpoint() {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Add Point');
		$modelName = 'Point';
		if ($this->request->is('post')) {
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['country_id'] 		= $this->request->data['Point']['country_id'];
			
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
			$this->request->data['Point']['location'] 			= $this->request->data['Point']['location'];
			$this->request->data['Point']['address'] 			= $this->request->data['Point']['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['active'] 			= 1;
			if(!empty($this->request->data['Point']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Point']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			}
			
			unset($this->request->data['Point']['maplocation']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			
			$string = $this->request->data[$modelName]['name'];
			$string = $this->Seotext->formaturi($string,'_');
			
			$this->request->data[$modelName]['name'] 					= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['seo_name'] 					= $string;
			$this->request->data[$modelName]['seo_name'] 				= $string;
			$this->request->data[$modelName]['place_type_id'] 			= $this->request->data['Point']['place_type_id'];
			$this->request->data[$modelName]['hospital_id'] 			= $this->request->data[$modelName]['hospital_id'];
			$this->request->data[$modelName]['designation'] 			= $this->request->data[$modelName]['designation'];
			$this->request->data[$modelName]['dobirth'] 				= $this->request->data[$modelName]['dobirth'];
			$this->request->data[$modelName]['sex_id'] 					= $this->request->data[$modelName]['sex_id'];
			$this->request->data[$modelName]['religion_id'] 			= $this->request->data[$modelName]['religion_id'];
			$this->request->data[$modelName]['doctor_expertise_id'] 	= $this->request->data[$modelName]['doctor_expertise_id'];
			$this->request->data[$modelName]['qualification'] 			= $this->request->data[$modelName]['qualification'];
			$this->request->data[$modelName]['degree'] 					= $this->request->data[$modelName]['degree'];
			$this->request->data[$modelName]['chamber'] 				= $this->request->data[$modelName]['chamber'];
			$this->request->data[$modelName]['details'] 				= $this->request->data[$modelName]['details'];
			$this->request->data[$modelName]['email'] 					= $this->request->data[$modelName]['email'];
			$this->request->data[$modelName]['web'] 					= $this->request->data[$modelName]['web'];
			$this->request->data[$modelName]['phone'] 					= $this->request->data[$modelName]['phone'];
			$this->request->data[$modelName]['keyword'] 				= $this->request->data[$modelName]['keyword'];
			$this->request->data[$modelName]['metatag'] 				= $this->request->data[$modelName]['metatag'];
			
			
			if(isset($this->request->data[$modelName]['image'])){
				$imagefile = $this->request->data[$modelName]['image'];
				
				if(!empty($imagefile['tmp_name'])){
					$newFilename = "InfoMap24_doctor_".rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'doctors'.DS.'thumbs'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'doctors'.DS.$newFilename,370,270,false,false,90);
					$this->request->data[$modelName]['image'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['image']);
				}
			}
			unset($this->request->data[$modelName]['modelname']);
			//debug($this->request->data);exit;
			$this->Point->create();
			if ($this->Point->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Doctor Information could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Point->Country->find('list',array('fields'=>array('id','name')));
		$this->loadModel('Zone');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$this->loadModel('PointGroup');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		//$placeTypes = json_encode($this->Hospital->find('list'));
		$pointGroups = $this->PointGroup->find('list',array('order' => array('PointGroup.name ASC')));
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','hospital','transportServiceProvider','transportService','transportStopage')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','pointGroups'));
		
	}
	
	
	public function admin_placeedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Airport Information');
		$modelName = 'Place';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			//echo $imageName; exit;
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'places';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			/*********************************Panaroma image save *********************/
			if(isset($this->request->data['Panaroma']['name'])){
				
				$imagefile = $this->request->data['Panaroma']['name'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data['Panaroma']['oldimage'])){
						$oldfilename = $this->request->data['Panaroma']['oldimage'];
						@unlink(WWW_ROOT.'img'.DS.'360'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_Panaroma".'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			/*********************************Panaroma image save *********************/
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,75,75,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			$this->loadModel('Information.'.$imageDB);
			$this->$imageDB->recursive = 1;
			$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
			if(empty($this->request->data[$modelName]['image']) && isset($otherImages[$imageDB])){
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			
			
			/******************** Hours Section Start**************************/
			
			
			
			
			$hours = $this->request->data['Hour'];
			
			$opening_hours = '';
			$timecount = 0;
			foreach($hours as $time){
				//debug($time);exit;
				$opening_hours[$timecount]['dow'] = $timecount;
				$opening_hours[$timecount]['open'] = $time['open'];
				$opening_hours[$timecount]['closed'] = $time['closed'];
				$opening_hours[$timecount]['optional_text'] = $time['comments'];
			$timecount++;
			}
			
			
			$this->request->data[$modelName]['hours'] = json_encode($opening_hours);;
			//debug($opening_hours);exit;
			
			unset($this->request->data['Hour']);
			
			/******************** Hours Section End **************************/
			
			
			
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			unset($this->request->data[$modelName]['panaroma']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Place Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
						'Panaroma' => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = Panaroma.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'UpdateInformation' => array(
								'foreignKey' => false,
								'conditions' => array("UpdateInformation.itemid" => $id, "UpdateInformation.classname" => 'place',"UpdateInformation.isactive" => 0),
								'group' => array('UpdateInformation.user_id'),
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
			//debug($this->request->data);exit;
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','airport')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	
	public function admin_yellowPageedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Information');
		$modelName = 'YellowPage';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			//echo $imageName; exit;
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'places';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			/*********************************Panaroma image save *********************/
			if(isset($this->request->data['Panaroma']['name'])){
				
				$imagefile = $this->request->data['Panaroma']['name'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data['Panaroma']['oldimage'])){
						$oldfilename = $this->request->data['Panaroma']['oldimage'];
						@unlink(WWW_ROOT.'img'.DS.'360'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_Panaroma".'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			/*********************************Panaroma image save *********************/
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			$this->loadModel('Information.'.$imageDB);
			$this->$imageDB->recursive = 1;
			$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
			if(empty($this->request->data[$modelName]['image']) && isset($otherImages[$imageDB])){
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			
			
			/******************** Hours Section Start**************************/
			
			
			
			
			$hours = $this->request->data['Hour'];
			
			$opening_hours = '';
			$timecount = 0;
			foreach($hours as $time){
				//debug($time);exit;
				$opening_hours[$timecount]['dow'] = $timecount;
				$opening_hours[$timecount]['open'] = $time['open'];
				$opening_hours[$timecount]['closed'] = $time['closed'];
				$opening_hours[$timecount]['optional_text'] = $time['comments'];
			$timecount++;
			}
			
			
			$this->request->data[$modelName]['hours'] = json_encode($opening_hours);;
			//debug($opening_hours);exit;
			
			unset($this->request->data['Hour']);
			
			/******************** Hours Section End **************************/
			
			
			
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			unset($this->request->data[$modelName]['panaroma']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Place Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
						'Panaroma' => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = Panaroma.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						),
						'UpdateInformation' => array(
								'foreignKey' => false,
								'conditions' => array("UpdateInformation.itemid" => $id, "UpdateInformation.classname" => 'place',"UpdateInformation.isactive" => 0),
								'group' => array('UpdateInformation.user_id'),
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
			//debug($this->request->data);exit;
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','yellowPage')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	
	public function admin_animaledit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Animal Information');
		$modelName = 'Animal';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['breeding_range'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category. ';
				if(!empty($this->request->data[$modelName]['family'])){
				$metatag2 = $this->request->data[$modelName]['name'].' is a member of '.$this->request->data[$modelName]['family'].' Family.';
				}else{
				$metatag2 = '';	
				}
				if(!empty($this->request->data[$modelName]['species'])){
				$metatag3 = ' The Species of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['species'].', ';
				}else{
				$metatag3 = '';
				}
				if(!empty($this->request->data[$modelName]['genus'])){
				$metatag4 = ' an Genus is '.$this->request->data[$modelName]['genus'].'. ';
				}else{
				$metatag4 = '';
				}
				
				if(!empty($this->request->data[$modelName]['modified_scientific_name'])){
				$metatag5 = ' The Scientific name of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['modified_scientific_name'].'. ';
				}else{
				$metatag5 = '';
				}
				
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
				$this->request->data[$modelName]['bn_metatag'] =  $this->request->data[$modelName]['bn_metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'animals';
			
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			if(empty($this->request->data[$modelName]['image'])){
				$this->loadModel('Information.'.$imageDB);
				$this->$imageDB->recursive = -1;
				$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
				//debug($otherImages);exit;
				if(isset($otherImages[$imageDB]['file'])){
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
				}
			}
			
			/***********************************************************************************************************/
			
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The Animal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Animal Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','animal')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries','points', 'modelName','placeTypes'));
		
	}
	
	
	
	public function admin_hospitaledit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Hospital Information');
		$modelName = 'Hospital';
		$imageDB = $modelName.'Image';
		//debug($this->request->data);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['location'] 			= $this->request->data[$modelName]['location'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
			$this->request->data[$modelName]['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data[$modelName]['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['location'].'.';
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			
			
			if(isset($this->request->data[$modelName]['logo'])){
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['image'])){
						$oldfilename = $this->request->data[$modelName]['image'];
						unlink(WWW_ROOT.'img'.DS.'hospitals'.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.'hospitals'.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_place_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'hospitals'.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'hospitals'.DS.'logo'.DS.'medium'.DS.$newFilename,250,250,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_place_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'hospitals'.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'hospitals'.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'hospitals'.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			
			
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			$this->loadModel('Information.'.$imageDB);
			$this->$imageDB->recursive = 1;
			$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
			if(empty($this->request->data[$modelName]['image']) && isset($otherImages[$imageDB])){
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			
			
			/******************** Hours Section Start**************************/
			
			
			
			
			$hours = $this->request->data['Hour'];
			
			$opening_hours = '';
			$timecount = 0;
			foreach($hours as $time){
				//debug($time);exit;
				$opening_hours[$timecount]['dow'] = $timecount;
				$opening_hours[$timecount]['open'] = $time['open'];
				$opening_hours[$timecount]['closed'] = $time['closed'];
				$opening_hours[$timecount]['optional_text'] = $time['comments'];
			$timecount++;
			}
			
			
			$this->request->data[$modelName]['hours'] = json_encode($opening_hours);;
			//debug($opening_hours);exit;
			
			unset($this->request->data['Hour']);
			
			/******************** Hours Section End **************************/
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if(isset($this->request->data[$modelName]['hospital_categories'][0])){
				$this->request->data[$modelName]['hospital_category_id'] = $this->request->data[$modelName]['hospital_categories'][0];
				$this->request->data[$modelName]['speciality'] = mysql_escape_string(serialize($this->request->data[$modelName]['hospital_categories'][0]));
			}
			
			$this->request->data[$modelName]['hospital_categories'] = json_encode($this->request->data[$modelName]['hospital_categories']);
			
			//debug($this->request->data);exit;
			if ($this->Point->save($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Hospital Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.HospitalCategory');
		$hospitalCategories = $this->HospitalCategory->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','hospitalCategories'));
		
	}
	public function admin_postcodeedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Postal Information');
		$modelName = 'Postcode';
		$imageDB = $modelName.'Image';
		//debug($this->request->data);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data['Point']['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data['Point']['datachange'] 		= date('Y-m-d H:i:s');
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['location'].'.';
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			
			
			if(isset($this->request->data[$modelName]['newimage'])){
				$imagefile = $this->request->data[$modelName]['newimage'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['image'])){
						$oldfilename = $this->request->data[$modelName]['image'];
						unlink(WWW_ROOT.'img'.DS.'postcodes'.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.'postcodes'.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_place_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'postcodes'.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'postcodes'.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['newimage']);
				}
			}
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_place_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'postcodes'.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'postcodes'.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.'postcodes'.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/******************** Hours Section Start**************************/
			
			
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			$this->loadModel('Information.'.$imageDB);
			$this->$imageDB->recursive = 1;
			$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
			if(empty($this->request->data[$modelName]['image']) && isset($otherImages[$imageDB])){
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			
			
			
			
			$hours = $this->request->data['Hour'];
			
			$opening_hours = '';
			$timecount = 0;
			foreach($hours as $time){
				//debug($time);exit;
				$opening_hours[$timecount]['dow'] = $timecount;
				$opening_hours[$timecount]['open'] = $time['open'];
				$opening_hours[$timecount]['closed'] = $time['closed'];
				$opening_hours[$timecount]['optional_text'] = $time['comments'];
			$timecount++;
			}
			
			
			$this->request->data[$modelName]['hours'] = json_encode($opening_hours);;
			//debug($opening_hours);exit;
			
			unset($this->request->data['Hour']);
			
			/******************** Hours Section End **************************/
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			
			if ($this->Point->save($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Hospital Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.HospitalCategory');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','postcode')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes'));
		
	}
	public function admin_savedplaces(){
		$this->layout = 'ajax';
		//debug($this->params);exit;
		$accessLat = $this->params['pass'][0];
		$accessLng = $this->params['pass'][1];
		
		$places = "SELECT points.id,points.name,points.address,points.lat,points.lng,points.place_type_id,pt.name,pt.icon, ( 9459 * ACOS( COS( RADIANS($accessLat) ) * COS( RADIANS( lat ) ) * 
							COS( RADIANS( lng ) - RADIANS($accessLng) ) + SIN( RADIANS($accessLat) ) *  
							SIN( RADIANS( lat ) ) ) ) AS distance FROM points LEFT JOIN place_types pt ON points.place_type_id = pt.id HAVING
							distance < 1 ORDER BY distance ASC
						";
			
		$this->loadModel('Information.Place');
		$places = $this->Place->query($places);
		//debug($places);exit;
		$this->set(compact('places'));
	}
	
	public function admin_pointsave(){
		//debug($this->params->query);exit;
		$this->layout = 'ajax';
		$tname = '';
		$this->autoRender = false;
		
		$this->request->data['Save']['Point']['name'] 				= $this->params->query['placename'];
		$this->request->data['Save']['Point']['country_id'] 		= $this->params->query['countryID'];
		
		if(isset($this->params->query['divisionID']) && !empty($this->params->query['divisionID'])){
			$this->request->data['Save']['Point']['zone_id'] 		= $this->params->query['divisionID'];
			$this->request->data['Save']['Point']['bd_division_id'] 		= $this->params->query['divisionID'];
		}
		if(isset($this->params->query['districtID']) && !empty($this->params->query['districtID'])){
			$this->request->data['Save']['Point']['bd_district_id'] = $this->params->query['districtID'];
		}
		if(isset($this->params->query['thanaID']) && !empty($this->params->query['thanaID'])){
			$this->request->data['Save']['Point']['bd_thanas_id'] 	= $this->params->query['thanaID'];
		}
		$this->loadModel('General.PlaceType');
		$this->PlaceType->recursive = -1;
		$placeDetails = $this->PlaceType->find('first',array('conditions' => array('PlaceType.id' => $this->params->query['typeID'])));
		$tarGetClass = ucfirst($placeDetails['PlaceType']['singlename']);
		
		$this->request->data['Save']['Point']['place_type_id'] 		= $this->params->query['typeID'];
		$this->request->data['Save']['Point']['location'] 			= $this->params->query['location'];
		$this->request->data['Save']['Point']['address'] 			= $this->params->query['placeaddress'];
		$this->request->data['Save']['Point']['active'] 			= 1;
		if(!empty($this->params->query['latlng'])){
		$mLatLang	= explode(',',$this->params->query['latlng']);
		$this->request->data['Save']['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
		$this->request->data['Save']['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
		}
		
		//$this->request->data['Save'][$tarGetClass]['country_id'] = $this->params->query['countryID'];
		//$this->request->data['Save'][$tarGetClass]['zone_id'] = $this->params->query['divisionID'];
		//$this->request->data['Save'][$tarGetClass]['bd_division_id'] = $this->params->query['divisionID'];
		//$this->request->data['Save'][$tarGetClass]['bd_district_id'] = $this->params->query['districtID'];
		//$this->request->data['Save'][$tarGetClass]['bd_thanas_id'] = $this->params->query['thanaID'];
		//$this->request->data['Save'][$tarGetClass]['place_type_id'] = $this->params->query['typeID'];
		//$this->request->data['Save'][$tarGetClass]['location'] = $this->params->query['location'];
		$this->request->data['Save'][$tarGetClass]['name'] = $this->params->query['placename'];
		//$this->request->data['Save'][$tarGetClass]['active'] = 1;
		
		$string = $this->params->query['placename'];
		$string = $this->Seotext->formaturi($string,'-');
		$catName = $this->params->query['placeTypeName'];
		
		$metatag1 = $this->params->query['placename'].' listed in '.$catName.' category.';
		
		$metatag2 = ' Location of '.$this->params->query['placename'].' is '.$this->params->query['location'].'.';
		$metatag3 = ' Contact informations of '.$this->params->query['placename'].' is, ';
		if(!empty($this->params->query['placeweb'])){
		$metatag4 = ' Website: '.$this->params->query['placeweb'].', ';
		}else{
		$metatag4 = '';
		}
		if(!empty($this->params->query['placeemail'])){
		$metatag5 = ' Email:'.$this->params->query['placeemail'].', ';
		}else{
		$metatag5 = '';
		}
		
		if(!empty($this->params->query['placephone'])){
		$metatag6 = ' Phone: '.$this->params->query['placephone'].', ';
		}else{
		$metatag6 = '';
		}
		if(!empty($this->params->query['placeaddress'])){
		$metatag7 = ' Address: '.$this->params->query['placeaddress'];
		}else{
		$metatag7 = '';
		}
		//debug($this->request->data['Save']);exit;
		$this->request->data['Save']['Point']['seo_name'] =  $string;
		$this->request->data['Save'][$tarGetClass]['seo_name'] =  $string;
		$this->request->data['Save'][$tarGetClass]['place_type_id'] =  $this->params->query['typeID'];
		$this->request->data['Save'][$tarGetClass]['keyword'] =  $this->params->query['placename'];
		$this->request->data['Save'][$tarGetClass]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
		$this->request->data['Save'][$tarGetClass]['address'] = $this->params->query['placeaddress'];
		$this->request->data['Save'][$tarGetClass]['private'] = $this->params->query['privateplace'];
		$this->request->data['Save'][$tarGetClass]['web'] = $this->params->query['placeweb'];
		$this->request->data['Save'][$tarGetClass]['email'] = $this->params->query['placeemail'];
		$this->request->data['Save'][$tarGetClass]['mobile'] = $this->params->query['placephone'];
		$this->request->data['Save'][$tarGetClass]['PointEstablished'] = $this->params->query['PointEstablished'];
		$this->request->data['Save'][$tarGetClass]['PointEstablishedby'] = $this->params->query['PointEstablishedby'];
		$mLatLang	= explode(',',$this->params->query['latlng']);
		//$this->request->data['Save'][$tarGetClass]['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
		//$this->request->data['Save'][$tarGetClass]['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		$this->request->data['Save'][$tarGetClass]['user_id'] = $userID;
	
		$this->Point->create();
		if ($this->Point->save($this->request->data['Save']['Point'])) {
			$pointID = $this->Point->getLastInsertId();
			
			$this->loadModel($tarGetClass);
			$this->$tarGetClass->create();
			$this->request->data['Save'][$tarGetClass]['point_id'] =  $pointID;
			$this->$tarGetClass->save($this->request->data['Save'][$tarGetClass]);
		}else {
		
		}
		
	}
	public function admin_pointeditsave(){
		debug($this->params->query);exit;
		$this->layout = 'ajax';
		$tname = '';
		$this->autoRender = false;
		
		$this->request->data['Save']['Point']['name'] 				= $this->params->query['placename'];
		$this->request->data['Save']['Point']['country_id'] 		= $this->params->query['countryID'];
		
		if(isset($this->params->query['divisionID']) && !empty($this->params->query['divisionID'])){
			$this->request->data['Save']['Point']['zone_id'] 		= $this->params->query['divisionID'];
			$this->request->data['Save']['Point']['bd_division_id'] 		= $this->params->query['divisionID'];
		}
		if(isset($this->params->query['districtID']) && !empty($this->params->query['districtID'])){
			$this->request->data['Save']['Point']['bd_district_id'] = $this->params->query['districtID'];
		}
		if(isset($this->params->query['thanaID']) && !empty($this->params->query['thanaID'])){
			$this->request->data['Save']['Point']['bd_thanas_id'] 	= $this->params->query['thanaID'];
		}
		
		$this->request->data['Save']['Point']['place_type_id'] 		= $this->params->query['typeID'];
		$this->request->data['Save']['Point']['location'] 			= $this->params->query['location'];
		$this->request->data['Save']['Point']['address'] 			= $this->params->query['placeaddress'];
		$this->request->data['Save']['Point']['active'] 			= 1;
		if(!empty($this->params->query['latlng'])){
		$mLatLang	= explode(',',$this->params->query['latlng']);
		$this->request->data['Save']['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
		$this->request->data['Save']['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
		}
		
		$this->request->data['Save']['Place']['country_id'] = $this->params->query['countryID'];
		$this->request->data['Save']['Place']['zone_id'] = $this->params->query['divisionID'];
		$this->request->data['Save']['Place']['bd_division_id'] = $this->params->query['divisionID'];
		$this->request->data['Save']['Place']['bd_district_id'] = $this->params->query['districtID'];
		$this->request->data['Save']['Place']['bd_thanas_id'] = $this->params->query['thanaID'];
		$this->request->data['Save']['Place']['place_type_id'] = $this->params->query['typeID'];
		$this->request->data['Save']['Place']['location'] = $this->params->query['location'];
		$this->request->data['Save']['Place']['name'] = $this->params->query['placename'];
		$this->request->data['Save']['Place']['active'] = 1;
		
		$string = $this->params->query['placename'];
		$string = $this->Seotext->formaturi($string,'-');
		$catName = $this->params->query['placeTypeName'];
		
		$metatag1 = $this->params->query['placename'].' listed in '.$catName.' category.';
		
		$metatag2 = ' Location of '.$this->params->query['placename'].' is '.$this->params->query['location'].'.';
		$metatag3 = ' Contact informations of '.$this->params->query['placename'].' is, ';
		if(!empty($this->params->query['placeweb'])){
		$metatag4 = ' Website: '.$this->params->query['placeweb'].', ';
		}else{
		$metatag4 = '';
		}
		if(!empty($this->params->query['placeemail'])){
		$metatag5 = ' Email:'.$this->params->query['placeemail'].', ';
		}else{
		$metatag5 = '';
		}
		
		if(!empty($this->params->query['placephone'])){
		$metatag6 = ' Phone: '.$this->params->query['placephone'].', ';
		}else{
		$metatag6 = '';
		}
		if(!empty($this->params->query['placeaddress'])){
		$metatag7 = ' Address: '.$this->params->query['placeaddress'];
		}else{
		$metatag7 = '';
		}
		//debug($this->request->data['Save']);exit;
		$this->request->data['Save']['Point']['seo_name'] =  $string;
		$this->request->data['Save']['Place']['seo_name'] =  $string;
		$this->request->data['Save']['Place']['keyword'] =  $this->params->query['placename'];
		$this->request->data['Save']['Place']['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
		$this->request->data['Save']['Place']['address'] = $this->params->query['placeaddress'];
		$this->request->data['Save']['Place']['private'] = $this->params->query['privateplace'];
		$this->request->data['Save']['Place']['web'] = $this->params->query['placeweb'];
		$this->request->data['Save']['Place']['email'] = $this->params->query['placeemail'];
		$this->request->data['Save']['Place']['mobile'] = $this->params->query['placephone'];
		$mLatLang	= explode(',',$this->params->query['latlng']);
		$this->request->data['Save']['Place']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
		$this->request->data['Save']['Place']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		$this->request->data['Save']['Place']['user_id'] = $userID;
	
		$this->Point->create();
		if ($this->Point->save($this->request->data['Save']['Point'])) {
			$pointID = $this->Point->getLastInsertId();
			$dataClass = 'Place';
			$this->loadModel($dataClass);
			$this->$dataClass->create();
			$this->request->data['Save'][$dataClass]['point_id'] =  $pointID;
			$this->$dataClass->save($this->request->data['Save'][$dataClass]);
		}else {
		
		}
		
	}

	public function admin_delete($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'point')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Point->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Point')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Point')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_sitemap(){
		
	}
	
	public function admin_airportedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Airport Information');
		$modelName = 'Airport';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'airports';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			if(empty($this->request->data[$modelName]['image'])){
				$this->loadModel('Information.'.$imageDB);
				$this->$imageDB->recursive = -1;
				$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
				//debug($otherImages);exit;
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Airport Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','airport')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	public function admin_stadiumedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Stadium Information');
		$modelName = 'Stadium';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'stadia';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			if(empty($this->request->data[$modelName]['image'])){
				$this->loadModel('Information.'.$imageDB);
				$this->$imageDB->recursive = -1;
				$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
				//debug($otherImages);exit;
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Stadium Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','stadium')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	public function admin_transportServiceedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Transport Service Information');
		$modelName = 'TransportService';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['isactive'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				//$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'transportStopage';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					//debug($this->request->data[$modelName]);exit;
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list',array('fields' => array('id','name')));
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$this->loadModel('TransportType');
		$this->loadModel('TransportServiceProvider');
		$zones = $this->Zone->find('list');
		$transportServiceProviders = $this->TransportServiceProvider->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$transportTypes = $this->TransportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones', 'bdDistricts','bdDivisions', 'bdThanas','points', 'modelName','placeTypes','transportTypes','transportServiceProviders'));
		
	}public function admin_transportStopageedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Transport Service Information');
		$modelName = 'TransportStopage';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['isactive'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				//$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'transportStopage';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					//debug($this->request->data[$modelName]);exit;
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						@unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list',array('fields' => array('id','name')));
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$this->loadModel('TransportType');
		$this->loadModel('TransportServiceProvider');
		$zones = $this->Zone->find('list');
		$transportServiceProviders = $this->TransportServiceProvider->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$transportTypes = $this->TransportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones', 'bdDistricts','bdDivisions', 'bdThanas','points', 'modelName','placeTypes','transportTypes','transportServiceProviders'));
		
	}
	public function admin_transportServiceProvideredit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Transport Service Provider Information');
		$modelName = 'TransportServiceProvider';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['isactive'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				//$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'transportProvider';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list',array('fields' => array('id','name')));
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$this->loadModel('TransportType');
		$zones = $this->Zone->find('list');
		
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$transportTypes = $this->TransportType->find('list');
		
		$this->loadModel('General.AirportType');
		$placeTypes = $this->Point->PlaceType->find('list',array('order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones', 'bdDistricts','bdDivisions', 'bdThanas','points', 'modelName','placeTypes','transportTypes'));
		
	}
	
	
	public function admin_instituteedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Institute Information');
		$modelName = 'Institute';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['parent'] 			= $this->request->data['Point']['parent'];
			$this->request->data['Point']['parentname'] 		= $this->request->data['Point']['parentname'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Location']);
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			//debug($this->request->data);exit;
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'institutes';
			
			if(isset($this->request->data[$modelName]['logo'])){
				
				$imagefile = $this->request->data[$modelName]['logo'];
				
				if(!empty($imagefile['tmp_name'])){
					if(!empty($this->request->data[$modelName]['oldlogo'])){
						$oldfilename = $this->request->data[$modelName]['oldlogo'];
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$oldfilename);
						unlink(WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$oldfilename);
					}
					$newFilename = "InfoMap24_".$imageFolder."_".$this->request->data[$modelName]['seo_name'].'_'.rand(5, 15)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
					$type = $imagefile['type'];
					if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'small'.DS.$newFilename,50,50,false,false,100);
					$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'logo'.DS.'medium'.DS.$newFilename,370,270,false,false,100);
					$this->request->data[$modelName]['logo'] = $newFilename;
					}
				}else{
					unset($this->request->data[$modelName]['logo']);
				}
			}
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(5, 215)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			if(empty($this->request->data[$modelName]['image'])){
				$this->loadModel('Information.'.$imageDB);
				$this->$imageDB->recursive = -1;
				$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
				//debug($otherImages);exit;
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			
			/******************** Hours Section Start**************************/
			$hours = $this->request->data['Hour'];
			
			$opening_hours = '';
			$timecount = 0;
			foreach($hours as $time){
				//debug($time);exit;
				$opening_hours[$timecount]['dow'] = $timecount;
				$opening_hours[$timecount]['open'] = $time['open'];
				$opening_hours[$timecount]['closed'] = $time['closed'];
				$opening_hours[$timecount]['optional_text'] = $time['comments'];
			$timecount++;
			}
			
			
			$this->request->data[$modelName]['hours'] = json_encode($opening_hours);;
			//debug($opening_hours);exit;
			
			unset($this->request->data['Hour']);
			
			/******************** Hours Section End **************************/
			
			
			
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Institute Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','institute')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	
	public function admin_locationedit($id = null) {
		$this->layout = 'adminpoint';
		$this->set('title_for_layout','Edit Location Information');
		$modelName = 'Location';
		$imageDB = $modelName.'Image';
		//debug($this->request->params);exit;
		if ($this->request->is('put')) {
			//debug($this->request->data);exit;
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			if(isset($this->request->data['Location']['country_id']) && !empty($this->request->data['Location']['country_id'])){
			$this->request->data['Point']['country_id'] 		= $this->request->data['Location']['country_id'];
			}
			if(isset($this->request->data['Address']['bd_division_id']) && !empty($this->request->data['Address']['bd_division_id'])){
				$this->request->data['Point']['bd_division_id'] 		= $this->request->data['Address']['bd_division_id'];
			}
			if(isset($this->request->data['Address']['bd_district_id']) && !empty($this->request->data['Address']['bd_district_id'])){
				$this->request->data['Point']['bd_district_id'] = $this->request->data['Address']['bd_district_id'];
			}
			if(isset($this->request->data['Address']['bd_thana_id']) && !empty($this->request->data['Address']['bd_thana_id'])){
				$this->request->data['Point']['bd_thanas_id'] 	= $this->request->data['Address']['bd_thana_id'];
			}
			
			$this->request->data['Point']['place_type_id'] 		= $this->request->data[$modelName]['place_type_id'];
			$this->request->data['Point']['address'] 			= $this->request->data[$modelName]['address'];
			$this->request->data['Point']['name'] 				= $this->request->data[$modelName]['name'];
			$this->request->data['Point']['bn_name'] 			= $this->request->data[$modelName]['bn_name'];
			$this->request->data['Point']['active'] 			= $this->request->data['Point']['active'];
			$this->request->data[$modelName]['point_id'] 		= $this->request->data['Point']['id'];
			if(!empty($this->request->data['Location']['maplocation'])){
			//debug($this->request->data['Location']['maplocation']);exit;
			$mLatLang	= explode(',',$this->request->data['Location']['maplocation']);
			
			$this->request->data['Point']['lat'] 	= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
			$this->request->data['Point']['lng'] 	= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
			
				$lat = filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);;
				$lng = filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				
				$imageName = md5(time().rand()).'.png';
				$img = WWW_ROOT.'img'.DS.'placemaps'.DS.$imageName ;
				if(@file_put_contents($img, @file_get_contents($url))){
					$this->request->data['Point']['map'] 	= $imageName;
				}
			}
			
			unset($this->request->data['Point']['loadmap']);
			unset($this->request->data['Address']);
			/**************************SEO_URL*****************************/
			if(empty($this->request->data[$modelName]['seo_name'])){
				$string = $this->request->data[$modelName]['name'];
				$string = $this->Seotext->formaturi($string,'-');
				$this->request->data['Point']['seo_name'] 					= $string;
				$this->request->data[$modelName]['seo_name'] 				= $string;
			}else{
				$this->request->data['Point']['seo_name'] 					= $this->request->data[$modelName]['seo_name'];
				$this->request->data[$modelName]['seo_name'] 				= $this->request->data[$modelName]['seo_name'];
			}
			/**************************SEO_URL*****************************/
			
			/*****************************************KEYWORD&METATAG***********************/
			if(empty($this->request->data[$modelName]['metatag'])){
				$catName = $this->request->data['Point']['placeTypeName'];
			
				$metatag1 = $this->request->data[$modelName]['name'].' listed in '.$catName.' category.';
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag2 = ' Location of '.$this->request->data[$modelName]['name'].' is '.$this->request->data[$modelName]['address'].'.';
				}else{
				$metatag2 = '';	
				}
				$metatag3 = ' Contact informations of '.$this->request->data[$modelName]['name'].' is, ';
				if(!empty($this->request->data[$modelName]['web'])){
				$metatag4 = ' Website: '.$this->request->data[$modelName]['web'].', ';
				}else{
				$metatag4 = '';
				}
				if(!empty($this->request->data[$modelName]['email'])){
				$metatag5 = ' Email:'.$this->request->data[$modelName]['email'].', ';
				}else{
				$metatag5 = '';
				}
				
				if(!empty($this->request->data[$modelName]['mobile'])){
				$metatag6 = ' Phone: '.$this->request->data[$modelName]['mobile'].', ';
				}else{
				$metatag6 = '';
				}
				if(!empty($this->request->data[$modelName]['address'])){
				$metatag7 = ' Address: '.$this->request->data[$modelName]['address'];
				}else{
				$metatag7 = '';
				}
				$this->request->data[$modelName]['metatag'] =  $metatag1.$metatag2.$metatag3.$metatag4.$metatag5.$metatag6.$metatag7;
			}else{
				$this->request->data[$modelName]['metatag'] =  $this->request->data[$modelName]['metatag'];
			}
			
			
			if(empty($this->request->data[$modelName]['keyword'])){
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['name'];
			}else{
				$this->request->data[$modelName]['keyword'] = $this->request->data[$modelName]['keyword'];
			}
			
			
			/*****************************************KEYWORD&METATAG***********************/
			
			$imageFolder = 'locations';
			
			if(count($this->request->data[$modelName]['images']) > 0){
				$galleryImages = $this->request->data[$modelName]['images'];
				$imgCount = 0;
				foreach($galleryImages as $imagefile){
					if(!empty($imagefile['tmp_name'])){
						$newFilename = "InfoMap24_".$imageFolder."_".rand(35, 245)."_".date("y_m_d_h_m_s").'_'.$imagefile['name'];
						$type = $imagefile['type'];
						if(($type == 'image/gif') || ($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/jpg')){
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.$newFilename,570,470,false,false,80);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'thumbs'.DS.$newFilename,120,80,false,false,100);
						$this->Imageresizer->resize($imagefile['tmp_name'], WWW_ROOT.'img'.DS.$imageFolder.DS.'photogallery'.DS.'small'.DS.$newFilename,370,270,false,false,100);
						if($imgCount == 0){
						$this->request->data[$modelName]['image'] = $newFilename;
						}
						$this->request->data[$imageDB][$imgCount]['point_id'] = $id;
						$this->request->data[$imageDB][$imgCount]['file'] = $newFilename;
						}
					}else{
						unset($this->request->data[$modelName]['images']);
					}
				$imgCount++;
				}
			
			}
			/**********************Check if Image Database Have Images but empty in Main Class*************************/
			if(empty($this->request->data[$modelName]['image'])){
				$this->loadModel('Information.'.$imageDB);
				$this->$imageDB->recursive = -1;
				$otherImages = $this->$imageDB->find('first',array('conditions' => array("$imageDB.point_id" => $id)));
				//debug($otherImages);exit;
				@$this->request->data[$modelName]['image'] = $otherImages[$imageDB]['file'];
			}
			
			/***********************************************************************************************************/
			unset($this->request->data['Point']['countryid']);
			unset($this->request->data['Point']['selectLat']);
			unset($this->request->data['Point']['selectLng']);
			unset($this->request->data['Point']['placeTypeName']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data['Point']['mapinput']);
			unset($this->request->data[$modelName]['modelname']);
			unset($this->request->data[$modelName]['images']);
			//debug($this->request->data);exit;
			$this->loadModel('Information.'.$modelName);
			if ($this->Point->saveAll($this->request->data['Point']) && $this->$modelName->save($this->request->data[$modelName])) {
				if(isset($this->request->data[$imageDB])){
					$this->loadModel('Information.'.$imageDB);
					$this->$imageDB->create();
					$this->$imageDB->saveAll($this->request->data[$imageDB]);
				}
				$this->Session->setFlash(__('The point has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Stadium Information could not be saved. Please, try again.'));
			}
		}
		else {
			$this->Point->bindModel(array(
					'hasOne' => array(
						$modelName => array(
							'foreignKey' => false,
							'conditions' => array("Point.id = $modelName.point_id")
						),
					),
					'hasMany' => array(
						$imageDB => array(
								'foreignKey' => false,
								'fields' => array('id','file'),
								'conditions' => array("$imageDB.point_id" => $id)
						)
					),
				)
			);
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			//debug($this->Point->find('first', $options));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		
		$this->loadModel('Zone');
		$this->loadModel('BdDivision');
		$bdDivisions = $this->BdDivision->find('list');
		$this->loadModel('BdDistrict');
		$this->loadModel('BdThanas');
		$zones = $this->Zone->find('list');
		$bdDistricts = $this->BdDistrict->find('list');
		$bdThanas = $this->BdThanas->find('list');
		$this->loadModel('General.AirportType');
		$airportTypes = $this->AirportType->find('list');
		$placeTypes = $this->Point->PlaceType->find('list',array('conditions'=>array('PlaceType.singlename' => array('place','location')),'order' => array('PlaceType.name ASC')));
		$this->set(compact('countries', 'zones','bdDivisions', 'bdDistricts', 'bdThanas','points', 'modelName','placeTypes','airportTypes'));
		
	}
	
	
	public function admin_cachestate(){
		$this->autoRender = false;
		$state = $this->Session->read('Config.cachestate');
		if($state == true){
		$this->Session->write('Config.cachestate', false);
		/*$this->requestAction('/users/view', array('pass' => array('123')));*/
		$this->requestAction('/information/siteactions/sitemap');
		$this->redirect($this->referer());
		}else{
		$this->Session->write('Config.cachestate', true);
		$this->redirect($this->referer());
		}
	
	}
	
	public function getPoints(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Point->recursive = -1;
        if (isset($this->params['url']['term']) && $this->params['url']['term'] != '') {
            $points = $this->Point->find('list', array(
				'fields'=>array('id','name'),
                'conditions' => array('Point.name LIKE ' => $this->params['url']['term'] . "%"),
                'limit' => 10
                    )
            );
            //debug($points);exit;
			$results = array();
            foreach ($points as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
        
	
	}
	
	
}
