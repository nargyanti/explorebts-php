<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Profile</title>                
    </head>
    <body>                
        <?php
            include "connection.php";
            session_start();                
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE user_id = $user_id;";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
                                    
            if($_SESSION['role_id'] == 1) {
                include "components/navbarVendor.php";
            } else if($_SESSION['role_id'] == 2) {
                include "components/navbarUser.php"; 
            } 
        ?>        
            <!-- Profile card -->
            <div class="card text-center" style="width: 400px; height: 200px">
                <img style="width: 200px; height: 200px" src="uploads/profile_pict/<?php echo $row['profile_pict'];?>" class="mx-auto d-block card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['fullname'];?></h5>
                    <p>Username: <?php echo $row['username'] ?></p>
                    <p>Address: <?php echo $row['address'] ?></p>
                    <p>Phone: <?php echo $row['phone'] ?></p>
                    <p>Email: <?php echo $row['email'] ?></p>  
                </div>
                <div class="card-footer">                            
                    <div class="row">
                        <div class=col>
                            <a href="editAccount.php?user_id=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-success">Edit account</button></a>
                        </div>
                        <div class=col>
                            <a href="changePassword.php?user_id=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-success">Change password</button></a>
                        </div>
                        <div class=col>                                                
                            <button type="button" class="btn btn-danger" onclick="deleteConfirmation();">Delete account</button>
                        </div>
                    </div>                                                                
                </div>     
            </div>                    
            <script>
                function deleteConfirmation() {
                    var deleteConfirm = confirm("Are you sure to delete this account?");
                    if (deleteConfirm) {
                        window.location = "deleteAccountProcess.php?user_id=<?php echo $row['user_id'];?>";
                    } else {
                        window.location = "profile.php";
                    }
                }        
            </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>