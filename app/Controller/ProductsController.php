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

}