<?php
/* 
 * Simple Blog API controller in FuelPHP.
 */
class Controller_Api extends Controller_Rest{
    
    protected $format = 'json';


    public function action_get_all_blog(){               
        $blog_items = Model_Blog::find('all');
        
        return $this->response(array(
            'blog_items' => $blog_items,
            'status' => 'success',
            'empty' => null
        ));
    }
    
    public function action_edit(){               
        $blog_item = Model_Blog::find(Input::get('id'));
        
        if( $blog_item ){            
            $messsage = 'Blog item successfully found.';
            $status = 'success';
        }else{
            $messsage = 'Could not find blog item.';
            $status = 'failed';
        }
        
        return $this->response(array(
            'message' => $messsage,
            'blog_item' => $blog_item,
            'status' => $status,
            'empty' => null
        ));
    }
    
    public function action_delete(){
        $messsage = 'Error in deleting blog item.';
        $status = 'failed';
        
        $blog_item = Model_Blog::find(Input::get('id'));
        
        if( $blog_item ){
            $blog_item->delete();
            $messsage = 'Blog item successfully deleted.';
            $status = 'success';
        }else{
            $messsage = 'Could not delete blog item.';
            $status = 'failed';
        }
        
        return $this->response(array(
            'message' => $messsage,
            'status' => $status,
            'empty' => null
        ));
    }
    
    public function action_create(){
        
        $messsage = 'Error in creating blog item.';
        $status = 'failed';
        if (Input::method() == 'POST')
        {
            
            $val = Validation::forge();
            $val = Model_Blog::get_validation( $val );
            
            if( $val->run() ){
                
                $post = Model_Blog::forge(array(
                    'title' => Input::post('title'),
                    'slug' => Inflector::friendly_title(Input::post('title'), '-', true),                
                    'content' => Input::post('content'),
                    'user_id' => Input::post('user_id'),
                ));

                if ($post && $post->save())
                {
                    $messsage = 'Added post #'.$post->id.'.'; 
                    $status = 'success';
                }
                else
                {
                    $messsage = 'Could not save blog item';
                    $status = 'failed';
                }
                
            }
            
        }
        
        return $this->response(array(
            'message' => $messsage,
            'status' => $status,
            'empty' => null
        ));
    }
}
