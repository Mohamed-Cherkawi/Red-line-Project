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
<div class="d-flex gap-2 align-items-center justify-content-center">';

$state = false ;
if(file_exists(UPLOADFOLDER . "/adminsProfile/profile" . $_SESSION['user_id'] .".jpg")) {
  $image = URLROOT.'/uploads/adminsProfile/profile'.$_SESSION['user_id'] .".jpg";
 } else if(file_exists(UPLOADFOLDER . "/adminsProfile/profile" . $_SESSION['user_id'] .".jpeg")) {
  $image = URLROOT.'/uploads/adminsProfile/profile'.$_SESSION['user_id'] .".jpeg";
 } elseif(file_exists(UPLOADFOLDER . "/adminsProfile/profile" . $_SESSION['user_id'] .".png")) {
  $image = URLROOT.'/uploads/adminsProfile/profile'.$_SESSION['user_id'] .".png";
 } else {
   $image = 'https://img.icons8.com/fluency-systems-regular/96/undefined/user.png';
   $state = true ;
 }
   $classState = $state ?  'userImageC' : '';
  echo '<div class="'.$classState.' me-4">
    <img src="'.$image.'" alt="Admin Profile Img" width="70" height="70" style="border-radius:50%;">
  </div>
  <span>' . strtoupper($_SESSION['user_name']) .'</span>
</div>
</header>';