<?php    
    include "connection.php";
    $user_id = $_GET['user_id'];     
    $oldPassword = MD5($_POST['oldPassword']);
    $newPassword = MD5($_POST['newPassword']);

    $query = "SELECT * FROM users WHERE user_id = $user_id AND password = '$oldPassword'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);        
    if($check > 0){                 
        $query = "UPDATE users SET password='$newPassword' WHERE user_id = '$user_id'";
        $result = mysqli_query($connect, $query);                                            
        if ($result) {
            echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='profile.php'</script>";
        } else {
            echo "<script>alert('SQL Error <br> " . mysqli_error($connect) . "'); window.location.href='changePassword.php'</script>"; 
        }       
    } else { 
        echo "<script>alert('The password you entered is incorrect. Please try again.'); window.location.href='changePassword.php'</script>";
    }                    
?> 