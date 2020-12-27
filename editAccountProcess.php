<?php
    include "connection.php";

    $user_id = $_GET['user_id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];    
    $address = $_POST['address'];
    $phone = $_POST['phone'];    
    $email = $_POST['email'];        
    $profile_pict = $_FILES['profile_pict']['name'];
    
    $target_path="uploads/profile_pict/";
    $target_path = $target_path . basename($profile_pict);

    move_uploaded_file($_FILES['profile_pict']['tmp_name'], $target_path);    

    $query = "UPDATE users SET fullname = '$fullname', username = '$username', address = '$address', 
                phone = '$phone', email = '$email', profile_pict = '$profile_pict' WHERE user_id = $user_id;";
    
    if (mysqli_query($connect, $query)) {                       
        echo "<script>alert('Alhamdulillah udah bisa'); window.location.href='profile.php'</script>";        
    } else {        
        echo "<script>alert('Mohon maap gabisa<br>." .  mysqli_error($connect) . "'); window.location.href='editAccount.php'</script>";
    }
?>