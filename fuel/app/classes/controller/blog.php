<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller_Blog extends Controller
{
    
    public function action_index()
    {
            Asset::add_path('assets/vendor/font-awesome/', array('css'));
            $data['blog_items'] = Model_Blog::find('all');
                                    
            return Response::forge(View::forge('blog/index', $data));            
    }
    
    public function action_hello()
    {
            return Response::forge(Presenter::forge('blog/hello'));
    }

    /**
     * The 404 action for the application.
     *
     * @access  public
     * @return  Response
     */
    public function action_404()
    {
            return Response::forge(Presenter::forge('blog/404'), 404);
    }
    
    public function action_create()
    {        
        Asset::add_path('assets/vendor/font-awesome/', array('css'));
        
        if ( !Auth::instance()->check() ) :
            Session::set_flash('error', 'Oops, you are trying to access admin role.');
            Response::redirect('/');
        endif;
        
        if (Input::method() == 'POST')
        {
            
            $val = Validation::forge();
            $val = Model_Blog::get_validation( $val );
            
            if( $val->run() ){
                
                $post = Model_Blog::forge(array(
                    'title' => Input::post('title'),
                    'slug' => Inflector::friendly_title(Input::post('title'), '-', true),                
                    'content' => Input::post('content'),
                    'user_id' => 1,
                ));

                if ($post && $post->save())
                {
                    Session::set_flash('success', 'Added post #'.$post->id.'.');
                    Response::redirect('blog/create');
                }
                else
                {
                    Session::set_flash('error', 'Could not save post.');
                }
                
            }else{
                $errors = $val->error();
            }
            
        }

        return Response::forge(View::forge('blog/create'));
    }
    
    public function action_edit($id = null)
    {        
        Asset::add_path('assets/vendor/font-awesome/', array('css'));
        
        if ( !Auth::instance()->check() ) :
            Session::set_flash('error', 'Oops, you are trying to access admin role.');
            Response::redirect('/');
        endif;
        
        $post = Model_Blog::find($id);
        $data = array();
        
        if (Input::method() == 'POST')
        {
            $post = Model_Blog::forge(array(
                'title' => Input::post('title'),
                'slug' => Inflector::friendly_title(Input::post('title'), '-', true),                
                'content' => Input::post('content'),
                'user_id' => 1,
            ));

            if ($post->save())
            {
                Session::set_flash('success', 'Updated post #'.$post->id.'.');
                Response::redirect('blog/edit/'.$post->id);
            }
            else
            {
                Session::set_flash('error', 'Could not save post.');
            }
        }else{
            $data['edit_blog'] = $post;
        }

        return Response::forge(View::forge('blog/edit', $data));
    }
    
    
    public function action_register(){
            return Response::forge(Presenter::forge('blog/register'));
    }
    
    public function action_delete($id = null){
        
        if ( !Auth::instance()->check() ) :
            Session::set_flash('error', 'Oops, you are trying to access admin role.');
            Response::redirect('/');
        endif;
        
        $blog_item = Model_Blog::find($id);
        
        if( $blog_item ){
            $blog_item->delete();
            $messsage = 'Blog item successfully deleted.';
            Session::set_flash('success', $messsage);
        }else{
            $messsage = 'Could not delete blog item.';
            Session::set_flash('success', $messsage);
        }
        
        Response::redirect('/', 'refresh');
    }
    
    public function action_preview($slug = null){
        Asset::add_path('assets/vendor/font-awesome/', array('css'));
        
        $post = Model_Blog::find_by_slug($slug);
        $data = array();
        
        if (Input::method() == 'POST')
        {
            $comment = Model_Comment::forge(array(
                'blog_id' => Input::post('blog_id'),                                
                'content' => Input::post('comment'),                
            ));

            if ($comment->save())
            {
                Session::set_flash('success', 'Comment successfully created.');                
            }
            else
            {
                Session::set_flash('error', 'Could not save comment.');
            }
        }
        
        $data['blog_item'] = $post;
        
        return Response::forge(View::forge('blog/preview', $data));
    }
    
}
