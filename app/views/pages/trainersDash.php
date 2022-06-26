<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers Dashboard</title>
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
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-end mt-5">
        <h1>Trainers Dashboard</h1>
        <div>
          <!-- Button trigger modal -->
        <button type="button" id="addButton" class="btn btn-primary mb-3 me-3 my-3 my-sm-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert Trainer</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
           <form action="<?php echo URLROOT; ?>/TrainersDash/addTrainer" method="POST" enctype="multipart/form-data">  
           <div class="input-group">
                <input type="file" name="trainerImg" accept="image/png, image/jpg, image/jpeg" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
            </div>   
          <div class="input-group my-3">
            <span class="input-group-text" id="basic-addon1">Trainer</span>
            <input type="text" name="trainername" class="form-control" placeholder="Trainer Name" aria-label="trainerName" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Sport</span>
            <input type="text" name="sport" class="form-control" placeholder="Sport" aria-label="Sport" aria-describedby="basic-addon1" required>
          </div>
          
              </div>
              <div class="modal-footer">
                <button type="submit" name="addTrainer" class="btn btn-primary w-100">Save</button>
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
          <th scope="col">Trainer Name</th>
          <th scope="col">Sport</th>
          <th scope="col">Join Date</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      $counter = 2;
      foreach ($data as $value) :
      ?>
        <tr class="trCss">
          <th>
            <?php 
             if ($value-> imgFullName != null) {
              echo '<img src="'.URLROOT.'/uploads'.$value-> imgFullName.'" width="100" height="100" alt="Trainer Image" style="border-radius:50%;">';
          } else {
              // if we don't have any photo set
              echo "<img src='https://img.icons8.com/fluency-systems-regular/96/undefined/user.png' width='50' height='50' alt='defaultUserImg'>";
          }      
            ?>
            <span class="ms-2"><?php echo $value-> trainer_name ;?></span>
          </th>
          <td><?php echo $value-> Sport ;?></td>
          <td><?php echo $value-> Join_Date ;?></td>
          <td>  
                          <!-- Trigger/Open The Modal -->
              <button class="modal-button" href="#myModal-<?php echo $counter; ?>"><img src="<?php echo URLROOT ?>/icons/editPenSvg.svg" alt="EditIcon"></button>

              <!-- The Modal -->
              <div id="myModal-<?php echo $counter++ ; ?>" class="modal-update">

                <!-- Modal content -->
                <div class="modal-content-update">
                  <div class="modal-header-update d-flex justify-content-between align-items-center">
                  <h5>Modal Header</h5>
                  <span class="close-update">×</span>
                  </div>
                  <div class="modal-body-update">
                  <form action="<?php echo URLROOT; ?>/TrainersDash/editTrainer" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="trainerImg" value="<?php echo $value-> imgFullName ;?>">
                    <input type="hidden" name="trainer_id" value="<?php echo $value-> trainer_id ;?>">
                    <div class="input-group">
                      <input type="file" name="trainerImage" accept="image/png, image/jpg, image/jpeg" class="form-control" id="inputGroupFile02">
                      <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
                    </div>
                  <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Trainer</span>
                    <input type="text" name="trainerName"  value="<?php echo $value-> trainer_name ;?>" class="form-control" placeholder="Trainer Name" aria-label="Trainer Name" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Sport</span>
                    <input type="text" name="sport" value="<?php echo $value-> Sport ;?>" class="form-control" placeholder="Sport" aria-label="Sport" aria-describedby="basic-addon1" required>
                  </div>
                </div>
                <div class="modal-footer-update">
                <button type="submit" name="editTrainer" class="btn btn-primary w-100">Update Trainer</button>
                </div>
                </form>
                </div>
              </div>
          </td> 
          <td><a href="<?php echo URLROOT ; ?>/TrainersDash/deleteTrainer/<?php echo $value-> trainer_id ?>?trainerImg=<?php echo $value-> imgFullName ?>" onclick="return confirm('Are you sure');"><img src="<?php echo URLROOT ?>/icons/trashSvg.svg" alt="TrashIcon"></a></td>
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
  <script>
    let dashboardLink = document.querySelector(".DASHBOARD");
    let athletesLink = document.querySelector(".TRAINERSDASH");

    dashboardLink.classList.remove('active');
    athletesLink.classList.add('active');
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
  <script src="<?php echo URLROOT; ?>/js/modal.js"></script>
</body>
</html>