
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $_SESSION['name']; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="cpass.php?id=<?php echo $_SESSION['id']; ?>"><i class="icon-check"></i>Change Password</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->