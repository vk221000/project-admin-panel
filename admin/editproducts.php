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
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Update Product</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">update</a></li> <!-- href must be unique and match the id of target div -->
						
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                    <form action="addorders.php" method="POST">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							    <p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="name" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Price</label>
										<input class="text-input small-input" type="text"  name="price" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Short Description</label>
										<input class="text-input small-input" type="text"  name="shortdescription" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								
								<p>
									<label>Long Description</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="longdescription" /> 
								</p>
                                <p>
									<label>Category ID</label>
										<input class="text-input small-input" type="text"  name="categoryid" /> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<input class="button" type="submit" value="Submit" name='submit'/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab1 -->     
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<?php include 'footer.php'; ?>
