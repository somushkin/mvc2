<?php
$product_cart = array();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $product_id = $_POST['id'];

    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];

        if (isset($_COOKIE['product_cart'])) {
                $product_cart = json_decode($_COOKIE['product_cart'], true);
                $product_cart[$product_id] = $amount;
        } else {
                $product_cart[$product_id] = $amount;
        }

        setcookie('product_cart', json_encode($product_cart), time()+3600*24*30,'/');    
    }
}

exit(print(json_encode($product_cart)));

/*
$product_cart = unserialize($_COOKIE['product_cart']);
$countProductCart = count($product_cart);

exit(print(json_encode($countProductCart)));*/