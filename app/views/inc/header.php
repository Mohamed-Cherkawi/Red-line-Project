<?php
echo '
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand w-25" href="'. URLROOT .'/pages/index/main"
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
              <a class="nav-link active fw-bolder" href="'. URLROOT .'/pages/index/main">Home</a>
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
              <svg
                class="searchIcon"
                xmlns="http://www.w3.org/2000/svg"
                x="0px"
                y="0px"
                width="50"
                height="50"
                viewBox="0 0 172 172"
                style="fill: #000000"
              >
                <g
                  fill="none"
                  fill-rule="nonzero"
                  stroke="none"
                  stroke-width="1"
                  stroke-linecap="butt"
                  stroke-linejoin="miter"
                  stroke-miterlimit="10"
                  stroke-dasharray=""
                  stroke-dashoffset="0"
                  font-family="none"
                  font-weight="none"
                  font-size="none"
                  text-anchor="none"
                  style="mix-blend-mode: normal"
                >
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#ff7800">
                    <path
                      d="M72.24,10.32c-32.26344,0 -58.48,26.21656 -58.48,58.48c0,32.26344 26.21656,58.48 58.48,58.48c12.76563,0 24.56375,-4.11187 34.185,-11.0725l45.2575,45.15l9.675,-9.675l-44.72,-44.8275c8.78813,-10.23937 14.0825,-23.52906 14.0825,-38.055c0,-32.26344 -26.21656,-58.48 -58.48,-58.48zM72.24,17.2c28.54125,0 51.6,23.05875 51.6,51.6c0,28.54125 -23.05875,51.6 -51.6,51.6c-28.54125,0 -51.6,-23.05875 -51.6,-51.6c0,-28.54125 23.05875,-51.6 51.6,-51.6z"
                    ></path>
                  </g>
                </g>
              </svg>
              <div class="input d-flex align-items-center">
                <input type="text" placeholder="Search .." id="mysearch" />
              </div>
            </div>
            <div class="separator" class="ms-2 me-2"></div>
            <br class="d-block d-lg-none" />
            <div class="separator" class="ms-2 me-2"></div>
            <div class="dropdown me-5 ms-2">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">';
                if(isset($_SESSION['user_img'])) {
                  $logout = true ;
                if($_SESSION['user_img'] != null) {
                  echo '<img class="AdminProfileImg" src="'.URLROOT.'/uploads'. $_SESSION['user_img'] .'" alt="User Profile Image" width="60" height="65" style="border-radius:50%;">';
                } else {
                  echo '<img class="AdminProfileImg" src="'.URLROOT.'/uploads'. $_SESSION['admin_img'] .'" alt="User Profile Image" width="60" height="65" style="border-r adius:50%;">';
                }
              } else {
                  $logout = false ;
                  echo '<img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" alt="UserImage" width="65" height="65"/>';
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