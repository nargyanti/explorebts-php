<?php    
    include "connection.php";
    $userKeyword = $_POST['userKeyword'];             
    $password = MD5($_POST['newPassword']);

    $query = "SELECT * FROM users WHERE username = '$userKeyword' OR email = '$userKeyword'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);        
    if($check > 0){ 
        $user_id = $row['user_id'];
        $role_id = $row['role_id'];
        $query = "UPDATE users SET password='$password' WHERE user_id = '$user_id'";
        $result = mysqli_query($connect, $query);                                            
        if ($result) {
            session_start();
            $_SESSION['username'] = $username;       
            $_SESSION['user_id'] = $row['user_id'];     
            $_SESSION['role_id'] = $role_id;
            $_SESSION['login'] = true;
            echo $row['role_id'];
            if($role_id  == 1){            
                echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='homeVendor.php'</script>";
            } else if($role_id == 2){            
                echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='homeUser.php'</script>";
            } 
        }        
    } else { 
        echo "<script>alert('The username or email you entered is invalid. Please try again.'); window.location.href='forgotPassword.php'</script>";
    }                    
?> 