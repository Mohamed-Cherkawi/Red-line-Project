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
  <link rel="stylesheet" href="css/sidebarNav.css" />
  <link rel="stylesheet" href="css/profile.css">
</head>
<body id="body-pd">

   <?php 
  require_once "inc/sidebar.php";
  require_once "inc/navbar.php"; ?>
  <!--Container Main start-->
<main>
  <section class="d-flex flex-column flex-xl-row justify-content-around align-items-center container mb-5">
    <div class=" d-flex flex-column align-items-center">
        <h3 id="greetingHead">Welcome Mohamed</h3>
        <div id="AdminImage">
            <img src="icons/userIco.png" alt="AdminImage" width="250" height="250"/>
        </div>
    </div>
    <div>
        <h3 class="text-center">Your Profile</h3>
        <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>Username</h4>
            <span>Mohamed</span>
        </div>
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>Sign-up Date</h4>
            <span>20-04-2022 08:30</span>
        </div>
        <div class="d-flex justify-content-between align-items-center ProfileInfosC">
            <h4>LastLogin</h4>
            <span>20-04-2022 08:30</span>
        </div>
        </div>
        <div class="mt-5 mb-5 mb-xl-0 d-flex flex-column flex-md-row align-items-center"><button class="profileButtons">Edit</button><button class="profileButtons mx-3 my-3 my-md-0">Logout</button><button id="deleteProfileButt" class="profileButtons">Delete</button></div>
    </div>
  </section>
</main>
  <!--Container Main end-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="js/dashboard.js"></script>
</body>
</html>