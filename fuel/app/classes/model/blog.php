<?php

class Model_Blog extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'slug',
		'content',
		'user_id',
		'created_at',
		'updated_at',
	);
        
        public static function get_validation(\Validation $val)
        {
            $val->add_callable('\Model_Blog');
            $val->add_field('title', 'Title', 'required|min_length[10]|max_length[255]');            
            $val->add_field('content', 'Content', 'required|min_length[10]');            
            
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

	protected static $_table_name = 'blogs';

}
