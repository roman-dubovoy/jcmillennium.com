<?php

App::uses('CakeEmail', 'Network/Email');

class FeedbacksController extends AppController{

    public $uses = ['Feedback'];
    public $components = ['RequestHandler'];

    public function handleContactsForm(){
        $this->autoRender = false;
        if ($this->request->is('post') && $this->request->is('ajax')){
            $data = [
                'user_ip' => $this->request->clientIp(),
                'name' => trim(strip_tags($this->request->data('name'))),
                'email' => trim(strip_tags($this->request->data('email'))),
                'message' => trim(strip_tags($this->request->data('message'))),
                'datetime' =>date('Y-m-d H:i:s', time())
            ];

            if ($this->Feedback->save($data)){
                //TODO раскомментировать на продакшене
                /*$email = new CakeEmail();
                $email->from(['support@jcmillennium.com' => 'JC MILLENNIUM'])
                      ->to('roman.dubovoy7@gmail.com')//TODO изменить на judomillennium@ukr.net
                      ->subject('Обратная связь')
                      ->emailFormat('html')
                      ->send("Уважаемый администратор!<br>
                             Пользователь с именем: {$data['name']} и электронной почтой: {$data['email']} оставил сообщение:<br>
                             {$data['message']}   
                            ");*/
                return json_encode(['success' => true]);
            }
            else
                return json_encode(['success' => false, 'message' => 'Operation failed']);
        }
        return json_encode(['success' => false, 'message' => 'Invalid HTTP method']);
    }
}