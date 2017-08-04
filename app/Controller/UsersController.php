<?php
class UsersController extends AppController{

    public $uses = ['User'];
    public $components = ['RequestHandler', 'Cookie'];
    public $helpers = ['Form'];
    
    public function adminLogin(){
        if ($this->Cookie->read('_token')){
            $this->redirect('/admin');
        }
        $this->layout = 'admin_login';
        if ($this->request->is("post")){
            $data = $this->request->data;
            $login = trim(strip_tags($data['Admin']['login']));
            $password = hash('sha256', trim(strip_tags($data['Admin']['password'])));
            if ($this->isAdminValid($login, $password)){
                $token = str_shuffle(strtolower(sha1(rand()
                    .time() . uniqid(mt_rand(), true))));
                //$this->Session->write('_token', $token);
                $this->Cookie->write('_token', $token, true, '3 days');
                $this->redirect('/admin');
            }
            else{
                $this->Session->setFlash("Неверный логин или пароль!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect('/admin/login');
            }
        }
    }

    public function adminLogout(){
        $this->Cookie->delete('_token');
        $this->redirect("/admin/login");
    }

    private function isAdminValid($login, $password){
        return !empty($this->User->findByLoginAndPassword($login, $password));
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

    public function usersList(){
        if ($this->request->is("post")){
            $this->autoRender = false;
            $usersList = $this->User->find('all');
            $this->response->body(json_encode($usersList));
            return $this->response;
        }
    }

    public function viewUser(){
        $id = $this->request->params['id'];
        $user = $this->User->findById($id);
        $this->set('user', $user['User']);
    }

    public function editUser(){
        if ($this->request->is("post")){
            $user = $this->request->data;
            $this->User->id = (int)trim(strip_tags($user['id']));
            if ($this->User->updateAll(['User.name' => "'" . trim(strip_tags($user['name']))  . "'",
                'User.login' => "'" . trim(strip_tags($user['login']))  . "'",
                'User.email' => "'" . trim(strip_tags($user['email']))  . "'"],
                ['User.id' => (int)trim(strip_tags($user['id']))]
            )){
                $this->Session->setFlash("Данные успешно изменены!", 'default', ['class' => 'alert alert-success']);
                $this->redirect("/admin/user/edit/{$user['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admin/user/edit/{$user['id']}");
            }
        }
        $id = $this->request->params['id'];
        $id = (int)trim(strip_tags($id));
        $user = $this->User->findById($id);
        if (!empty($user))
            $this->set("user", $user['User']);
    }

    public function deleteUser(){
        $this->autoRender = false;
        $id = $this->request->params['id'];
        $id = (int)trim(strip_tags($id));
        if (!empty($this->User->findById($id)))
            $this->User->delete($id);
        $this->redirect("/admin/users");
    }
}