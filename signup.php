<?php
ob_start();
session_start();
include "connection.php";
/* ******************For sign up******************** */
if(isset($_POST['signup']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $date=date("Y/m/d");
	
	$name=mysqli_real_escape_string($conn,$name);
	$email=mysqli_real_escape_string($conn,$email);
	$gender=mysqli_real_escape_string($conn,$gender);
	$password=mysqli_real_escape_string($conn,$password);
	$cpassword=mysqli_real_escape_string($conn,$cpassword);
	
	
	$name=htmlentities($name);
	$email=htmlentities($email);
	$gender=htmlentities($gender);
	$password=htmlentities($password);
	$cpassword=htmlentities($cpassword);
	
	$query="select * from blog_user where email='$email'";
	$res1=mysqli_query($conn,$query);
	if(mysqli_num_rows($res1)>0)
	{
        
        //header("location:index.php");	
        echo '<script type="text/javascript">alert("Email id already registered, Login to continue");</script>';   
	}
	else
	{	
		if($password==$cpassword)
		{
            //$password=password_hash($password, PASSWORD_BCRYPT);
			$sql="insert into blog_user (username,email,gender,reg_date,user_password) values ('$name','$email','$gender','$date','$password')";
			$res=mysqli_query($conn,$sql);
			if($res)
			{
                echo '<script type="text/javascript">alert("You have successfully registered, Login to continue");</script>';
                //header("location:index.php");
			}	
			else
			{
                echo '<script type="text/javascript">alert("Something went wrong");</script>';
                //header("location:index.php");
			}
		}
		else
		{
            echo '<script type="text/javascript">alert("Password and confirm password not matched");</script>';
            //header("location:index.php");
		}
	}
}
/* ******************For Login******************** */
if(isset($_POST['login']))
{
	$email1=$_POST['email1'];
	$password1=$_POST['password1'];
		
	$email1=mysqli_real_escape_string($conn,$email1);
	$password1=mysqli_real_escape_string($conn,$password1);
	
	$email1=htmlentities($email1);
	$password1=htmlentities($password1);

	$query1="select user_password from blog_user where email='$email1' ";
	$res=mysqli_query($conn,$query1);

	$row=mysqli_fetch_assoc($res);
	$spass=$row['user_password'];		
	//echo $spass;
	if($password1==$spass)
	{
			$_SESSION["email1"]=$email1;
			//print_r($_SESSION);
			header("Location:dashboard.php");
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
/* ******************For Forgot Password******************** */
?>