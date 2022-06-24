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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/products.css" />
    <title>Edit Product</title>
</head>
<body class="d-flex align-items-center vh-100">
    <form action="<?php echo URLROOT ;?>/ProductsDash/editProduct/<?php echo  $data -> product_id ; ?>" class="container-fluid" method="POST" enctype="multipart/form-data">
          <div class="d-flex flex-column flex-md-row align-items-center justify-content-around shadow-lg">
            <div>
              <div><input type="hidden" name="product_imageName" value="<?php echo $data -> product_img_name ; ?>"></div>
                <div class="mb-3 w-100 ">
                    <label for="image" class="form-label">Choose Image (jpg , jpeg , png)</label>
                    <input type="file" name="product_image" class="form-control" id="image">
                  </div>
                  <div class="mb-3 w-100 ">
                    <label for="productName" class="form-label">Product Name <span class="requiredFiels ms-3">Required *</span></label>
                    <input type="text" name="productName" class="form-control" value="<?php echo  $data -> product_name ; ?>" id="productName" required>
                  </div>
                  <div class="mb-3 w-100 ">
                    <label for="productRprice" class="form-label">Product Regular Price (Currency : $)<span class="requiredFiels ms-3">Required *</span></label>
                    <input type="number" name="pRegularPrice" class="form-control" value="<?php echo  intval($data -> product_original_price) ; ?>" id="productRprice" required>
                  </div>
                  <div class="mb-3 w-100 ">
                    <label for="productOprice" class="form-label">Product Offer Price</label>
                    <input type="number" name="pOriginalrPrice" class="form-control" value="<?php echo  intval($data -> product_offer_price); ?>" id="productOprice">
                  </div>
                  <div class="form-group mb-3 w-100 ">
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
                  <div class="form-group  w-50" id="descConta">
                    <label for="productDescription" class="mb-2">Description<span class="requiredFiels ms-3">Required *</span></label>
                    <textarea class="form-control" name="productDescription" value="<?php echo  $data -> product_description ; ?>" placeholder="Please write some infos for this product" id="productDescription" rows="10" required><?php echo  $data -> product_description ; ?></textarea>
                  </div>
          </div>   
                <div class="mt-3 w-100  text-center">
                  <button type="submit" name="editProduct" class="btn btn-primary w-50">Save changes</button>
                </div>
    </form>
  <script>
      // Prevent Form Resubmission
  if(window.history.replaceState) {
    window.history.replaceState(null , null ,window.location.href);
  }
  </script>
</body>
</html>