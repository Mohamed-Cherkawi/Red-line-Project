<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebarNav.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dashboard.css" />
</head>
<body id="body-pd">

  <?php 
  require_once APPROOT."/views/inc/sidebar.php";
  require_once APPROOT."/views/inc/navbar.php"; ?>
  <!--Container Main start-->
  <section>
  <div class="container d-flex flex-column flex-lg-row justify-content-between flex-wrap  ">
    <div class="d-flex justify-content-between cardsC mt-5 mb-4 mt-lg-0 mb-lg-5">
      <div class="d-flex flex-column justify-content-between align-items-center">
        <h1>Users</h1>
        <span class="statics"><?php echo $data['totalUsers']; ?></span>
      </div>
      <div class="iconsC"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/92/FD7E14/external-user-web-flaticons-flat-flat-icons-2.png"/></div>
    </div>
    <div class= "d-flex justify-content-between cardsC mt-5 mb-4 mt-lg-0 mb-lg-5">
      <div class="d-flex flex-column justify-content-between align-items-center">
        <h1>Athletes</h1>
        <span class="statics"><?php echo $data['totalAthletes']; ?></span>
      </div>
      <div class="iconsC"><img src="https://img.icons8.com/color/96/000000/weightlifting-skin-type-3.png"/></div>
    </div>
    </div>
    <div class="container d-flex flex-column flex-lg-row justify-content-between flex-wrap  ">
    <div class=" d-flex justify-content-between cardsC mt-5   mb-4 mt-lg-0 mb-lg-5">
      <div class="d-flex flex-column justify-content-between align-items-center">
        <h1>Trainers</h1>
        <span class="statics"><?php echo $data['totalTrainers']; ?></span>
      </div>
      <div class="iconsC"><img src="https://img.icons8.com/cotton/92/FD7E14/olympic-medal-silver.png"/></div>
    </div>
    <div class=" d-flex justify-content-between cardsC mt-5  mb-4 mt-lg-0 mb-lg-5">
      <div class="d-flex flex-column justify-content-between align-items-center">
        <h1>Products</h1>
        <span class="statics"><?php echo $data['totalProducts']; ?></span>
      </div>
      <div class="iconsC"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/92/FD7E14/external-shopping-basket-e-commerce-flaticons-flat-flat-icons.png"/></div>
    </div>
  </div>
</section>
  <!--Container Main end-->

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
</body>
</html>