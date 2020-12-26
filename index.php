<?php
session_start();

if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '' && $_SESSION['role_id'] == 1) {                        
    header('location:homeVendor.php');      
    exit();          
} else if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '' && $_SESSION['role_id'] == 2) {            
    header('location:homeUser.php');        
    exit();
} else {
    header('location:landing.html');    
    exit();
}