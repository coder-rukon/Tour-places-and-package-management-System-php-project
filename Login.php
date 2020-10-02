<?php
$menu = "account";
	$page_title = "Login";
	ob_start();
	include("header.php");
	$headerOutput = ob_get_clean();
$error = false;
if(isset($_POST['login']))
{

    $email=$_POST['userid'];
    $pass=$_POST['password'];
    $user = new Users();
    if($user->CheckAuth($email,$pass)){
        $_SESSION['is_login'] = true;
        $user->SetUserToSession();
        header("location:My_account.php");
    }else{
        $error = 1;
        session_unset();
    }
}else{
	session_unset();
}
echo $headerOutput;
?>
	<section class="banner-w3layouts-bottom py-lg-5 py-3">
		<div class="container py-lg-4 py-3">
			<h3 class="tittle text-center">Tourist Guide User Login</h3>
			<div class="inner-sec-agileits-w3ls">
				<div class="login p-5 bg-light mx-auto mw-100">
					<?php if($error): ?>
						<p class="alert alert-danger">User Name and Password Not Found!</p>
					<?php endif; ?>
					<form action="" method="post"  style="max-width: 400px; margin:0 auto; border:1px solid #ccc; border-radius: 4px; padding:30px;">
						<div class="form-row" >
							<div class="col-xs-12 col-sm-12">
								<label for="validationCustom01">Email Address</label>
								<input name="userid" class="form-control" id="validationDefault01" placeholder="" required="" type="text">
								<br>
								<label for="validationCustom01">Password</label>
								<input name="password" class="form-control" id="validationDefault01" placeholder="" required="" type="password">	
							</div>
						</div>
						<br>
						<button type="submit" name="login" class="btn btn-primary submit mb-4">Login</button>
						<p>
							<a href="Register.php">Don't have account? Registe here</a>
						</p>	
								
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
?>