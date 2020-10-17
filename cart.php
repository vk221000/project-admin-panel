
<?php include "header.php"; ?>
<?php
if (!isset($_SESSION['cart'])) {
 $_SESSION['cart']=array(); 
}
if (isset($_GET["id"])) {
  include 'admin/config.php';
  $id=$_GET["id"];
  $sql="SELECT * FROM `products` WHERE `id`='$id'";
  $product=$conn->query($sql);
  if ($product->num_rows>0) {
    while ($row=$product->fetch_assoc()) {
      $p=array(
        "id"=>$row['id'],
        "name"=>$row['name'],
        "price"=>$row['price'],
        "image"=>$row['image'],
        "quantity"=>1
      );
      $flag=true;
      foreach ($_SESSION['cart'] as $key=>$val) {
        if ($val["id"]==$id) {
          $_SESSION['cart'][$key]['quantity']+=1;
          $flag=false;
          break;
        }
      }
      if ($flag) {
        array_push($_SESSION['cart'], $p);
      }
      
    }
  }

}
?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $html="";
                    $total=0;
                    foreach ($_SESSION['cart'] as $key=>$val) {
                      $total+=$val["quantity"]*$val["price"];
                      $html.='<tr>
                        <td><a class="remove" href="deletecart.php?deleteid='.$val["id"].'"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src='.$val["image"].' alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">'.$val["name"].'</a></td>
                        <td>$'.$val["price"].'.00</td>
                        <td><input class="aa-cart-quantity" type="number" value="'.$val["quantity"].'"></td>
                        <td>$'.$val["quantity"]*$val["price"].'.00</td>
                      </tr>';
                    }
                      echo $html;
                      
                      $html1='<tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$'.$total.'.00</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$'.$total.'.00</td>
                   </tr>
                 </tbody>
               </table>';
               echo $html1;
               ?>
               <a href="addorders.php?checkout=1" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <?php include "footer.php";?>