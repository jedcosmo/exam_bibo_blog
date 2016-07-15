<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'email',
		'password',
		'profile_fields',
		'group',
		'last_login',
		'login_hash',
		'created_at',
		'updated_at',
	);

        public static function get_validation(\Validation $val)
        {
            $val->add_callable('Model\\Auth_User');
            $val->add_field('firstname', 'First Name', 'required|min_length[2]|max_length[50]');
            $val->add_field('last_name', 'Last Name', 'required|min_length[2]|max_length[50]');
            $val->add_field('username', 'Username', 'required|min_length[2]|max_length[50]');
            $val->add_field('password', 'Password', 'required|min_length[6]|max_length[100]');
            $val->add_field('email_address', 'Email Address', 'required|valid_email|min_length[5]|max_length[250]');
            
            return $val;
        }

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

}
