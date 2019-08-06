<?php
    ob_start();
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
      echo $_SESSION["admin_email"];
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
$sql="select * from post";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
?>
    <div class="col l2 m4 s6">
      <form action="">
        <div class="card">
            <div class="card-image">
                <?php
                    $blogId=$row['post_id'];
                    $name=$row['photo'];
                    //echo $row['photo'];
                    $name="Images/".$name."";
                    //echo $name;
                ?>
                <img src= <?php echo $name; ?> alt=""> 
                <span class="card-title">
                <?php
                    echo $row['title'];
                ?>
                </span>
            </div>
            <div class="card-content">
                <?php
                    $content=$row['content'];
                    echo implode(' ',array_slice(explode(' ',$content),0,10))."\n";
                    //echo $row['content'];
                ?>
            </div>
            <div class="card-action">
            <a href="">Read More...</a><hr>
            <input type="button" value="Approve" name="Approve" class="btn green">
            <hr>
            <input type="button" value="Reject" name="Reject" class="btn green">
                   
            </div>
        </div> 
      </form>
    </div>
    
<?php
}
}
?>

</div>

<?php
include("footer.php");
?>
