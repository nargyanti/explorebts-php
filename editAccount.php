<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/styleLogin.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Edit Product</title>
    </head>
    <body>
        <?php
            include "connection.php";            
            $user_id = $_GET['user_id'];
            session_start();                
            $role_id = $_SESSION['role_id'];
            $query = "SELECT * FROM users WHERE user_id = $user_id;";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);

            if($_SESSION['role_id'] == 1) {
                include "components/navbarVendor.php";
            } else if($_SESSION['role_id'] == 2) {
                include "components/navbarUser.php"; 
            } 
        ?>
        <div class="card container">
            <div class="card-body">
                <form action="editAccountProcess.php?user_id=<?php echo $user_id?>" method="POST" enctype="multipart/form-data">                
                    <div class="mb-3">
                        <label for="profile-pict" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" name="profile_pict" value="<?php echo $row['profile_pict'];?>">
                    </div> 
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname'];?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" required>                                
                    </div>                                                                                                     
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div>   
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>