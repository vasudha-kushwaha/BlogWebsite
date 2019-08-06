
    <?php
      //session_start();
      include("import.php");
      include("Navigation.php");
      include("connection.php");
      include("signup.php");
      //include("sidebar.php");
      if(isset($_SESSION['email1']))
     {
    ?> 
    
<div class="row">
  <div class="col l2 m3 s12 ">
    <br>
    <img src="./Images/img1.jpg" alt="image" class="responsive-img" width="100" height="100"><br><br>
    <span>Welcome  </span>
    <span>
    <?php
      echo $_SESSION["email1"];
      
     
    ?>
    </span><br>
    <span>Email Id</span><br><hr/>
    <ul>
      <li>
        <a href="dashboard.php">Dashboard</a><hr/>
      </li>
      <li>
        <a href="home.php">Write a new article</a><hr/>
      </li>
      <li>
        <a href="">Settings</a><hr/>
      </li>
      <li>
        <a href="">Approved Articles</a><hr/>
      </li>
      <li>
        <a href="">Pending Article</a><hr/>
      </li>
    </ul>
  </div>

  <div class="col l10 m9 s12">
    <form action="home.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Enter Title">
      <textarea name="ckeditor" id="ckeditor" class="materialize-textarea ckeditor"></textarea>
      <br>
        <input type="file" name="image">
      <br><br>
      <input type="submit" name="submit" value="Publish">
    </form>
    <?php
      if(isset($_POST['submit']))
      {
        //$user_email=$_SESSION["email1"];
        //$user_id;
        $get_id="select id from blog_user where email=".$_SESSION["email1"];
        $id_res=mysqli_query($conn,$get_id);
        $id_row=mysqli_fetch_assoc($id_res);
        print_r($id_row);
        echo $id_row['id'];
        $user_id=$id_row['id'];
        //******************************************************** */  
        $title=$_POST['title'];
        $content=$_POST['ckeditor'];
        $status='pending';
        $date=date("Y/m/d");
        
        $image=$_FILES['image'];
        $img_name='Artical_'.$image['name'];
        $img_size=$image['size'];
        $img_type=$image['type'];
        move_uploaded_file($image['tmp_name'],"Images/".$img_name);

      	$title=mysqli_real_escape_string($conn,$title);
        $content=mysqli_real_escape_string($conn,$content);
      
        $title=htmlentities($title);
        $content=htmlentities($content);

        $query="insert into post (id, title, content, photo, status, post_date) values ($user_id,' $title','$content', '$img_name','$status','$date')";
        $res=mysqli_query($conn,$query);

        if($res)
			  {
          echo '<script type="text/javascript">alert("Your post is saved.. Pending for approval");</script>';
		  	}	
			  else
			  {
          echo '<script type="text/javascript">alert("Your post is not saved.. Something went wrong");</script>';
			  }
      }
    ?>
  </div>
</div>
<script type="text/javascript" src="./Materialize/js/ckeditor/ckeditor.js"></script>  
<?php
    }
    else
    {
        $_SESSION["message"]="<div>Login to continue..</div>";
       header("Location:index.php");
    }
    include("footer.php");
?>

