<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Users.Controller');
/**
 * Users Controller
 *
 * @category Controller
 * @package  Croogo.Users.Controller
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class UsersController extends UsersAppController {

/**
 * Components
 *
 * @var array
 * @access public
 */
	public $components = array(
		'Search.Prg' => array(
			'presetForm' => array(
				'paramType' => 'querystring',
			),
			'commonProcess' => array(
				'paramType' => 'querystring',
				'filterEmpty' => true,
			),
		),
		'Imageresizer',
		'Hybridauth',
	);
	
	public function beforeFilter() {
		$this->Security->unlockedActions = array('login');
		if ($this->action == 'login') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		
	}

/**
 * Preset Variables Search
 *
 * @var array
 * @access public
 */
	public $presetVars = true;

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Users.User','SocialProfile');

/**
 * implementedEvents
 *
 * @return array
 */
	public function implementedEvents() {
		return parent::implementedEvents() + array(
			'Controller.Users.beforeAdminLogin' => 'onBeforeAdminLogin',
			'Controller.Users.adminLoginFailure' => 'onAdminLoginFailure',
		);
	}

/**
 * Notify user when failed_login_limit hash been hit
 *
 * @return bool
 */
	public function onBeforeAdminLogin() {
		$field = $this->Auth->authenticate['all']['fields']['username'];
		if (empty($this->request->data)) {
			return true;
		}
		$cacheName = 'auth_failed_' . $this->request->data['User'][$field];
		$cacheValue = Cache::read($cacheName, 'users_login');
		if ($cacheValue >= Configure::read('User.failed_login_limit')) {
			$this->Session->setFlash(__d('croogo', 'You have reached maximum limit for failed login attempts. Please try again after a few minutes.'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => $this->request->params['action']));
		}
		return true;
	}

/**
 * Record the number of times a user has failed authentication in cache
 *
 * @return bool
 * @access public
 */
	public function onAdminLoginFailure() {
		$field = $this->Auth->authenticate['all']['fields']['username'];
		if (empty($this->request->data)) {
			return true;
		}
		$cacheName = 'auth_failed_' . $this->request->data['User'][$field];
		$cacheValue = Cache::read($cacheName, 'users_login');
		Cache::write($cacheName, (int)$cacheValue + 1, 'users_login');
		return true;
	}

/**
 * Admin index
 *
 * @return void
 * @access public
 * $searchField : Identify fields for search
 */
	public function admin_index() {
		$this->set('title_for_layout', __d('croogo', 'Users'));
		$this->Prg->commonProcess();
		$searchFields = array('role_id', 'name');

		$this->User->recursive = 0;
		$criteria = $this->User->parseCriteria($this->Prg->parsedParams());
		$this->paginate['conditions'] = $criteria;

		$this->set('users', $this->paginate());
		$this->set('roles', $this->User->Role->find('list'));
		$this->set('displayFields', $this->User->displayFields());
		$this->set('searchFields', $searchFields);

		if (isset($this->request->query['chooser'])) {
			$this->layout = 'admin_popup';
		}
	}

/**
 * Send activation email
 */
	private function __sendActivationEmail() {
		if (empty($this->request->data['User']['notification'])) {
			return;
		}

		$user = $this->request->data['User'];
		$activationUrl = Router::url(array(
			'admin' => false,
			'plugin' => 'users',
			'controller' => 'users',
			'action' => 'activate',
			$user['username'],
			$user['activation_key'],
		), true);
		$this->_sendEmail(
			array(Configure::read('Site.title'), $this->_getSenderEmail()),
			$user['email'],
			__d('croogo', '[%s] Please activate your account', Configure::read('Site.title')),
			'Users.register',
			'user activation',
			$this->theme,
			array(
				'user' => $this->request->data,
				'url' => $activationUrl,
			)
		);
	}

