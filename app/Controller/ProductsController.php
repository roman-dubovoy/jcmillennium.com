<?php
class ProductsController extends AppController{

    public $uses = ['Product', 'ProductGroup'];
    public $components = ['Session', 'Cookie'];
    public $helpers = ['Session'];

    public function index(){
        $productsList = $this->Product->find('all');
        if (!empty($productsList)){
            for ($i = 0; $i < count($productsList); $i++){
                $productsList[$i]['Product']['image'] = DS . 'img' . DS . 'products' . DS . $productsList[$i]['Product']['image'];
                $productGroup = $this->ProductGroup->findById($productsList[$i]['Product']['product_group_id']);
                if (!empty($productGroup))
                    $productsList[$i]['Product']['groupName'] = $productGroup['ProductGroup']['name'];
            }
        }
        else{
            $this->Session->setFlash("Товаров нет!");
        }
        $productGroupsList = $this->ProductGroup->find('all');
        $this->set('selectedGroup', 'all');
        $this->set('productGroupsList', $productGroupsList);
        $this->set('productsList', $productsList);
    }
    
    public function filteredList(){
        $choosenGroup = $this->request->params['group_id'];
        $productsList = $this->Product->findAllByProductGroupId((int)$choosenGroup);
        if (!empty($productsList)){
            for ($i = 0; $i < count($productsList); $i++){
                $productsList[$i]['Product']['image'] = DS . 'img' . DS . 'products' . DS . $productsList[$i]['Product']['image'];
                $productGroup = $this->ProductGroup->findById((int)$choosenGroup);
                if (!empty($productGroup))
                    $productsList[$i]['Product']['groupName'] = $productGroup['ProductGroup']['name'];
            }
        }
        else{
            $this->Session->setFlash("Товаров в выбранной категории нет!");
        }
        $productGroupsList = $this->ProductGroup->find('all');
        $selectedGroup = $this->ProductGroup->findById((int)$choosenGroup);
        $this->set('selectedGroup', $selectedGroup['ProductGroup']['name']);
        $this->set('productGroupsList', $productGroupsList);
        $this->set('productsList', $productsList);
        $this->render('index');
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
                $this->redirect("/admin/productGroups/add");
            }
            else{
                $this->Session->setFlash("При добавлении группы произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admin/productGroups/add");
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
                $this->redirect("/admin/productGroup/edit/{$productGroup['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admin/productGroup/edit/{$productGroup['id']}");
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
        $this->redirect("/admin/productGroups");
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
                $this->redirect("/admin/products/add");
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
                $this->redirect("/admin/product/edit/{$product['id']}");
            }
            else{
                $this->Session->setFlash("При изменении данных произошла ошибка!", 'default', ['class' => 'alert alert-danger']);
                $this->redirect("/admin/product/edit/{$product['id']}");
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
        $this->redirect("/admin/products");
    }
}