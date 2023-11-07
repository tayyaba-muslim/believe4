<?php
include('includes/navbar.php');
include('includes/config.php');


session_start();
if(!isset($_SESSION['useremail'])){
	header("location: login.php");
}

$current_user_id = $_SESSION['userid'];
$cart_data = "SELECT * from cart AS c INNER JOIN `admin_signup` AS user ON c.userid = user.id INNER JOIN products AS P ON p.id = c.proid WHERE c.userid = '$current_user_id'";
$result = mysqli_query($connection, $cart_data);
if(mysqli_num_rows($result) > 0){






?>


    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Cart</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)){

								?>
						      <tr class="text-center">
						        <td class="product-remove"><a id="closebtn"><span class="icon-close"></span></a></td>
						        <input type="hidden" id="cartid" value="<?php echo$row['cartid'] ?>">
						        <td class="image-prod"><div class="img" style="background-image:url(<?php
								echo 'images/' . $row['image']?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php
								echo $row['title']?></h3>
						        	<p><?php
								echo $row['description']?></p>
						        </td>
						        
						        <td class="price"><?php
								echo $row['price']?></td>
						        
						        <td>
								<?php
								echo '<select class="form-control input-number" name="qty" id="qty">';

								for($i = 0; $i<=10; $i++){
								echo '<option class="form-control input-number value="'.$i.'">'.$i.'</option>';

								}
								?>
					            </td>
						        
						        <td class="total">$4.90</td>
						      </tr><!-- END TR-->
							  <?php
							 	}
							}
							 
							  ?>
							  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

							  <script>
								$(document).ready(function(){
								let closebtn = $('#closebtn');
								let cartid = $('#cartid').val();
								closebtn.click(function(){
									$.ajax({
										url : 'deletecart.php',
										type : 'POST',
										data : {cartid : cartid},
										success :function(data){
											if(data == 1){
												alert('data deleted');
												
											}else{
												alert('not deleted');
												
											}
										}
									})
								})

								})
							  </script>

						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

   
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>




    
<?php
include('includes/footer.php');
?>