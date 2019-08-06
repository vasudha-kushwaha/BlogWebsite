<?php
ob_start();
session_start();
include("import.php");
include("Navigation.php");




?>
<form method="POST">
<div class="container" style="height:650px">
    <div class="row">
        <div class="col l3 m4 s12">
        </div>
        <div class="col l6 m4 s12">
            <h5>Admin Login</h5><hr>
                <table class="responsive-table">
                <tr><td>Enter Email</td><td><input type="text" name="admin_email" placeholder="enter email"></td></tr>
                <tr><td>Enter Password</td><td><input type="password" name="admin_pass" placeholder="enter password"></td></tr>
                <tr><td><input type="submit" value="admin&nbsp;login" name="adminlogin" class="btn green"></td><td></td></tr>
                </table>
        </div>
        <div class="col l3 m4 s12">
        </div>
    </div>
</div>
</form>
<?php
include("footer.php");
if(isset($_POST['adminlogin']))
{
	$admin_email=$_POST['admin_email'];
	$admin_pass=$_POST['password1'];
		
	$admin_email=mysqli_real_escape_string($conn,$admin_email);
	$admin_pass=mysqli_real_escape_string($conn,$admin_pass);
	
	$admin_email=htmlentities($admin_email);
	$admin_pass=htmlentities($admin_pass);

	$query1="select user_password from blog_user where email='$admin_email' ";
	$res=mysqli_query($conn,$query1);

	$row=mysqli_fetch_assoc($res);
	$spass=$row['user_password'];		
	//echo $spass;
	if($admin_pass==$spass)
	{
			$_SESSION["admin_email"]=$admin_email;
			//print_r($_SESSION);
			header("Location:admindashboard.php");
	}
	else
	{
		
		$_SESSION['message']="<div>Login Failed! Credentials do not match</div>";
		header("Location:index.php");

		//echo "Login Failed! Credentials do not match";
		//header("Location:stu_login.php");
		//$_SESSION['message']="Login Failed! Credentials do not match";
	}
}
?>
