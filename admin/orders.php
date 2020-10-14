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
					
					<h3>Orders</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Order</a></li> <!-- href must be unique and match the id of target div -->
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
								   <th>Cart Data</th>
								   <th>Total</th>
                                   <th>Status</th>
                                   <th>datetime</th>
								   <th>Action</th>
								</tr>
								
							</thead>';
							if (sizeof($_SESSION['admin'])==0) {
								header('Location:login.php');
							}
							include "config.php";
							$data="SELECT * FROM `orders`";
							$users=$conn->query($data);
							$value.='<tbody>';
							if ($users->num_rows >0) {
								while ($row=$users->fetch_assoc()) {
									$value.='<tr>
												<td>'.$row["userid"].'</td>
												<td>'.$row["cartdata"].'</td>
												<td>'.$row["total"].'</td>
                                                <td>'.$row["status"].'</td>
                                                <td>'.$row["datetime"].'</td>
												<td><a href="javascript:void(0)" data-id='.$row["userid"].' class="edit-product">edit</a> | <a href="deleteuser.php?deleteid='.$row["userid"].'" >delete</a> </td>	
											</tr>';
								}
								$value.='</tbody></table>';
							}
                            echo $value;
						
						?>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="addorders.php" method="POST">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							    <p>
									<label>User ID</label>
										<input class="text-input small-input" type="text" id="small-input" name="userid" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Cart Data</label>
										<input class="text-input small-input" type="text"  name="cartdata" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Total</label>
										<input class="text-input small-input" type="text"  name="total" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								
								<p>
									<label>Status</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="status" /> 
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