<?php
class PostsController extends AppController{
    
    public $uses = ['Post'];
    public $paginate = [
        'limit' => 8,
        'order' => [
            'Post.id' => 'asc'
        ]
    ];
    
    public function index(){
        $this->render('index');
    }

    public function results(){
        
    }
    
    public function postsList(){
        $postsList = $this->paginate();
        $this->set('postsList', $postsList);
        $this->render('posts_list');
    }
    
    public function addPost(){
        
    }

    public function editPost(){

    }

    public function deletePost(){

    }
}