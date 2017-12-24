<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * PlaceTypes Controller
 *
 * @property PlaceType $PlaceType
 * @property PaginatorComponent $Paginator
 */
class PlaceTypesController extends GeneralAppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');
	public $components = array('Imageresizer','Seotext');
	public function beforeFilter() {
		$this->Security->unlockedActions = array('admin_add','admin_edit');
		if ($this->action == 'admin_add') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'admin_edit') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlaceType->recursive = 0;
		$this->set('placeTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		$options = array('conditions' => array('PlaceType.' . $this->PlaceType->primaryKey => $id));
		$this->set('placeType', $this->PlaceType->find('first', $options));
	}
	
	public function returnname(){
		//debug($this->params['named']['typeid']);exit;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->PlaceType->recursive = -1;
		$options = array('conditions' => array('PlaceType.' . $this->PlaceType->primaryKey => $this->params['named']['typeid']));
		$data = $this->PlaceType->find('first', $options);
		return $data['PlaceType']['name'];
		//debug($data);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceType->create();
			if ($this->PlaceType->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'place type')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceType->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'place type')), 'default', array('class' => 'error'));
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
		if (!$this->PlaceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceType->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'place type')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'place type')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceType.' . $this->PlaceType->primaryKey => $id));
			$this->request->data = $this->PlaceType->find('first', $options);
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
		$this->PlaceType->id = $id;
		if (!$this->PlaceType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceType->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Place type')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Place type')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceType->recursive = 0;
		$searchString = '';
		
		if ($this->request->is('post')) {
			//debug($this->params);exit;
			if(!empty($this->request->data['PlaceType']['name'])){
				$searchString[] = array('PlaceType.name LIKE' => "%".$this->request->data['PlaceType']['name']."%");
			}
			if(!empty($this->request->data['PlaceType']['bn_name'])){
				$searchString[] = array('PlaceType.bn_name LIKE' => "%".$this->request->data['PlaceType']['bn_name']."%");
			}
			if(!empty($this->request->data['PlaceType']['parentid'])){
				$searchString[] = array('PlaceType.parentid' => $this->request->data['PlaceType']['parentid']);
			}
			
			$this->paginate = array(
					'conditions' => $searchString,
					'limit' => 20,
					'order' => array(
						'PlaceType.name' => 'ASC'
					)
			);
			$this->set('placeTypes', $this->paginate());
			//debug($this->paginate());exit;
		
		}else{
		$this->set('placeTypes', $this->paginate());
		
		}
		$searchFields = array('name','bn_name','parentid');
		$this->set('searchFields', $searchFields);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		$options = array('conditions' => array('PlaceType.' . $this->PlaceType->primaryKey => $id));
		$this->set('placeType', $this->PlaceType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admintopic';
		if ($this->request->is('post')) {
			//debug($this->request->data);exit;
			$modelName = 'PlaceType';
			$seoCatName = $this->Seotext->formaturi($this->request->data[$modelName]['name'],'_');
			$this->request->data[$modelName]['seo_name'] = $seoCatName;
			if(isset($this->request->data[$modelName]['type_image']) && !empty($this->request->data[$modelName]['type_image']['tmp_name'])){
				$imagefile = $this->request->data[$modelName]['type_image'];
				
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
						//debug($this->request->data);exit;
                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

                        //return $sResultFileName;
						$imageDetails = getimagesize($sResultFileName);
						//debug($imageDetails);
						//echo $sResultFileName;exit;
						
						$newFilename = "InfoMap24_category_$seoCatName_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'small'.DS.$newFilename,73,50,false,false,90);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'medium'.DS.$newFilename,247,170,true,$largewaterimage,80);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'large'.DS.$newFilename,507,350,true,$largewaterimage,80);
						
						$this->request->data[$modelName]['type_image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						
                    }
				
				/*Image Crop Function End*/
				
			}else{
				$this->request->data[$modelName]['type_image'] = '';
			}
			
			$this->PlaceType->create();
			if ($this->PlaceType->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'place type')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceType->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'place type')), 'default', array('class' => 'error'));
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
		$this->layout = 'admintopic';
		if (!$this->PlaceType->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$modelName = 'PlaceType';
			if(!empty($this->request->data[$modelName]['newimage']['tmp_name'])){
				
				$imagefile = $this->request->data[$modelName]['newimage'];
				$image = $this->request->data[$modelName]['newimage'];
				if(!empty($image)){
					@unlink(WWW_ROOT.'img'.DS.'placetypes/large'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'placetypes/medium'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'placetypes/small'.DS.$image);
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
						$seoCatName = $this->request->data['PlaceType']['seo_name'];
						$newFilename = "InfoMap24_category_$seoCatName_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'small'.DS.$newFilename,73,50,false,false,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'medium'.DS.$newFilename,247,170,true,$largewaterimage,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'placetypes'.DS.'large'.DS.$newFilename,507,350,true,$largewaterimage,90);
						$this->request->data[$modelName]['type_image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						unset($this->request->data[$modelName]['newimage']);
                    }else{
					unset($this->request->data[$modelName]['newimage']);
					}
			
			}
			
			if ($this->PlaceType->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'place type')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'place type')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceType.' . $this->PlaceType->primaryKey => $id));
			$this->request->data = $this->PlaceType->find('first', $options);
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
		$this->PlaceType->id = $id;
		if (!$this->PlaceType->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'place type')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceType->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Place type')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Place type')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
