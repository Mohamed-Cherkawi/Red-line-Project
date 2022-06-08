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
  require_once APPROOT."/views/inc/sidebar.php";
  require_once APPROOT."/views/inc/navbar.php"; ?>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <section>
    <h1 class=" ms-5">Users Dashboard</h1>
    <table class="table table-hover table-borderless overflow-scroll">
      <thead>
        <tr>
          <th scope="col">Username</th>
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
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
</body>
</html>