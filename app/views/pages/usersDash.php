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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/usersDash.css" />
</head>
<body id="body-pd">
<?php 
  require_once APPROOT."/views/inc/sidebar.php";
  require_once APPROOT."/views/inc/navbar.php"; ?>

  <section class="mt-5">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-end mt-5">
        <h1>Users Dashboard</h1>
        <div>
          <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3 me-3 my-3 my-sm-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add user
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
           <form action="<?php echo URLROOT; ?>/UsersDash/addUser" method="POST">     
          <div class="input-group">
            <input type="file" name="userImage" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Choose Image</label>
          </div>
          <div class="input-group my-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
          </div>
          
              </div>
              <div class="modal-footer">
                <button type="submit" name="addUser" class="btn btn-primary w-100">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-hover table-borderless overflow-scroll mt-5">
      <thead>
        <tr>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Sign-up Date</th>
        </tr>
      </thead>
      <tbody>
      <?php  foreach ($data as $value) :?>
        <tr class="trCss">
          <th >
            <img src="https://img.icons8.com/fluency-systems-regular/96/undefined/user.png" width="50" height="50"/>
            <span><?php echo $value-> user_name ;?></span>
          </th>
          <td><?php echo $value-> Email ;?></td>
          <td><?php echo $value-> Date_inscription ;?></td>
          <td>  
                                       <!-- Button trigger modal -->
          <button class="button"><img src="<?php echo URLROOT ?>/icons/editPenSvg.svg" alt="EditIcon"></button>

            <div class="modal-2">
              <div class="modal-content-2">
                <div class="modal-header-2">
                  <span class="close-2">&times;</span>
                  <h2>Modal Header</h2>
                </div>
                <div class="modal-body-2">
                <form action="<?php echo URLROOT; ?>/UsersDash/editUser" method="POST">     
                  <div class="input-group">
                    <input type="file" name="userImage" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Choose Image</label>
                  </div>
                  <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" name="username" value="<?php echo $value-> user_name ;?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" name="email" value="<?php echo $value-> Email ;?>" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="modal-footer-2">
                <button type="submit" name="addUser" class="btn btn-primary w-100">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </td>
          <td><img src="<?php echo URLROOT ?>/icons/trashSvg.svg" alt="TrashIcon"></td>
        </tr>
        <tr>
          <th></th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php endforeach ;?>
      </tbody>
    </table>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
  <script src="<?php echo URLROOT; ?>/js/usersDash.js"></script>
</body>
</html>