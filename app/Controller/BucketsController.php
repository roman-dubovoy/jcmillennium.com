<?php
class BucketsController extends AppController{

    public $uses = ['Product'];
    public $components = ['Session'];
    public $helpers = ['Session'];

    public function beforeFilter(){
        if (empty($this->Session->read('bucket'))){
            $bucket = [];
            $this->Session->write('bucket', $bucket);
        }

    }

    public function add(){
        $this->autoRender = false;
        if ($this->request->is("ajax")){
            $data = $this->request->input('json_decode', true);
            $productId = (int)trim(strip_tags($data['productId']));
            $bucket = $this->Session->read('bucket');
            if ($bucket[$productId] >= 1){
                $bucket[$productId] = ++$bucket[$productId];
            }
            else{
                $bucket[$productId] = 1;
            }
            $this->Session->write('bucket', $bucket);
        }
    }
    
    public function view(){
        $bucket = $this->Session->read('bucket');
        if (empty($bucket)){
            $this->Session->setFlash("Ваша корзина пуста!", 'default', [], 'message');
        }
        $addedProducts = [];
        foreach ($bucket as $productId => $amountOfItems){
            $product = $this->Product->findById($productId);
            $product['Product']['amountOfItems'] = $amountOfItems;
            $product['Product']['image'] = DS . 'img' . DS . 'products' . DS . $product['Product']['image'];
            $addedProducts[] = $product;
        }
        $this->set('addedProducts', $addedProducts);
    }

    public function delete(){
        $productId = (int)trim(strip_tags($this->request->params['id']));
        $bucket = $this->Session->read('bucket');
        $bucket[$productId] = $bucket[$productId] - 1;
        if ($bucket[$productId] == 0){
            unset($bucket[$productId]);
        }
        $this->Session->write('bucket', $bucket);
        $this->redirect('/bucket');
    }

}