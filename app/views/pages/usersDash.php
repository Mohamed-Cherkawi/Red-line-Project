<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Dashboard</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebarNav.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/modal.css" />
</head>
<body id="body-pd">
<?php 
  require_once APPROOT."/views/inc/sidebar.php";
  require_once APPROOT."/views/inc/navbar.php"; ?>

  <section class="mt-5">

    <h1>Users Dashboard</h1>

    <table class="table table-hover table-borderless overflow-scroll mt-5">
      <thead>
        <tr>
          <th scope="col">UserImage</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Sign-up Date</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      foreach ($data as $value) :
      ?>
        <tr class="trCss">
          <td >
          <?php 
             if ($value -> imgNameUs != null) {
              echo '<img src="'.URLROOT.'/uploads'.$value-> imgNameUs.'" width="100" height="100" alt="Trainer Image" style="border-radius:50%;">';
          } else {
              // if we don't have any photo set
              echo "<img src='https://img.icons8.com/fluency-systems-regular/96/undefined/user.png' width='50' height='50' alt='defaultUserImg'>";
          }      
            ?>
          </td>
          <th><span><?php echo $value-> user_name ;?></span></th>
          <td><?php echo $value-> Email ;?></td>
          <td><?php echo $value-> Date_inscription ;?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php endforeach ;?>
      </tbody>
    </table>
  </section>
  <script>
    let dashboardLink = document.querySelector(".DASHBOARD");
    let athletesLink = document.querySelector(".USERSDASH");

    dashboardLink.classList.remove('active');
    athletesLink.classList.add('active');
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
</body>
</html>