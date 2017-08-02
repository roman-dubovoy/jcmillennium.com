<?php
class UsersController extends AppController{

    public $uses = ['User'];
    public $components = ['RequestHandler', 'Session', 'Cookie'];
    public $helpers = ['Form', 'Session'];
    
    public function index(){
        
    }

    public function view(){

    }
    
    public function add(){
        if ($this->request->is("ajax")){
            $this->response->type('application/json');
            $data = $this->request->input('json_decode', true);
            $user = $this->User->create($data);
            if ($this->User->save($data)){
                $this->response->body(json_encode(['result' => 'success']));
            }
            else
                $this->response->body(json_encode(['result' => 'error']));
            return $this->response;
        }
    }

    public function auth(){
        $this->autoRender = false;
        if ($this->request->is("post")){
            $data = $this->request->data;
            $email = trim(strip_tags($data['User']['email']));
            $password = trim(strip_tags($data['User']['password']));
            $user = $this->User->findByEmailAndPassword($email, $password);
            if (!empty($user)){
                $this->Session->write('user', $user);
                $this->redirect("/");
            }
            else{
                $this->Session->setFlash("Не верный e-mail или пароль!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/");
            }
        }
    }

    public function logout(){
        $this->autoRender = false;
        $this->Session->delete('user');
        $this->redirect("/");
    }

    public function edit($id){

    }

    public function delete($id){

    }
}