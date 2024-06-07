<?php
session_start();

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(!in_array($_GET['id'], $item_array_id)){
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'product_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity']
            );
            $_SESSION['cart'][$count] = $item_array;
            echo '<script>window.location="Cart.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="Cart.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'product_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}

?>
