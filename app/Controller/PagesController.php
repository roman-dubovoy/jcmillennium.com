<?php

/**
 * Class for displaying static pages
 *
 * Class PagesController
 */
class PagesController extends AppController{
    
    public function home(){
        $this->render('home');
    }

    public function club(){
        $this->render('club');
    }
    
    public function contacts(){
        $this->render('contacts');
    }

    public function judo(){
        $this->render('judo');
    }

    public function emblem(){
        $this->render('emblem');
    }
}