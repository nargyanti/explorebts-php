<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- <link href="css/styleLogin.css" rel="stylesheet" />         -->
        <title>Search</title>
    </head>
    <body>
        <?php
            include "connection.php";
            session_start();                
            
            $keyword = $_GET['keyword'];
            $user_id = $_SESSION['user_id'];            
                        
            if($_SESSION['role_id'] == 1) {
                $query = "SELECT * FROM products WHERE product_name LIKE '%$keyword%' AND vendor_id = $user_id";                
                include "components/navbarVendor.php";
                echo '<a href="createProduct.html"><button type="button" class="btn btn-primary">Create new product</button></a>';
            } else if($_SESSION['role_id'] == 2) {
                $query = "SELECT * FROM products WHERE product_name LIKE '%$keyword%'";
                include "components/navbarUser.php"; 
            } 

            $result = mysqli_query($connect, $query);
        ?>     
        <div class="container">   
            <!-- search bar          -->
            <form action="search.php" method="GET" class="form-inline justify-content-center pt-4">
                <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" name="keyword" value="<?php echo $keyword ?>">
                <button class="btn btn-dark my-2 my-sm-0 search-button" type="submit">Search</button>
            </form>
            <div class="row">
                <?php                    
                    if(mysqli_num_rows($result) > 0) {
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
                                        <div class="row">
                                            <?php
                                                if($_SESSION['role_id'] == 1) { ?>
                                                    <div class=col>
                                                        <a href="editProduct.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                                                    </div>
                                                    <div class=col>                                                
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct<?php echo $row['product_id'];?>">Delete</button>
                                                    </div>
                                                <?php
                                                } else if($_SESSION['role_id'] == 2) {?>
                                                    <a href="booking.html?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-primary">Booking!</button></a>
                                                    <?php
                                                }                                                 
                                            ?>                                                                                        
                                        </div>                                                                
                                    </div>                            
                                </div>
                            </div>
                            <!-- /.product card -->        
                            <!-- Modal -->
                            <div class="modal fade" id="deleteProduct<?php echo $row['product_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are u sure to delete <?php echo $row['product_name'];?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="deleteProductProcess.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
                                </div>
                                </div>
                            </div>
                            </div>                                        
                            <?php
                        }
                    } else {
                        echo "0 result";
                    }  
                ?>
                
            </div>        
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
</html>