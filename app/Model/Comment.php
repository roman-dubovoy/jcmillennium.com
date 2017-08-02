<?php
App::uses('AppModel', 'Model');

class Comment extends Model{
    public $name = 'Comment';
    public $useTable = 'comments';
}