<?php
    Class Home extends Controller {
        function defaultView(){
            $productDB = $this->model("ProductsModel");
            $this->view("HomeView", [
                "all-pro"=>$productDB->getAllProducts(),
                "all-type"=>$productDB->getAllCategories(),
                "pro-db"=>$productDB,
                "all-special"=>$productDB->getSpecialProduct()
            ]);
        }
    }
?>