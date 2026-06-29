<?php
function getProducts($id) {
    if($id== 0){
          echo json_encode(Product::readAll());
    }else{

          echo json_encode(Product::readAllFilter($id));
    }

    
}
function getProductById() {
}

?>