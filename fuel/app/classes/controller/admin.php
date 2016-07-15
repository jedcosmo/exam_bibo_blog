<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller_Admin extends Controller
{
       
    public function action_register()
    {
            Asset::add_path('assets/vendor/font-awesome/', array('css')); 
            
            if ( Auth::instance()->check() ) :
                Session::set_flash('error', 'Oops, you are already logged in.');
                Response::redirect('/');
            endif;
            
            return Response::forge(View::forge('admin/register'));            
    }
    
    public function action_login()
    {
            Asset::add_path('assets/vendor/font-awesome/', array('css'));
            $auth = Auth::instance();
            
            if ( Auth::instance()->check() ) :
                Session::set_flash('error', 'Oops, you are already logged in.');
                Response::redirect('/');
            endif;
            
            if ( 'POST' == Input::method() )
            {
                if( $auth->login( Input::post('username'), Input::post('password') ) ){
                    Session::set_flash('success', 'Welcome, '. $auth->get_screen_name() . '. You are now logged in');
                    Response::redirect('/', 'refresh');
                }else{
                    Session::set_flash('error', 'Sorry your credentials are not valid.'); 
                }
            }
            
            return Response::forge(View::forge('admin/login'));            
    }
    
    public function action_logout(){
            $auth = Auth::instance();
            $auth->logout();
            Session::set_flash('success', 'Logged out.');
            Response::redirect('/');
    }
    
    public function action_create(){
        
            if ( 'POST' == Input::method() )
            {                
                $val = Validation::forge();
                $val = Model_User::get_validation( $val );                
                //$val = true;
                if ( $val->run() )
                {
                    $user = Auth::create_user(
                        Input::post('username'), 
                        Input::post('password'),
                        Input::post('email_address'),
                        1,
                        array(
                            'firstname' => Input::post('firstname'),
                            'last_name' => Input::post('last_name'),
                            'deleted_flag' => 0,
                        )
                        
                    );
                    
                    //$user->save();
                    
                    Session::set_flash('success', 'Registration successful, you can now login.');
                    Response::redirect('/login', 'refresh');
                }
                else
                {
                    $errors = $val->error();
                    Session::set_flash('error', 'Some field(s) are required or not valid.');
                    Response::redirect('/register', 'refresh');
                }
            } 
            
            Session::set_flash('error', 'Some field seems to be required or not valid.');
            
    }        
    
}
