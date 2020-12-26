<?php
    include "connection.php";
    
    $product_id = $_GET['product_id'];
    
    $query = "DELETE FROM products WHERE product_id = $product_id";
    
    if (mysqli_query($connect, $query)) {                     
        echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='homeVendor.php'</script>";
    } else {                
        echo "<script>alert('Maaf gabisa nambahin soalnya nganu<br>" .  mysqli_error($connect) . "'); window.location.href='createProduct.html'</script>";
    }
?>