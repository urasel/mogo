<?php

App::uses('UsersAppModel', 'Users.Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User
 *
 * @category Model
 * @package  Croogo.Users.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class User extends UsersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'User';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Acl' => array(
			'className' => 'Croogo.CroogoAcl',
			'type' => 'requester',
		),
		'Croogo.Trackable',
		'Search.Searchable',
	);

/**
 * Model associations: belongsTo
 *
 * @var array
 * @access public
 */
	public $belongsTo = array('Users.Role');

/**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'username' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The username has already been taken.',
				'last' => true,
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			'validAlias' => array(
				'rule' => 'validAlias',
				'message' => 'This field must be alphanumeric',
				'last' => true,
			),
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'message' => 'Please provide a valid email address.',
				'last' => true,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Email address already in use.',
				'last' => true,
			),
		),
		'password' => array(
			'rule' => array('minLength', 6),
			'message' => 'Passwords must be at least 6 characters long.',
		),
		'verify_password' => array(
			'rule' => 'validIdentical',
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			'validName' => array(
				'rule' => 'validName',
				'message' => 'This field must be alphanumeric',
				'last' => true,
			),
		),
		'website' => array(
			'url' => array(
				'rule' => 'url',
				'message' => 'This field must be a valid URL',
				'allowEmpty' => true,
			),
		),
	);

/**
 * Filter search fields
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		'name' => array('type' => 'like', 'field' => array('User.name', 'User.username')),
		'role_id' => array('type' => 'value'),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'Role.title' => 'Role',
		'username',
		'name',
		'status' => array('type' => 'boolean'),
		'email',
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'role_id',
		'username',
		'name',
		'email',
		'website',
		'status',
	);

/**
 * Constructor. Configures the order property.
 *
 * @param bool|int|string|array $id Set this ID for this model on startup,
 * can also be an array of options, see above.
 * @param string $table Name of database table to use.
 * @param string $ds DataSource connection name.
 */
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->order = $this->alias . '.name ASC';
	}

/**
 * beforeDelete
 *
 * @param boolean $cascade
 * @return boolean
 */
	public function beforeDelete($cascade = true) {
		$this->Role->Behaviors->attach('Croogo.Aliasable');
		$adminRoleId = $this->Role->byAlias('admin');

		$current = AuthComponent::user();
		if (!empty($current['id']) && $current['id'] == $this->id) {
			return false;
		}
		if ($this->field('role_id') == $adminRoleId) {
			$count = $this->find('count', array(
				'conditions' => array(
					$this->escapeField() . ' <>' => $this->id,
					$this->escapeField('role_id') => $adminRoleId,
					$this->escapeField('status') => true,
				)
			));
			return ($count > 0);
		}
		return true;
	}

/**
 * beforeSave
 *
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		if (!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

/**
 * _identical
 *
 * @param string $check
 * @return boolean
 * @deprecated Protected validation methods are no longer supported
 */
	protected function _identical($check) {
		return $this->validIdentical($check);
	}

/**
 * validIdentical
 *
 * @param string $check
 * @return boolean
 */
	public function validIdentical($check) {
		if (isset($this->data[$this->alias]['password'])) {
			if ($this->data[$this->alias]['password'] != $check['verify_password']) {
				return __d('croogo', 'Passwords do not match. Please, try again.');
			}
		}
		return true;
	}
	
	public function createFromSocialProfile($incomingProfile){
	
		// check to ensure that we are not using an email that already exists
		$existingUser = $this->find('first', array('conditions' => array('User.email' => $incomingProfile['SocialProfile']['email'])));
		//debug($existingUser);exit;
		if($existingUser){
			// this email address is already associated to a member
			return $existingUser;
		}
		debug($incomingProfile);exit;
		// brand new user
		if(empty($incomingProfile['SocialProfile']['email'])){
			$socialUser['User']['email'] = 'socialuser@infomap24.com';
		}else{
			$socialUser['User']['email'] = $incomingProfile['SocialProfile']['email'];
		}
		if(empty($incomingProfile['SocialProfile']['first_name'])){
			$socialUser['User']['firstname'] = 'Social User';
		}else{
			$socialUser['User']['firstname'] = $incomingProfile['SocialProfile']['first_name'];
		}
		if(empty($incomingProfile['SocialProfile']['last_name'])){
			$socialUser['User']['lastname'] = 'Social';
		}else{
			$socialUser['User']['lastname'] = $incomingProfile['SocialProfile']['last_name'];
		}
		
		$socialUser['User']['name'] = $incomingProfile['SocialProfile']['display_name'];
		$socialUser['User']['username'] = str_replace(' ', '_',$incomingProfile['SocialProfile']['display_name']);
		$socialUser['User']['role_id'] = 2; // by default all social logins will have a role of bishop
		$socialUser['User']['password'] = date('Y-m-d h:i:s'); // although it technically means nothing, we still need a password for social. setting it to something random like the current time..
		$socialUser['User']['created'] = date('Y-m-d h:i:s');
		$socialUser['User']['modified'] = date('Y-m-d h:i:s');
		$socialUser['User']['activation_key'] = $incomingProfile['SocialProfile']['social_network_id'];
		$socialUser['User']['status'] = 1;
		
		// save and store our ID
		$this->save($socialUser);
		$socialUser['User']['id'] = $this->id;
		
		return $socialUser;
		
	
	}

}
