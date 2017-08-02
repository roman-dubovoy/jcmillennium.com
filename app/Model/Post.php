<?php
App::uses('AppModel', 'Model');

class Post extends Model{
    public $name = 'Post';
    public $useTable = 'posts';
}