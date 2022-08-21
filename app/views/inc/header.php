<?php
echo '
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand w-25" href="'. URLROOT .'/pages/index"
          ><img src="'. URLROOT .'/img/logo.png" class="ms-4" alt="logo" width="150"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fw-bolder" href="'. URLROOT .'/pages/index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'. URLROOT .'/pages/schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Trainers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'. URLROOT .'/pages/products/All">Store</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="'. URLROOT .'/pages/aboutUs">About</a>
          </li>
          </ul>
          <form class="d-flex flex-column align-items-center flex-lg-row">
            <div
              class="search d-flex justify-content-center align-items-center"
            >
             <img class="searchIcon" src="'.URLROOT.'/icons/searchNav.png" alt="Search Icon">
              <div class="input d-flex align-items-center">
                <input type="text" placeholder="Search .." id="mysearch" />
              </div>
            </div>
            <div class="separator" class="ms-2 me-2"></div>
            <br class="d-block d-lg-none" />
            <div class="separator" class="ms-2 me-2"></div>
            <div class="dropdown me-5 ms-2">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">';
                if((isset($_SESSION['user_img'])) || (isset($_SESSION['admin_img']))) {
                  $logout = true ;
                if($_SESSION['user_img'] != null) {
                  echo '<img class="AdminProfileImg" src="'.URLROOT.'/uploads'. $_SESSION['user_img'] .'" alt="User Profile Image" width="40" height="45" style="border-radius:50%;">';
                } else {
                  echo '<img class="AdminProfileImg" src="'.URLROOT.'/uploads'. $_SESSION['admin_img'] .'" alt="User Profile Image" width="40" height="45" style="border-radius:50%;">';
                }
              } else {
                  $logout = false ;
                  echo '<img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" alt="UserImage" width="45" height="45"/>';
                }
               echo '
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="'.URLROOT.'/UsersDash/userProfile">Profile</a></li>
                  <li><a class="dropdown-item" href="'.URLROOT.'/pages/basket">My Cart</a></li>';
                  if($logout == true) {
                    echo '<li><a class="dropdown-item" href="'.URLROOT.'/users/logout" onclick="return confirm(\'Are you sure\')">Log out</a></li>';
                  }
                  echo '
                </ul>
              </div>
          </form>
        </div>
      </div>
    </nav>
  </header>';