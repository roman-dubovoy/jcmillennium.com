<?php
class CoachesController extends AppController{
    
    public $uses = ['Coach'];

    public function coachesList(){
        $coachesList = $this->Coach->find('all');
        $this->set('coachesList', $coachesList);
    }

}