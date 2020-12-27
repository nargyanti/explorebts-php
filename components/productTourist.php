<?php
echo
'
<!-- product card -->

<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <img class="card-img-top" src="uploads/product_pict/<?php echo $row['product_pict'];?>" alt="">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['product_name'];?></h5>
            <h5>Rp <?php echo $row['unit_price'];?></h5>
        </div>
        <div class="card-footer">                            
            <a href="booking.html?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-primary">Booking!</button></a>
        </div>
    </div>
</div>
<!-- /.product card -->  
';
?>