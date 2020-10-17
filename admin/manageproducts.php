<?php
session_start();
// if (sizeof($_SESSION)==0) {
//     header('Location:login.php');
// }
$_SESSION['admin']=array('vivek');
?>
<?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2><?php echo "Hello ".$_SESSION['admin'][0]; ?></h2>
			<p id="page-intro">What would you like to do?</p>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Products</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Products</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					<?php
					$value='<table>
							<thead>
								<tr>
								   <th>ID</th>
								   <th>Name</th>
								   <th>price</th>
								   <th>ShortDescription</th>
								   <th>Long Description</th>
								   <th>Category</th>
								   <th>Category ID</th>
								   <th>Tags</th>
								   <th>Color</th>
								   <th>Action</th>
								</tr>
								
							</thead>';
							if (sizeof($_SESSION['admin'])==0) {
								header('Location:login.php');
							}
							include "config.php";
							$data="SELECT * FROM `products`";
							$products=$conn->query($data);
							$value.='<tbody>';
							if ($products->num_rows >0) {
								while ($row=$products->fetch_assoc()) {
									$value.='<tr>
												<td>'.$row["id"].'</td>
												<td>'.$row["name"].'</td>
												<td>'.$row["price"].'</td>
												<td>'.$row["short_description"].'</td>
												<td>'.$row["long_description"].'</td>
												<td>'.$row["category"].'</td>
												<td>'.$row["category_id"].'</td>
												<td>'.$row["tags"].'</td>
												<td>'.$row["color"].'</td>
												<td><a href="deleteproduct.php?deleteid='.$row["id"].'" >delete</a> </td>	
											</tr>';
								}
								$value.='</tbody></table>';
							}
                            echo $value;
						
						?>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="addproducts.php" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							    <p>
									<label>Category ID</label>
										<input class="text-input small-input" type="text" id="small-input" name="categoryid" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Product Name</label>
										<input class="text-input small-input" type="text"  name="productname" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Price</label>
										<input class="text-input small-input" type="text"  name="price" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								
								<p>
									<label>Short Description</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="shortdescription" /> 
								</p>
								
								<p>
									<label>Long Description</label>
									<input class="text-input large-input" type="text" id="large-input" name="longdescription" />
								</p>
								<p>
									<label>Image</label>
									<input type='file' name='image'>
								</p>


								<p>
								<label>Category</label>
								<select name="dropdown" class="small-input">
								<option value="Men">Men</option>
								<option value="Women">Women</option>
								<option value="Kids">Kids</option>
								<option value="Electronics">Electronics</option>
								<option value="Sports">Sports</option>
								</select>
								</p>
								<p>
								<label>Color</label>
								<select name="dropdown1" class="small-input">
								<option value="green">Green</option>
								<option value="yellow">Yellow</option>
								<option value="pink">Pink</option>
								<option value="purple">Purple</option>
								<option value="blue">Blue</option>
								<option value="orange">Orange</option>
								<option value="gray">Gray</option>
								<option value="black">Black</option>
								<option value="cyan">Cyan</option>
								<option value="olive">Olive</option>
								<option value="orchid">Orchid</option>
								</select>
								</p>

								<p>
								<label>Tags</label>
								<input type="checkbox" name="fashion" value="fashion" /> Fashion
								<input type="checkbox" name="ecommerce" value="ecommerce"/> Ecommerce
								<input type="checkbox" name="shop" value="shop"/> Shop
								<input type="checkbox" name="handbag" value="handbag"/> Hand Bag
								<input type="checkbox" name="laptop" value="laptop"/> Laptop
								<input type="checkbox" name="headphone" value="headphone"/> Headphone
								</p>

							
								<p>
									<input class="button" type="submit" value="Submit" name='submit'/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<?php include 'footer.php'; ?>