/**
 * Admin add
 *
 * @return void
 * @access public
 */
	public function admin_add() {
		$this->layout = 'admintask';
		if (!empty($this->request->data)) {
			$this->User->create();
			$this->request->data['User']['activation_key'] = md5(uniqid());
			if ($this->User->saveAssociated($this->request->data)) {
				$this->request->data['User']['id'] = $this->User->id;
				$this->__sendActivationEmail();

				$this->Session->setFlash(__d('croogo', 'The User has been saved'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The User could not be saved. Please, try again.'), 'flash', array('class' => 'error'));
				unset($this->request->data['User']['password']);
			}
		} else {
			$this->request->data['User']['role_id'] = 2; // default Role: Registered
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * Admin edit
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_edit($id = null) {
		$this->layout = 'admintask';
		if (!empty($this->request->data)) {
			//debug($this->request->data);exit;
			if(!empty($this->request->data['User']['newimage']['tmp_name'])){
				
				$imagefile = $this->request->data['User']['newimage'];
				$image = $this->request->data['User']['oldimage'];
				if(!empty($image)){
					@unlink(WWW_ROOT.'img'.DS.'users/large'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'users/medium'.DS.$image);
					@unlink(WWW_ROOT.'img'.DS.'users/small'.DS.$image);
					unset($this->request->data['User']['newimage']);
				}
				
				
			/*Image Crop Function Start */
				$iWidth = 500;
				$iHeight = 500; // desired image result dimensions
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
						$newFilename = "InfoMap24_user_".rand(5, 15)."_".date("y_m_d_h_m_s").$sExt;
						
						$smallwaterimage = WWW_ROOT.'img'.DS.'watermarksmall.png';
						$largewaterimage = WWW_ROOT.'img'.DS.'watermarklarge.png';
						
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'users'.DS.'small'.DS.$newFilename,50,50,false,false,100);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'users'.DS.'medium'.DS.$newFilename,200,200,true,$largewaterimage,80);
						$this->Imageresizer->resize($sResultFileName, WWW_ROOT.'img'.DS.'users'.DS.'large'.DS.$newFilename,500,500,true,$largewaterimage,80);
						$this->request->data['User']['image'] = $newFilename;
						unset($this->request->data['Crop']);
						@unlink($sResultFileName);
						unset($this->request->data['User']['newimage']);
                    }else{
					unset($this->request->data['User']['newimage']);
					}
			
			}
			//debug($this->request->data);exit;
			if ($this->User->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The User has been saved'), 'flash', array('class' => 'success'));
				return $this->Croogo->redirect(array('action' => 'edit', $this->User->id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The User could not be saved. Please, try again.'), 'flash', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
		$this->set('editFields', $this->User->editFields());
	}

/**
 * Admin reset password
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_reset_password($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__d('croogo', 'Invalid User'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'Password has been reset.'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'Password could not be reset. Please, try again.'), 'flash', array('class' => 'error'));
			}
		}
		$this->request->data = $this->User->findById($id);
	}

/**
 * Admin delete
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__d('croogo', 'Invalid id for User'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__d('croogo', 'User deleted'), 'flash', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__d('croogo', 'User cannot be deleted'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'index'));
		}
	}

/**
 * Admin login
 *
 * @return void
 * @access public
 */
	public function admin_login() {
		
		$this->set('title_for_layout', __d('croogo', 'Admin Login'));
		$this->layout = "admin_login";
		if ($this->Auth->user('id')) {
			if (!$this->Session->check('Message.auth')) {
				$this->Session->setFlash(
					__d('croogo', 'You are already logged in'), 'flash',
					array('class' => 'alert'), 'auth'
				);
			}
			return $this->redirect($this->Auth->redirect());
		}
		if ($this->request->is('post')) {
			Croogo::dispatchEvent('Controller.Users.beforeAdminLogin', $this);
			if ($this->Auth->login()) {
				Croogo::dispatchEvent('Controller.Users.adminLoginSuccessful', $this);
				return $this->redirect($this->Auth->redirect());
			} else {
				Croogo::dispatchEvent('Controller.Users.adminLoginFailure', $this);
				$this->Auth->authError = __d('croogo', 'Incorrect username or password');
				$this->Session->setFlash($this->Auth->authError, 'flash', array('class' => 'error'), 'auth');
				return $this->redirect($this->Auth->loginAction);
			}
		}
	}

/**
 * Admin logout
 *
 * @return void
 * @access public
 */
	public function admin_logout() {
		Croogo::dispatchEvent('Controller.Users.adminLogoutSuccessful', $this);
		$this->Session->setFlash(__d('croogo', 'Log out successful.'), 'flash', array('class' => 'success'));
		return $this->redirect($this->Auth->logout());
	}

/**
 * Index
 *
 * @return void
 * @access public
 */
	public function index() {
		$this->set('title_for_layout', __d('croogo', 'Users'));
	}

/**
 * Convenience method to send email
 *
 * @param string $from Sender email
 * @param string $to Receiver email
 * @param string $subject Subject
 * @param string $template Template to use
 * @param string $theme Theme to use
 * @param array  $viewVars Vars to use inside template
 * @param string $emailType user activation, reset password, used in log message when failing.
 * @return boolean True if email was sent, False otherwise.
 */
	protected function _sendEmail($from, $to, $subject, $template, $emailType, $theme = null, $viewVars = null) {
		if (is_null($theme)) {
			$theme = $this->theme;
		}
		$success = false;
		try {
			$email = new CakeEmail();
			$email->from($from[1], $from[0]);
			$email->to($to);
			$email->subject($subject);
			$email->template($template);
			$email->viewVars($viewVars);
			$email->theme($theme);
			$success = $email->send();
		} catch (SocketException $e) {
			$this->log(sprintf('Error sending %s notification : %s', $emailType, $e->getMessage()));
		}

		return $success;
	}

/**
 * Add
 *
 * @return void
 * @access public
 */
	public function add() {
		$this->layout = 'bootstrap';
		$this->set('title_for_layout', __('Register'));
		if (!empty($this->request->data)) {
			$this->User->create();
			$this->request->data['User']['role_id'] = 2; // Registered
			$this->request->data['User']['activation_key'] = md5(uniqid());
			$this->request->data['User']['status'] = 0;
			$this->request->data['User']['username'] = htmlspecialchars($this->request->data['User']['username']);
			$this->request->data['User']['website'] = htmlspecialchars($this->request->data['User']['website']);
			$this->request->data['User']['name'] = htmlspecialchars($this->request->data['User']['name']);
			if ($this->User->save($this->request->data)) {
				Croogo::dispatchEvent('Controller.Users.registrationSuccessful', $this);
				$this->request->data['User']['password'] = null;

				$this->_sendEmail(
					array(Configure::read('Site.title'), $this->_getSenderEmail()),
					$this->request->data['User']['email'],
					__d('croogo', '[%s] Please activate your account', Configure::read('Site.title')),
					'Users.register',
					'user activation',
					$this->theme,
					array('user' => $this->request->data)
				);

				$this->Session->setFlash(__d('croogo', 'You have successfully registered an account. An email has been sent with further instructions.'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'login'));
			} else {
				Croogo::dispatchEvent('Controller.Users.registrationFailure', $this);
				$this->Session->setFlash(__d('croogo', 'The User could not be saved. Please, try again.'), 'flash', array('class' => 'error'));
			}
		}
	}

/**
 * Activate
 *
 * @param string $username
 * @param string $key
 * @return void
 * @access public
 */
	public function activate($username = null, $key = null) {
		if ($username == null || $key == null) {
			return $this->redirect(array('action' => 'login'));
		}

		if ($this->Auth->user('id')) {
			$this->Session->setFlash(
				__d('croogo', 'You are currently logged in as:') . ' ' .
				$this->Auth->user('username')
			);
			return $this->redirect($this->referer());
		}

		$redirect = array('action' => 'login');
		if (
			$this->User->hasAny(array(
				'User.username' => $username,
				'User.activation_key' => $key,
				'User.status' => 0,
			))
		) {
			$user = $this->User->findByUsername($username);
			$this->User->id = $user['User']['id'];

			$db = $this->User->getDataSource();
			$key = md5(uniqid());
			$this->User->updateAll(array(
				$this->User->escapeField('status') => $db->value(1),
				$this->User->escapeField('activation_key') => $db->value($key),
			), array(
				$this->User->escapeField('id') => $this->User->id
			));

			if (isset($user) && empty($user['User']['password'])) {
				$redirect = array('action' => 'reset', $username, $key);
			}

			Croogo::dispatchEvent('Controller.Users.activationSuccessful', $this);
			$this->Session->setFlash(__d('croogo', 'Account activated successfully.'), 'flash', array('class' => 'success'));
		} else {
			Croogo::dispatchEvent('Controller.Users.activationFailure', $this);
			$this->Session->setFlash(__d('croogo', 'An error occurred.'), 'flash', array('class' => 'error'));
		}

		if ($redirect) {
			return $this->redirect($redirect);
		}
	}

/**
 * Edit
 *
 * @return void
 * @access public
 */
	public function edit() {
	}

/**
 * Forgot
 *
 * @return void
 * @access public
 */
	public function forgot() {
		$this->layout = 'bootstrap';
		$this->set('title_for_layout',__('Forgot password ?'));

		if (!empty($this->request->data) && isset($this->request->data['User']['username'])) {
			$user = $this->User->findByUsername($this->request->data['User']['username']);
			if (!isset($user['User']['id'])) {
				$this->Session->setFlash(__d('croogo', 'Invalid username.'), 'flash', array('class' => 'error'));
				return $this->redirect(array('action' => 'login'));
			}

			$this->User->id = $user['User']['id'];
			$activationKey = md5(uniqid());
			$this->User->saveField('activation_key', $activationKey);
			$this->set(compact('user', 'activationKey'));

			$emailSent = $this->_sendEmail(
				array(Configure::read('Site.title'), $this->_getSenderEmail()),
				$user['User']['email'],
				__d('croogo', '[%s] Reset Password', Configure::read('Site.title')),
				'Users.forgot_password',
				'reset password',
				$this->theme,
				compact('user', 'activationKey')
			);

			if ($emailSent) {
				$this->Session->setFlash(__('An email has been sent with instructions for resetting your password.'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('An error occurred. Please try again.'), 'flash', array('class' => 'error'));
			}
		}
	}

/**
 * Reset
 *
 * @param string $username
 * @param string $key
 * @return void
 * @access public
 */
	public function reset($username = null, $key = null) {
		$this->layout = 'bootstrap';
		$this->set('title_for_layout', __('Reset Password'));

		if ($username == null || $key == null) {
			$this->Session->setFlash(__d('croogo', 'An error occurred.'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'login'));
		}

		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.username' => $username,
				'User.activation_key' => $key,
			),
		));
		if (!isset($user['User']['id'])) {
			$this->Session->setFlash(__d('croogo', 'An error occurred.'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'login'));
		}

		if (!empty($this->request->data) && isset($this->request->data['User']['password'])) {
			$this->User->id = $user['User']['id'];
			$user['User']['activation_key'] = md5(uniqid());
			$user['User']['password'] = $this->request->data['User']['password'];
			$user['User']['verify_password'] = $this->request->data['User']['verify_password'];
			$options = array('fieldList' => array('password', 'verify_password', 'activation_key'));
			if ($this->User->save($user['User'], $options)) {
				$this->Session->setFlash(__('Your password has been reset successfully.'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__d('croogo', 'An error occurred. Please try again.'), 'flash', array('class' => 'error'));
			}
		}

		$this->set(compact('user', 'username', 'key'));
	}

/**
 * Login
 *
 * @return boolean
 * @access public
 */
	public function login() {
		$this->layout = 'login';
		$this->set('title_for_layout', __('InfoMap24 Login'));
		if ($this->request->is('post')) {
			Croogo::dispatchEvent('Controller.Users.beforeLogin', $this);
			if ($this->Auth->login()) {
				Croogo::dispatchEvent('Controller.Users.loginSuccessful', $this);
				return $this->redirect($this->Auth->redirect());
			} else {
				Croogo::dispatchEvent('Controller.Users.loginFailure', $this);
				$this->Session->setFlash($this->Auth->authError, 'flash', array('class' => 'error'), 'auth');
				return $this->redirect($this->Auth->loginAction);
			}
		}
	}

/**
 * Logout
 *
 * @return void
 * @access public
 */
	public function logout() {
		Croogo::dispatchEvent('Controller.Users.beforeLogout', $this);
		$this->Session->setFlash(__('Log out successful.'), 'flash', array('class' => 'success'));
		$redirect = $this->Auth->logout();
		Croogo::dispatchEvent('Controller.Users.afterLogout', $this);
		return $this->redirect($redirect);
	}

/**
 * View
 *
 * @param string $username
 * @return void
 * @access public
 */
	public function view($username = null) {
		if ($username == null) {
			$username = $this->Auth->user('username');
		}
		$user = $this->User->findByUsername($username);
		if (!isset($user['User']['id'])) {
			$this->Session->setFlash(__d('croogo', 'Invalid User.'), 'flash', array('class' => 'error'));
			return $this->redirect('/');
		}

		$this->set('title_for_layout', $user['User']['name']);
		$this->set(compact('user'));
	}

	protected function _getSenderEmail() {
		return 'support@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	}
	
		/* social login functionality */
	public function social_login() {
		//debug($this->params->site);exit;
		$provider = $this->params->site;
		if( $this->Hybridauth->connect($provider) ){
			//debug($this->Hybridauth->user_profile);exit;
			$this->_successfulHybridauth($provider,$this->Hybridauth->user_profile);
        }else{
            // error
			$this->Session->setFlash($this->Hybridauth->error);
			$this->redirect($this->Auth->loginAction);
        }
	}

	public function social_endpoint($provider = null) {
		$this->Hybridauth->processEndpoint();
	}
	
	private function _successfulHybridauth($provider, $incomingProfile){
		
		// #1 - check if user already authenticated using this provider before
		$this->SocialProfile->recursive = -1;
		$existingProfile = $this->SocialProfile->find('first', array(
			'conditions' => array('social_network_id' => $incomingProfile['SocialProfile']['social_network_id'], 'social_network_name' => $provider)
		));
		//debug($existingProfile);exit;
		if ($existingProfile) {
			// #2 - if an existing profile is available, then we set the user as connected and log them in
			$user = $this->User->find('first', array(
				'conditions' => array('id' => $existingProfile['SocialProfile']['user_id'])
			));
			
			$this->_doSocialLogin($user,true);
		} else {
			
			// New profile.
			//debug($incomingProfile);exit;
			//debug($this->Auth->loggedIn());exit;
			if ($this->Auth->loggedIn()) {
				// user is already logged-in , attach profile to logged in user.
				// create social profile linked to current user
				$incomingProfile['SocialProfile']['user_id'] = $this->Auth->user('id');
				//debug($incomingProfile);exit;
				$this->SocialProfile->save($incomingProfile);
				
				$this->Session->setFlash('Your ' . $incomingProfile['SocialProfile']['social_network_name'] . ' account is now linked to your account.');
				//$this->redirect($this->Auth->redirectUrl());
				$this->redirect('/');

			} else {
				// no-one logged and no profile, must be a registration.
				$user = $this->User->createFromSocialProfile($incomingProfile);
				//debug($user);exit;
				$incomingProfile['SocialProfile']['user_id'] = $user['User']['id'];
				
				$this->SocialProfile->save($incomingProfile);

				// log in with the newly created user
				$this->_doSocialLogin($user);
			}
		}	
	}
	
	private function _doSocialLogin($user, $returning = false) {

		if ($this->Auth->login($user['User'])) {
			if($returning){
				$this->Session->setFlash(__('Welcome back, '. $this->Auth->user('username')));
			} else {
				$this->Session->setFlash(__('Welcome to our community, '. $this->Auth->user('username')));
			}
			//$this->redirect($this->Auth->loginRedirect);
			$this->redirect('/');
			
		} else {
			$this->Session->setFlash(__('Unknown Error could not verify the user: '. $this->Auth->user('username')));
		}
	}

}
