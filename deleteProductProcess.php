<?php
    include "connection.php";
    
    $product_id = $_GET['product_id'];
        
    $query = "DELETE FROM bookings WHERE product_id = $product_id;";
    
    mysqli_query($connect, $query);
    
    if (mysqli_query($connect, $query)) {                     
        $query = "DELETE FROM products WHERE product_id = $product_id;";
        if (mysqli_query($connect, $query)) {                                             
            echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='homeVendor.php'</script>";
        } else {                
            //echo  mysqli_error($connect);
            echo "<script>alert('Maaf gabisa nambahin soalnya nganu<br>" .  mysqli_error($connect) . "'); window.location.href='homeVendor.php'</script>";
        }        
    } else {                
        //echo  mysqli_error($connect);
        echo "<script>alert('Maaf gabisa nambahin soalnya nganu<br>" .  mysqli_error($connect) . "'); window.location.href='homeVendor.php'</script>";
    }
?>