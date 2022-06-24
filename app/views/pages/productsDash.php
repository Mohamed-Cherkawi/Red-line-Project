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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sidebarNav.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/products.css" />
</head>
<body id="body-pd">
<?php 
  require_once APPROOT."/views/inc/sidebar.php";
  require_once APPROOT."/views/inc/navbar.php"; 
  ?>
  <main>
  <section>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center ps-4 pe-4">
        <h1>Products Dashboard</h1>
                              <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary align-self-end my-4 my-md-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo URLROOT ;?>/ProductsDash/addProduct" method="POST" enctype="multipart/form-data">
                <div class="modal-body d-flex">
                  <div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Choose Image (jpg , jpeg , png)</label>
                    <input type="file" name="product_image" class="form-control" id="image" required>
                  </div>
                  <div class="mb-3">
                    <label for="productName" class="form-label">Product Name <span class="requiredFiels ms-3">Required *</span></label>
                    <input type="text" name="productName" class="form-control" id="productName" required>
                  </div>
                  <div class="mb-3">
                    <label for="productRprice" class="form-label">Product Regular Price (Currency : $)<span class="requiredFiels ms-3">Required *</span></label>
                    <input type="number" name="pRegularPrice" class="form-control" id="productRprice" required>
                  </div>
                  <div class="mb-3">
                    <label for="productOprice" class="form-label">Product Offer Price</label>
                    <input type="number" name="pOriginalrPrice" class="form-control" id="productOprice">
                  </div>
                  <div class="form-group">
                      <label for="categories" class="mb-2 d-block">Select a Category <span class="requiredFiels ms-3">Required *</span></label>
                      <select name="category" class="p-1 w-100 text-center"  id="categories" required>
                        <option value="Uniform">Uniform</option>
                        <option value="Strength Machines">Strength Machines</option>
                        <option value="Strength Machines">Strength Machines</option>
                        <option value="Free Weight Machines">Free Weight Machines</option>
                        <option value="Alimentation">Alimentation</option>
                        <option value="Accessories">Accessories</option>
                      </select>
                  </div>
                  </div>
                  <div class="form-group ms-3 w-50">
                    <label for="productDescription" class="mb-2">Description<span class="requiredFiels ms-3">Required *</span></label>
                    <textarea class="form-control" name="productDescription" placeholder="Please write some infos for this product" id="productDescription" rows="16" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="addProduct" class="btn btn-primary w-100">Save changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          
        </div>
      </section> 
      <section class="mt-5 d-flex flex-column align-items-center">
        <?php 
        $counter = 1 ;
        foreach($data as $value) : ?>
        <div class="d-flex flex-column flex-lg-row productContentC mb-5">
       <a href="<?php echo URLROOT ; ?>/pages/editProductPage/<?php echo $value -> 	product_id ;?>"><svg class="svgIconEdit" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff7800"><path d="M130.88125,17.2c-2.93403,0 -5.86843,1.12051 -8.10729,3.35938l-13.84062,13.84063l28.66667,28.66667l13.84062,-13.84063c4.47773,-4.47773 4.47773,-11.73685 0,-16.21458l-12.45208,-12.45208c-2.23887,-2.23887 -5.17326,-3.35937 -8.10729,-3.35937zM97.46667,45.86667l-67.31068,67.31067c0,0 5.26186,-0.47147 7.22266,1.48933c1.9608,1.9608 0.34669,14.792 2.75469,17.2c2.408,2.408 15.15831,0.71299 16.98724,2.54192c1.82894,1.82893 1.70209,7.43542 1.70209,7.43542l67.31067,-67.31067zM22.93333,131.86667l-5.40859,15.31875c-0.21262,0.60453 -0.32239,1.24042 -0.32474,1.88125c0,3.16643 2.5669,5.73333 5.73333,5.73333c0.64083,-0.00235 1.27672,-0.11212 1.88125,-0.32474c0.0187,-0.00737 0.03737,-0.01483 0.05599,-0.02239l0.14557,-0.04479c0.01122,-0.00743 0.02242,-0.01489 0.03359,-0.0224l15.08359,-5.31901l-8.6,-8.6z"></path></g></g></svg></a>          
        <a href="<?php echo URLROOT ; ?>/ProductsDash/deleteProduct/<?php echo $value -> 	product_id ;?>/<?php echo $value -> product_img_name ;?>" onclick="return confirm('Are you sure')"><svg class="svgIconDelete" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24"><path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"></path></svg></a>
          <div class="productImageCont">
            <img src="<?php echo URLROOT;?>/uploads/productsFolder/<?php echo  $value -> product_img_name	; ?>" alt="Product Image <?php echo $counter++ ; ?>" width="300" height="300">
          </div>
          <div class="pt-5 w-100">
            <div class="d-flex flex-column flex-md-row justify-content-between ps-4 pe-4 pb-3 productInfoC">
              <span class="text-secondary fw-bold">Product Name</span><span class="fw-bold my-3 my-md-0"><?php echo $value -> product_name ;?></span>
              <span class="text-secondary fw-bold">Category</span><span class="fw-bold my-3 my-md-0"><?php echo $value -> product_category ;?></span>
          </div>
            <div class="d-flex justify-content-around ps-4 pe-4 pt-3 pb-3 productInfoC"><span class="text-secondary fw-bold">Product R-Price</span><span class="fw-bold"><?php echo $value -> product_original_price	;?></span></div>
            <div class="d-flex justify-content-around ps-4 pe-4 pt-3 pb-3 mb-4 productInfoC"><span class="text-secondary fw-bold">Product O-Price</span><span class="fw-bold"><?php echo $value -> product_offer_price ;?></span></div>
            <span class="text-secondary fw-bold text-center">Description :</span>
            <p class="mt-2 fw-bold">- <?php echo$value -> product_description ; ?></p>
          </div>
        </div>
       <?php endforeach ; ?> 
      </section>

   </main>         
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"
></script>
<script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
</body>
</html>