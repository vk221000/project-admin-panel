
 <?php include 'header.php';?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Shopping</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Products</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="10">10</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
                <!-- start single product item -->
                    <?php
                    include 'admin/config.php';
                    $html='<ul class="aa-product-catg">';
                    if ((!isset($_SESSION['tag'])) && (!isset($_SESSION['cat'])) && (!isset($_SESSION['col']))) {
                      $sql="SELECT * FROM `products` LIMIT 10";
                    } else {
                      if (isset($_SESSION['tag']) && (isset($_SESSION['cat'])) && (isset($_SESSION['col']))) {
                        $category=$_SESSION['cat'][0];
                        $tag=$_SESSION['tag'][0];
                        $col=$_SESSION['col'][0];
                        $sql="SELECT * FROM `products` WHERE `category`='$category' AND `tags`='$tag' AND `color`='$col' LIMIT 10" ;

                      } elseif ((isset($_SESSION['cat'])) && (isset($_SESSION['tag']))) {
                        $category=$_SESSION['cat'][0];
                        $tag=$_SESSION['tag'][0];
                        $sql="SELECT * FROM `products` WHERE `category`='$category' AND `tags`='$tag' LIMIT 10";

                      } elseif ((isset($_SESSION['cat'])) && (isset($_SESSION['col']))) {
                        $category=$_SESSION['cat'][0];
                        $color=$_SESSION['col'][0];
                        $sql="SELECT * FROM `products` WHERE `category`='$category' AND `color`='$color' LIMIT 10";

                      } elseif ((isset($_SESSION['col'])) && (isset($_SESSION['tag']))) {
                        $color=$_SESSION['col'][0];
                        $tag=$_SESSION['tag'][0];
                        $sql="SELECT * FROM `products` WHERE `color`='$color' AND `tags`='$tag' LIMIT 10";

                      } elseif (isset($_SESSION['col'])) {
                        $color=$_SESSION['col'][0];
                        $sql="SELECT * FROM `products` WHERE `color`='$color' LIMIT 10";
                      }  elseif (isset($_SESSION['cat'])) {
                        $category=$_SESSION['cat'][0];
                        $sql="SELECT * FROM `products` WHERE `category`='$category' LIMIT 10";
                      } elseif (isset($_SESSION['tag'])) {
                        $tag=$_SESSION['tag'][0];
                        $sql="SELECT * FROM `products` WHERE `tags`='$tag' LIMIT 10" ;
                      } 
                      
                    }
                    $product=$conn->query($sql);
                    if ($product->num_rows>0) {
                      while ($row=$product->fetch_assoc()) {
                        $html.='<li>
                      <figure>
                        <a class="aa-product-img" href="product-detail.php?id='.$row["id"].'"><img src='.$row["image"].' alt="polo shirt img" width="100" height="100"></a>
                        <a class="aa-add-card-btn" href="cart.php?id='.$row["id"].'"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">'.$row["name"].'</a></h4>
                          <span class="aa-product-price">$'.$row["price"].'</span>
                          <p class="aa-product-description">'.$row["short_description"].'.'.$row["long_description"].'.</p>
                        </figcaption>
                      </figure>                         
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                    </li>'; 

                      }
                    }
                    $html.='</ul>';
                    echo $html;
                    ?>                               
              
              <!-- quick view modal -->  
              <?php                
              $html='<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.9</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="cart.php" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>';
              echo $html;
              ?>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <li><a href="displayproductbycategory.php?cat=all">All</a></li>
                <li><a href="displayproductbycategory.php?cat=Men">Men</a></li>
                <li><a href="displayproductbycategory.php?cat=Women">Women</a></li>
                <li><a href="displayproductbycategory.php?cat=Kids">Kids</a></li>
                <li><a href="displayproductbycategory.php?cat=Electronics">Electornics</a></li>
                <li><a href="displayproductbycategory.php?cat=Sports">Sports</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="displayproductbytag.php?tag=fashion">Fashion</a>
                <a href="displayproductbytag.php?tag=ecommerce">Ecommerce</a>
                <a href="displayproductbytag.php?tag=shop">Shop</a>
                <a href="displayproductbytag.php?tag=handbag">Hand Bag</a>
                <a href="displayproductbytag.php?tag=laptop">Laptop</a>
                <a href="displayproductbytag.php?tag=headphone">Head Phone</a>
                <a href="displayproductbytag.php?tag=pendrive">Pen Drive</a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="displayproductbycolor.php?col=green"></a>
                <a class="aa-color-yellow" href="displayproductbycolor.php?col=yellow"></a>
                <a class="aa-color-pink" href="displayproductbycolor.php?col=pink"></a>
                <a class="aa-color-purple" href="displayproductbycolor.php?col=purple"></a>
                <a class="aa-color-blue" href="displayproductbycolor.php?col=blue"></a>
                <a class="aa-color-orange" href="displayproductbycolor.php?col=orange"></a>
                <a class="aa-color-gray" href="displayproductbycolor.php?col=gray"></a>
                <a class="aa-color-black" href="displayproductbycolor.php?col=black"></a>
                <a class="aa-color-white" href="displayproductbycolor.php?col=white"></a>
                <a class="aa-color-cyan" href="displayproductbycolor.php?col=cyan"></a>
                <a class="aa-color-olive" href="displayproductbycolor.php?col=olive"></a>
                <a class="aa-color-orchid" href="displayproductbycolor.php?col=orchid"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  
  <?php include 'footer.php'; ?>