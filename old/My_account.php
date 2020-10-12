<?php
$menu = "account";
$page_title = "Dashboard";
ob_start();
	include("header.php");
$headerHtml = ob_get_clean();
if(!isLogin()){
	header("location:Login.php");
	exit;
}
echo $headerHtml;	
$user = new Users($_SESSION['user']['id']);
$messages = [];
if(isset($_POST['update_profile'])){
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) ){
		$user->name = $_POST['name'];
		$user->email = $_POST['email'];
		$messages[] = ["Name and Email has been updated",'success'];
	}else{
		$messages[] = ["Name and Email is required",'danger'];
	}
	if(isset($_POST['password']) && !empty($_POST['password'])){
		$user->password = $_POST['password'];
		$messages[] = ["Password has been updated",'success'];
	}
	$user->Save();
}
?>
	<section class="banner-w3layouts-bottom py-lg-5 py-3">
		<div class="container py-lg-4 py-3">
			<div class="inner-sec-agileits-w3ls">
				<div class="row">
					<div class="col-xs-12 col-md-3">
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link"  href="My_account.php?page=account">My Account</a></li>
							<li class="nav-item"><a class="nav-link"  href="My_account.php?page=package">Tour/Packages</a></li>
							<li class="nav-item"><a class="nav-link active" href="Login.php">Logout</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-md-9">
						<?php
							if(isset($_GET['page']) && $_GET['page'] == "package"){
								include('my-account/package.php');
							}else{
								?>
								<form action="" method="post">
									<?php
										if(isset($messages) && !empty($messages)){
											foreach ($messages as $key => $value) {
												?>
												<p class="<?php echo  'alert alert-'.$value[1]; ?>"><?php echo $value[0]; ?></p>
												<?php
											}
										}
									?>
									<table class="table table-striped table-hover">
										<tbody>
											<tr>
												<td>Name *</td>
												<td><input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control"/></td>
											</tr>
											<tr>
												<td>Email *</td>
												<td><input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control"/></td>
											</tr>
											<tr>
												<td>Password</td>
												<td><input type="password" name="password" autocomplete="new-password" placeholder="************"  class="form-control"/></td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" class="btn btn-success" name="update_profile" value="Save"/>
												</td>
											</tr>
										</tbody>
										
									</table>
								</form>
								<?php
							}
						?>
						
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<?php
include("footer.php");
?>