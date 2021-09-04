<?php

class ProductController extends Controller
{
    public function actionIndex() {
        $products = (new Product())->findAll();        
        return $this->render('product/index', ['products' => $products]);
    }

    public function actionCreate() {
        $product = (new Product());
        
        if(isset($_POST) && !empty($_POST)) {
            
            $name = $_POST['name'];
            $description = $_POST['description'];

            $product->setName($name);
            $product->setDescription($description);
            $product->insert();

            header("Location: ".URL."product/index");
        }        

        return $this->render('product/create', ['product' => $product]);
    }

    public function actionUpdate($id) {
    	$product = (new Product())->find($id);

    	if(isset($_POST) && !empty($_POST)) {    		           
            $name = $_POST['name'];
            $description = $_POST['description'];

            $product->setName($name);
            $product->setDescription($description);
            $product->update();

            header("Location: ".URL."product/index");
        }        

        return $this->render('product/create', ['product' => $product]);
    }    

    public function actionDelete($id) {
    	$product = (new Product())->find($id);
        $product->delete();
    	    	     
        header("Location: ".URL."product/index");
    }  
}
?>