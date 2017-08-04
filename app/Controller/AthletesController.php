<?php

class AthletesController extends AppController{

    public $uses = ['Athlete'];
    public $components = ['Session', 'Cookie', 'RequestHandler'];
    public $helpers = ['Session'];

    public function index(){
        $athletesList = $this->Athlete->find('all');
        $this->set('athletesList', $athletesList);
    }

    public function athletesList(){
        $athletesList = $this->Athlete->find('all');
        $this->set('athletesList', $athletesList);
    }
}