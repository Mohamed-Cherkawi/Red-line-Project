<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athletes Dashboard</title>
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
        <h1>Athletes Dashboard</h1>
        <div>
          <!-- Button trigger modal -->
        <button type="button" id="addButton" class="btn btn-primary mb-3 me-3 my-3 my-sm-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Athlete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please add an admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
           <form action="<?php echo URLROOT; ?>/AthletesDash/addAthlete" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label for="image" class="form-label">Choose Image (jpg , jpeg , png)</label>
             <input type="file" name="athleteImage" accept="image/png, image/jpg, image/jpeg" class="form-control" id="image" required>
           </div>     
          <div class="input-group my-3">
            <span class="input-group-text" id="basic-addon1">Athlete Name</span>
            <input type="text" name="athleteName" class="form-control" placeholder="athleteName" aria-label="athleteName" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Sport</span>
            <input type="text" name="athlete_sport" class="form-control" placeholder="athlete_sport" aria-label="athlete_sport" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group my-3">
              <span class="input-group-text" id="basic-addon1">Phone</span>
              <input type="number" name="athlete_phone" class="form-control" placeholder="athlete_phone" aria-label="athlete_phone" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group my-3">
              <span class="input-group-text" id="basic-addon1">CIN</span>
              <input type="text" name="athlete_CIN" class="form-control" placeholder="athlete_CIN" aria-label="athlete_CIN" aria-describedby="basic-addon1" required>
          </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="addAthlete" class="btn btn-primary w-100">Insert Admin</button>
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
          <th scope="col">Athlelte Image</th>
          <th scope="col">Athlelte Name</th>
          <th scope="col">Sport</th>
          <th scope="col">Phone</th>
          <th scope="col">CIN</th>
          <th scope="col">Join - Date</th>
        </tr>
      </thead>
      <tbody>
      <?php  
      $counter = 2;
      foreach ($data as $value) :
      ?>
        <tr class="trCss">
          <td>
          <?php 
              echo '<img src="'.URLROOT.'/uploads'.$value-> athlete_img	.'" width="100" height="100" alt="no photo found" style="border-radius:50%;">';      
            ?>            
          </td>
          <th><span class="ms-3"><?php echo $value-> athlete_name	 ;?></span></th>
          <td><?php echo $value-> athlete_sport	 ;?></td>
          <td><?php echo $value-> phone_number	 ; ?></td>
          <td><?php echo $value-> CIN ;?></td>
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
                  <form action="<?php echo URLROOT; ?>/AthletesDash/editAthlete" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="athleteImage" value="<?php echo $value-> athlete_img	 ;?>">
                    <input type="hidden" name="athlete_id" value="<?php echo $value-> athlete_id ;?>">     
                  <div class="input-group">
                    <input type="file" name="athleteImageNew" accept="image/png, image/jpg, image/jpeg" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Choose Image</label>
                  </div>
                  <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Athlete Name</span>
                    <input type="text" name="athleteName" value="<?php echo $value-> athlete_name ;?>" class="form-control" placeholder="athleteName" aria-label="athleteName" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Sport</span>
                    <input type="text" name="athlete_sport" value="<?php echo $value-> athlete_sport ;?>" class="form-control" placeholder="athlete_sport" aria-label="athlete_sport" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="number" name="athlete_phone" value="<?php echo $value-> phone_number ;?>" class="form-control" placeholder="athlete_phone" aria-label="athlete_phone" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="text" name="athlete_CIN" value="<?php echo $value-> CIN ;?>" class="form-control" placeholder="athlete_CIN" aria-label="athlete_CIN" aria-describedby="basic-addon1" required>
                  </div>
                </div>
                <div class="modal-footer-update">
                <button type="submit" name="editAthlete" class="btn btn-primary w-100">Update Admin</button>
                </div>
                </form>
                </div>

              </div>
          </td>
          <td><a href="<?php echo URLROOT ; ?>/AthletesDash/deleteAthlete/<?php echo $value -> athlete_id ?>?athleteimg=<?php echo $value-> athlete_img ?>" onclick="return confirm('Are you sure');"><img src="<?php echo URLROOT ?>/icons/trashSvg.svg" alt="TrashIcon"></a></td>
        </tr>
        <tr>
          <th></th>
          <td></td>
          <td></td>
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
  <script src="<?php echo URLROOT; ?>/js/modal.js"></script>
</body>
</html>