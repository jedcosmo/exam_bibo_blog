<?php
use GuzzleHttp\Client;
/**
 * @group App
 * @group Blog
 */
class Test_Blog extends PHPUnit_Framework_TestCase
{
        protected $client;

        protected function setUp()
        {
            $this->client = new Client([
                'base_url' => 'http://fuelphp.localhost'
            ]);
        }                     
                
        public function test_blog_api_create(){
            $blog_id = 300;
            $status = 'success';            
            $response = $this->client->post('/api/create', [
                'json' => [
                    'id'      => $blog_id,
                    'title'   => 'My Random Test Blog',
                    'content' => 'My Random Test Blog Content should be like this.'
                ]                
            ]);           

            $this->assertEquals(200, $response->getStatusCode());                        
            $data = json_decode($response->getBody(), true);            
            $this->assertEquals($status, $data['status']);
        }
        
        public function test_blog_api_delete(){
            $status = 'success'; 
            $response = $this->client->delete('/api/delete', [
                'query' => [
                    'id' => 1
                ]
            ]);

            $this->assertEquals(200, $response->getStatusCode());
            $data = json_decode($response->getBody(), true);
            $this->assertEquals($status, $data['status']);
        }
        
        public function test_blog_api_edit(){
            $status = 'success'; 
            $response = $this->client->get('/api/edit', [
                'query' => [
                    'id' => 1
                ]
            ]);

            $this->assertEquals(200, $response->getStatusCode());
            $data = json_decode($response->getBody(), true);            
            $this->assertEquals($status, $data['status']);
        }
        
        public function test_blog_api_get_all_blog(){
            $status = 'success'; 
            $response = $this->client->get('/api/get_all_blog');

            $this->assertEquals(200, $response->getStatusCode());
            $data = json_decode($response->getBody(), true);            
            $this->assertEquals($status, $data['status']);
        }
}
