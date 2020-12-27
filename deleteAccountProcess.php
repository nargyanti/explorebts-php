<?php
    include "connection.php";
    
    session_start();
    $role_id = $_SESSION['role_id'];
    $user_id = $_GET['user_id'];
    
    if ($role_id == 1) {
        $query = "DELETE FROM products WHERE vendor_id  = $user_id;";    
    } else if ($role_id = 2) {
        $query = "DELETE FROM bookings WHERE tourist_id = $user_id;";    
    }    
    
    mysqli_query($connect, $query);
    
    if (mysqli_query($connect, $query)) {                     
        $query = "DELETE FROM users WHERE user_id = $user_id;";
        if (mysqli_query($connect, $query)) {                                             
            echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='logoutSession.php'</script>";
        } else {                
            echo mysqli_error($connect);
            //echo "<script>alert('Maaf gabisa nambahin soalnya nganu<br>" .  mysqli_error($connect) . "'); window.location.href='homeVendor.php'</script>";
        }        
    } else {                
        echo  mysqli_error($connect);
        //echo "<script>alert('Maaf gabisa nambahin soalnya nganu<br>" .  mysqli_error($connect) . "'); window.location.href='homeVendor.php'</script>";
    }
?>