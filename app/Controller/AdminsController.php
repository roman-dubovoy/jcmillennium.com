<?php

class AdminsController extends AppController{

    public $uses = ['Admin', 'Coach', 'Athlete', 'User', 'ProductGroup', 'Product'];
    public $components = ['Session', 'Cookie'];
    public $helpers = ['Session'];

    public function beforeFilter(){
        $this->layout = 'admin';
        if ($this->request->param('action') != 'login' && !$this->Session->read('isAdmin'))
            $this->redirect('/admins/login');
    }
    
    public function index(){
        $this->redirect("/admin/coaches");
    }
    
    public function login(){
        $this->layout = 'admin_login';
        if ($this->request->is("post")){
            $data = $this->request->data;
            $login = trim(strip_tags($data['Admin']['login']));
            $password = trim(strip_tags($data['Admin']['password']));
            if ($this->isAdminValid($login, $password)){
                $this->Session->write('isAdmin', true);
                $this->redirect('/admins');
            }
            else{
                $this->Session->setFlash("Неверный логин или пароль!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect('/admins/login');
            }
        }
    }
    
    public function logout(){
        $this->Session->delete('isAdmin');
        $this->redirect("/admins");
    }

    private function isAdminValid($login, $password){
        return !empty($this->Admin->findByLoginAndPassword($login, $password));
    }

    public function coachesList(){
        $coachesList = $this->Coach->find('all');
        $this->set('coachesList', $coachesList);
    }

    public function athletesList(){
        $athletesList = $this->Athlete->find('all');
        $this->set('athletesList', $athletesList);
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
                $this->redirect("/admins/user/edit/{$user['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admins/user/edit/{$user['id']}");
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
        $this->redirect("/admins/users");
    }

    public function productGroupsList(){
        if ($this->request->is("post")){
            $this->autoRender = false;
            $productGroupsList = $this->ProductGroup->find('all');
            $this->response->body(json_encode($productGroupsList));
            return $this->response;
        }
    }

    public function addProductGroup(){
        if ($this->request->is("post")){
            $this->autoRender = false;
            $data = $this->request->data;
            if ($this->ProductGroup->save($data)){
                $this->Session->setFlash("Группа успешно добавлена!", 'default', ['class' => 'alert alert-success']);
                $this->redirect("/admins/productGroups/add");
            }
            else{
                $this->Session->setFlash("При добавлении группы произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admins/productGroups/add");
            }
        }
    }

    public function editProductGroup(){
        if ($this->request->is("post")){
            $productGroup = $this->request->data;
            $this->ProductGroup->id = (int)trim(strip_tags($productGroup['id']));
            if ($this->ProductGroup->updateAll(['ProductGroup.name' => "'" . trim(strip_tags($productGroup['name']))  . "'"],
                ['ProductGroup.id' => (int)trim(strip_tags($productGroup['id']))])){
                $this->Session->setFlash("Данные успешно изменены!", 'default', ['class' => 'alert alert-success']);
                $this->redirect("/admins/productGroup/edit/{$productGroup['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admins/productGroup/edit/{$productGroup['id']}");
            }
        }
        $id = (int)trim(strip_tags($this->request->params['id']));
        $productGroup = $this->ProductGroup->findById($id);
        if (!empty($productGroup))
            $this->set('productGroup', $productGroup['ProductGroup']);
    }

    public function deleteProductGroup(){
        $this->autoRender = false;
        $id = (int)trim(strip_tags($this->request->params['id']));
        if (!empty($this->ProductGroup->findById($id)))
            $this->ProductGroup->delete($id);
        $this->redirect("/admins/productGroups");
    }

    public function productsList(){
        if ($this->request->is("post")){
            $this->autoRender = false;
            $productsList = $this->Product->find('all');
            for ($i = 0; $i < count($productsList); $i++){
                $productGroup = $this->ProductGroup->findById($productsList[$i]['Product']['product_group_id']);
                if (!empty($productGroup)){
                    $productsList[$i]['Product']['groupName'] = $productGroup['ProductGroup']['name'];
                }
                unset($productsList[$i]['Product']['product_group_id']);

                $productsList[$i]['Product']['image'] = '/img' . DS . 'products' . DS . $productsList[$i]['Product']['image'];
            }
            $this->response->body(json_encode($productsList));
            return $this->response;
        }
    }

    public function addProduct(){
        if ($this->request->is("post")){
            $data = $this->request->data;

            $photoName =  mb_substr($_FILES['photo']['name'], 0, mb_strpos($_FILES['photo']['name'], '.'))
                            . "_" . time() .
                            mb_substr($_FILES['photo']['name'], mb_strpos($_FILES['photo']['name'], '.'),
                                mb_strlen($_FILES['photo']['name']));
            $pathToPhoto = WWW_ROOT . DS . 'img' . DS . 'products' . DS . $photoName;
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $pathToPhoto))
                $data['image'] = $photoName;
            else
                $data['image'] = 'default_product.png';

            $data['product_group_id'] = $data['group'];

            if ($this->Product->save($data)){
                $this->Session->setFlash("Данные сохранены успешно!", 'default', ['class' => 'alert alert-success']);
                $this->redirect("/admins/products/add");
            }
            else{
                $this->Session->setFlash("При сохранении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admins/products/add");
            }
        }
        $productGroups = $this->ProductGroup->find('all');
        $this->set('productGroups', $productGroups);
    }

    public function editProduct(){
        if ($this->request->is("post")){
            $product = $this->request->data;
            if (!empty($_FILES['photo'])){
                $currentImage = $this->Product->findById($product['id'])['Product']['image'];
                $pathToPhoto = WWW_ROOT . 'img' . DS . 'products' . DS . $currentImage;
                unlink($pathToPhoto);
                $photoName =  mb_substr($_FILES['photo']['name'], 0, mb_strpos($_FILES['photo']['name'], '.'))
                    . "_" . time() .
                    mb_substr($_FILES['photo']['name'], mb_strpos($_FILES['photo']['name'], '.'),
                        mb_strlen($_FILES['photo']['name']));
                $pathToPhoto = WWW_ROOT . DS . 'img' . DS . 'products' . DS . $photoName;
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $pathToPhoto))
                    $product['image'] = $photoName;
            }

            $product['product_group_id'] = $product['group'];

            $this->Product->id = $product['id'];
            if ($this->Product->save($product)){
                $this->Session->setFlash("Данные успешно изменены!", 'default', ['class' => 'alert alert-success']);
                $this->redirect("/admins/product/edit/{$product['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admins/product/edit/{$product['id']}");
            }
        }
        $id = (int)trim(strip_tags($this->request->params['id']));
        $product = $this->Product->findById($id);
        if (!empty($product)){
            $product['Product']['image'] = DS . 'img' . DS . 'products' . DS . $product['Product']['image'];
            $this->set('product', $product['Product']);
        }
        $productGroups = $this->ProductGroup->find('all');
        $this->set('productGroups', $productGroups);
    }

    public function deleteProduct(){
        $this->autoRender = false;
        $id = (int)trim(strip_tags($this->request->params['id']));
        if ($product = $this->Product->findById($id)){
            $pathToPhoto = WWW_ROOT . DS . 'img' . DS . 'products' . DS . $product['Product']['image'];
            unlink($pathToPhoto);
            $this->Product->delete($id);
        }
        $this->redirect("/admins/products");
    }
}
