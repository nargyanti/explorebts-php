<?php
echo '
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
                <div class=col>
                    <a href="editProduct.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
                </div>
                <div class=col>                                                
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct<?php echo $row['product_id'];?>">Delete</button>
                </div>
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
';
?>