<?php
echo '  <header class="header d-flex" id="header">
<div class="header_toggle"> <i class=\'bx bx-menu\' id="header-toggle"></i> </div>
<form action="" class="my-4 my-sm-0 d-none d-sm-block">
  <div class="input-group border-0">
    <input type="text" class="form-control bg-white" placeholder="Search" aria-label="Username"
      aria-describedby="basic-addon1">
    <span class="input-group-text btn-yellow" id="basic-addon1"><img src="'. URLROOT .'/icons/search.png" alt="Search icon" width="30" height="30"></span>
  </div>
</form>
<div class="d-flex gap-2 align-items-center justify-content-center">
  <div class="userImageC me-4">
    <img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" width="40" height="40"/>
  </div>
  <span>' . $_SESSION['user_name'] .'</span>
</div>
</header>';