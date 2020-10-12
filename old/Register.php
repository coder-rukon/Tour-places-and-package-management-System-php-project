<?php
$menu = "account";
$page_title = "Register on Tourist Guide";

ob_start();
	include("header.php");
$headerHtml = ob_get_clean();
$isRegister = false;
$message = "";
if(isset($_REQUEST['create_user']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_con'];
    $name = $_POST['name'];
    $user = new Users();
    $isValide = true;
    if($passwordConfirm != $password){
    	$message = "Password and confirm password should be same!";
        $isValide = false;
    }
    if($user->CheckUserEmail($email)){
        $message = "Email Address Exist";
        $isValide = false;
    }
    if($isValide){
        $user->name = $name;
        $user->password = $password;
        $user->email = $email;
        $user->Create();
        $user->SetUserToSession();
        $_SESSION['is_login'] = true;
        $isRegister = true;
    }
    if($isRegister){
        header("location:My_account.php");
    }else{
        session_unset();
    }
}

echo $headerHtml;
?>
<section class="banner-w3layouts-bottom py-lg-5 py-3">
	<div class="container py-lg-4 py-3">
		<h3 class="tittle text-center">Register Now</h3>
			<div class="inner-sec-agileits-w3ls">
		<div class="login p-5 bg-light mx-auto mw-100">
			 <?php
                if(isset($_REQUEST['create_user'])){
                    echo '<p class="alert alert-info">'.$message.'</p>';
                }
            ?>
			<form action="" method="post">
					<div class="form-row">
							<div class="col-md-6 mb-3">
									<label>Full name</label>

								<input class="form-control" placeholder="" name="name" required="" type="text">
							</div>
							<div class="col-md-6 mb-3">
									<label>Email Address</label>
								<input class="form-control" name="email" placeholder="" required="" type="text">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
									<label for="exampleInputPassword1 mb-2">Password</label>
								<input class="form-control" name="password" placeholder="" required="" type="password">
							</div>
							<div class="form-group col-md-6">
									<label>Confirm Password</label>
									<input class="form-control" name="password_con" placeholder="" required="" type="password">
								</div>
							
						</div>
						<button name="create_user" type="submit" class="btn btn-primary submit mb-4">Register</button>
							<p>
								<a href="Login.php">Have an account? Login Here.</a>
							</p>
					</form>
	
				</div>
		</div>
	</div>
</section>
<?php
	include("footer.php");
?>