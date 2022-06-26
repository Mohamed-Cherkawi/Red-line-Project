<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/userProducts.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css"/>    

    <title>Products Page</title>
</head>
<body>
<?php  require_once APPROOT."/views/inc/header.php" ; ?>

      <main class="mb-5">
        <h1 class="text-center mt-5">Products Catalogs <span class="ms-3">〘 <span class="text-danger fw-bolder" id="categoryProduct"><?php  if(isset($data2)) { echo $data2;} if(isset($data3)) { echo '<span class="ms-3">: '.$data3.'</span>' ;} ?></span> 〙</span></h1>
        <div class="d-flex flex-column flex-md-row  sectionC mt-5">
            <section id="firstSection" class=" ms-md-5">
                <div id="headLinksSectionC"><h4>Categories</h4></div>
                <div class="d-flex flex-column ps-3  CategLinksC">
                <ul class="list-unstyled">
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/All">All</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Uniform">Uniform</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Strength">Strength Machines</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Cardio">Cardio Machines</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Free">Free Weight Machines</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Alimentation">Alimentation</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/products/Accessories">Accessoires</a></li>
                </ul>
                </div>
                <div id="headLinksSectionC" class="mt-5"><h4>Filter By </h4></div>
                <div class="d-flex flex-column ps-3  CategLinksC">
                <ul class="list-unstyled">
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/productsFilterBy/Oldest/<?php $Category = explode(" ",$data2); echo $Category[0]; ?>">Oldest First</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/productsFilterBy/Newest/<?php $Category = explode(" ",$data2); echo $Category[0]; ?>">Newest First</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/productsFilterBy/AlphabeticalAsc/<?php $Category = explode(" ",$data2); echo $Category[0]; ?>">Alphabetical Ascendant</a></li>
                    <li><a class="fw-bold my-3 d-block text-decoration-none text-dark" href="<?php echo URLROOT; ?>/pages/productsFilterBy/AlphabeticalDesc/<?php $Category = explode(" ",$data2); echo $Category[0]; ?>">Alphabetical Descendant</a></li>
                </ul>
                </div>
            </section>
            <section class="row mx-2 ms-md-5  w-100">
              
            <?php 
            if(empty($data)) {
              echo "<span class='outOfS'>Out Of Stock</span>";
            }
            foreach($data as $value ) :
            ?>
                    <div class=" d-flex flex-column justify-content-center mt-3 col-4 w-25  productContentC">
                      <div class="imageProductC text-center">
                      <img  src="<?php echo URLROOT; ?>/uploads/productsFolder/<?php echo $value -> product_img_name; ?>" alt="Product Image" width="130" height="200">
                        </div>  
                      <span class="mt-3 mb-3"><span class="fw-bold me-3">Product Name :</span><?php echo $value -> product_name ; ?></span>
                      <span class="d-flex productPrice fw-bolder"><span class="fw-bold me-3 text-dark">Product Price :</span><?php if($value -> product_offer_price != "none") {echo '<div class="d-flex align-items-center"><del class="text-secondary">'.$value -> product_offer_price.'</del><div class="triangle-right ms-3 me-3"></div></div>';} echo $value -> product_original_price ; ?></span>
                      <span class="mt-3 "><span class="fw-bold me-3">Product Category :</span><?php echo $value -> product_category ; ?></span>
                      <span class="mt-3 "><span class="fw-bold me-3">Product Description :</span><?php echo $value -> product_description ; ?></span>
                      <span class="mt-3 "><span class="fw-bold me-3">Added in :</span><?php echo $value -> added_date ; ?></span>
                      <a href="<?php echo URLROOT; ?>/pages/productSheet/<?php echo $value -> product_id; ?>"><button class="fw-bold mt-4 w-100" id="addToCartButt">Inspect Product</button></a>
                    </div>

              <?php endforeach; ?>
            </section>
      
        </div>
      </main>

      <?php  require_once APPROOT."/views/inc/footer.php" ; ?>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"
></script>
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