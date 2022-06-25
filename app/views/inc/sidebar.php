<?php

echo '  <div class="l-navbar" id="nav-bar">
<nav class="nav">
  <div> <a href="#" class="nav_logo"><span
        class="nav_logo-name">Dashboard Admin</span> </a>
    <div class="nav_list">
         <a href="'. URLROOT.'/pages/dashboard" class="nav_link active"> <i class=\'bx bx-grid-alt nav_icon\'></i> <span class="nav_name">Dashboard</span> </a> 
         <a href="'. URLROOT .'/pages/usersDash" class="nav_link"> <i class=\'bx bx-user nav_icon\'></i> <span class="nav_name">Users</span> </a>
         <a href="'. URLROOT .'/pages/trainersDash" class="nav_link"><i class=\'bx bxs-medal\' ></i> <span class="nav_name">Trainers</span></a> 
         <a href="'. URLROOT .'/pages/adminsDash" class="nav_link"><i class=\'bx bx-wrench\'></i><span class="nav_name">Admin</span> </a> 
         <a href="'. URLROOT .'/pages/athletesDash" class="nav_link"><i class=\'bx bx-run\'></i><span class="nav_name">Athletes</span> </a> 
         <a href="'. URLROOT .'/pages/productsDash" class="nav_link"><i class=\'bx bx-basket\' ></i><span class="nav_name">Products</span></a>
         <a href="'. URLROOT .'/ProfilesDash/showprofile" class="nav_link"><i class=\'bx bx-edit-alt\' ></i> <span class="nav_name"> Profile</span></a> 
    </div>
  </div> <a href="'. URLROOT .'/Users/logout" class="nav_link" onclick=" return confirm(\'Are you sure\');"> <i class=\'bx bx-log-out nav_icon\'></i> <span class="nav_name">Logout</span>
  </a>
</nav>
</div> ';