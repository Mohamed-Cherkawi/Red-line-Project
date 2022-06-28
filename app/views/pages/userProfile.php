<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css"/> 
</head>
<body id="body-pd">

   <?php 
  require_once APPROOT."/views/inc/header.php";
  ?>
<main>
  
  <section class="d-flex flex-column flex-xl-row justify-content-around align-items-center container mb-5 position-relative">
    <div class=" d-flex flex-column align-items-center">
        <h3 id="greetingHead">Welcome <?php  echo strtoupper($_SESSION['user_name']); ?></h3>
        <div id="AdminImage">
          <?php
          if($data2 -> imgNameUs != null) {
           echo '<img class="AdminProfileImg" src="'.URLROOT.'/uploads'. $data2 -> imgNameUs .'" alt="User Profile Image" width="400" height="400">';
          } else {
            echo '<img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" alt="UserImage" width="250" height="250"/>';
          }
            ?>
        </div>
    </div>
    <div>
        <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>AdminName</h4>
            <span><?php echo strtoupper($_SESSION['user_name']); ?></span>
        </div>
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>Sign-up Date</h4>
            <span><?php echo $_SESSION['inscription_date']; ?></span>
        </div>
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>Admin Email</h4>
            <span><?php echo $_SESSION['user_email']; ?></span>
        </div>
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>LastLogin</h4>
            <span><?php echo $_SESSION['login_date']; ?></span>
        </div>
        </div>
        <div class="mt-5 mb-5 mb-xl-0 d-flex flex-column flex-md-row align-items-center">
                    <!-- Button trigger modal -->
          <button type="button" class="profileButtons" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo URLROOT ; ?>/UsersDash/editProfile" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="mb-3">
                  <div><input type="hidden" name="profile_image" value="<?php echo $data2 -> imgNameUs ; ?>"></div>
                    <label for="image" class="form-label">Choose Image (jpg , jpeg , png)</label>
                    <input type="file" accept="image/png, image/jpg, image/jpeg" name="admin_image" class="form-control" id="image">
                    <div class="input-group my-3">
                    <label for="adminName" class="input-group-text">Admin Name</label>
                    <input type="text" name="userName" value="<?php echo $data2-> user_name ;?>" class="form-control"  aria-label="UserName" id="UserName" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group my-3">
                    <label for="email" class="input-group-text">Email</label>
                    <input type="email" name="userEmail" value="<?php echo $data2-> Email ;?>" class="form-control"  aria-label="email" aria-describedby="basic-addon1" id="email" required>
                  </div>
                  <div class="input-group my-3">
                    <label for="adminName" class="input-group-text">Change Password</label>
                    <input type="text" name="userPassword" value="<?php echo $data2-> Password ;?>" class="form-control"  aria-label="adminName" id="adminName" aria-describedby="basic-addon1" required>
                  </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="editUserProfile" class="profileButtons w-100">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <a href="<?php echo  URLROOT; ?>/Users/logout" onclick="return confirm('Log out ?')"><button class="profileButtons mx-3 my-3 my-md-0">Logout</button></a>
          <button id="deleteProfileButt" class="profileButtons">Delete</button>
        </div>
    </div>
  </section>
</main>
<?php
require_once APPROOT."/views/inc/footer.php"; 
?>
  <script>
    // Toggling the search bar icon js Code .
    const icon = document.querySelector(".searchIcon");
    const search = document.querySelector(".search");

    icon.onclick = function () {
  search.classList.toggle("active");
};
  </script>
</body>
</html>