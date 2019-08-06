<?php
    session_start();
    include("import.php");
    include("Navigation.php");
    include("connection.php");
    //include("sidebar.php"); 
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
 




<?php
  if(isset($_GET['post_id']))
  {
    $id=$_GET['post_id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);
    //echo $id;
    $sql="select * from post where post_id=$id";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
      $row=mysqli_fetch_assoc($res);
      $name=$row['photo'];
      $name="Images/".$name."";
?>
    <div class="col l2 m4 s6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="<?php echo $name; ?>" alt="">
        </div>
      </div>
        <h3> <?php echo $row['title']?> </h3><br>
       <?php echo $row['content']?> 
       
    </div>
    
<?php
    }
  }
?>

</div>

<?php
include("footer.php");
?>
