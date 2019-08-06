<?php
      session_start();
?>
<div class="row">
  <div class="col l2 m3 s12 ">
    <br>
    <img src="./Images/img1.jpg" alt="image" class="responsive-img" width="100" height="100"><br><br>
    <span>Welcome 
    <?php
      //echo $_SESSION["email1"];
    ?>
     
     </span>
    <span>Username</span><br>
    <span>Email Id</span><br><hr/>
    <ul>
      <li>
        <a href="">Dashboard</a><hr/>
      </li>
      <li>
        <a href="">Write a new article</a><hr/>
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