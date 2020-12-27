<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/styleLogin.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Home</title>
    </head>
    <body>
        <?php include "components/navbarUser.php"; ?>
        <form action="search.php" method="GET" class="form-inline justify-content-center pt-4">
            <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" name="keyword">
            <button class="btn btn-dark my-2 my-sm-0 search-button" type="submit">Search</button>
        </form>
        <div class="row">
            <?php
                include "connection.php";
                $query = "SELECT * FROM products WHERE product_stock > 0";
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                    <!-- product card -->

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="uploads/product_pict/<?php echo $row['product_pict'];?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['product_name'];?></h5>
                                <h5>Rp <?php echo $row['unit_price'];?></h5>
                            </div>
                            <div class="card-footer">                            
                                <a href="booking.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-primary">Booking!</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.product card -->                    
            <?php
                    }
                } else {
                    echo "0 result";
                }
            ?>
        </div>        
        <!-- /.row -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->
    </body>
</html>