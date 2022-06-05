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

  <link rel="stylesheet" href="css/sidebarNav.css" />
  <style>
section h1 {
    margin-top: 6rem ;
    letter-spacing: 5px;
    font-weight: bolder;
}
.trCss{
    border: 1px solid gray;
    vertical-align: middle;
}
td > img {
    cursor: pointer;
}
  </style>
</head>
<body id="body-pd">
    <?php 
    require_once "inc/sidebar.php";
    require_once "inc/navbar.php"; ?>
  <section>
    <h1 class=" ms-5">Admins Dashboard</h1>
    <table class="table table-hover table-borderless overflow-scroll">
      <thead>
        <tr>
          <th scope="col">AdminName</th>
          <th scope="col">Sign-up Date</th>
        </tr>
      </thead>
      <tbody>
        <tr class="trCss">
          <th >
            <img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" width="50" height="50"/>
            <span>hamid</span>
          </th>
          <td>26/05/2022</td>
          <td><img src="icons/editPenSvg.svg" alt="EditIcon"></td>
          <td><img src="icons/trashSvg.svg" alt="TrashIcon"></td>
        </tr>
        <tr>
          <th></th>
        </tr>
        <tr class="trCss">
          <th >
            <img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" width="50" height="50"/>
            <span>hamid</span>
          </th>
          <td>26/05/2022</td>
          <td><img src="icons/editPenSvg.svg" alt="EditIcon"></td>
          <td><img src="icons/trashSvg.svg" alt="TrashIcon"></td>
        </tr>
      </tbody>
    </table>
  </section>
  <script src="js/dashboard.js"></script>
</body>
</html>