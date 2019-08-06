<?php
      //session_start();
      include("import.php");
      include("Navigation.php");
      include("connection.php");
      include("signup.php");
      ?>
<form action="" method="POST">


<input type="submit" name="submit" value="Publish">
<?php

      //include("sidebar.php");
      if(isset($_SESSION['email1']))
     {
         //echo $_SESSION["email1"];
         $email_s=$_SESSION["email1"];
         echo $email_s;
        if(isset($_POST['submit']))
        {
            $query='select * FROM blog_user WHERE email=$email_s';
            $res=mysqli_query($conn,$query);
            //print_r($id_res);
            if(mysqli_num_rows($res)>0)
            {
                $row=mysqli_fetch_assoc($res);
                $userid=$row['id'];
                echo $userid;
            }
            else
            {
                echo "no record";
            }

        }
     }
?> 
</form>
<?php
include("footer.php");
?>