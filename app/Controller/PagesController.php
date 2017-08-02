<?php

/**
 * Class for displaying static pages
 *
 * Class PagesController
 */
class PagesController extends AppController{

    public $components = ['Session', 'Cookie'];
    public $helpers = ['Session'];
    
    public function contacts(){
        $this->render('contacts');
    }

}