
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/productSheet.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css"/> 
    <title>Fiche Sheet</title>
</head>
<body>
<?php  require_once APPROOT."/views/inc/header.php" ; 
    if(isset($_GET['addedMess'])) {
        if($_GET['addedMess'] == "true") {
        echo "<div class='alert alert-success text-center' role='alert'> Product Added Successfuly To your Cart</div>";
        } else if($_GET['addedMess'] == "false") {
        echo "<div class='alert alert-danger text-center' role='alert'> Product Not Added Please Try Again</div>";
        } else {
            echo "<div class='alert alert-secondary text-center' role='alert'> Product Already Added To Your Cart</div>";
        }
    }
?>
    
    <main class="container mt-5 mb-5">
        <section class="d-flex flex-column flex-md-row justify-content-evenly mb-5">
            <div id="ProductImage"><img src="<?php echo URLROOT; ?>/uploads/productsFolder/<?php echo $data -> product_img_name; ?>" alt="Product Image" width="500" height="450"></div>
            <div>
                <h3 class="mb-3"><?php echo $data -> product_name; ?></h3>
                <span class="mb-3 fw-bold">Product Category :   <?php echo $data -> product_category; ?></span>
                <div class="mb-3">
                <!-- <span class="fw-bold"><del></del></span> -->
                <div class="my-3">
                <span class="active fw-bold"><?php if($data -> product_offer_price != "none") {echo '<div class="d-flex align-items-center">Product Regular Price : <del class="text-secondary my-3 ms-3">'.$data -> product_offer_price.'</del></div>';} echo 'Product Price : <span class="ms-3">'. $data -> product_original_price .'</span>' ; ?></span>
                </div>
                </div>
                <div>
                <span class="inStock">In stock</span>
                <div class="d-flex justify-content-between mt-5">
                    
                <div id="stepperC" class="d-flex align-items-center">
                        <span class="plusMin" id="minus">-</span><span class="mx-4" id="quantity">1</span><span class="plusMin" id="plus">+</span>
                </div>
                <form action="<?php echo URLROOT ;?>/pages/addToCart" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $data -> product_id; ?>">
                <input type="hidden" id="quantityInput" name="product_quantity" value="1">
                <button type="submit" name="addProductToCart" id="addToCart">ADD TO CART</button>
                </form>
                </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="mt-5">
            <h4 class="text-center fw-bolder">Description</h4>
            <article class="mt-5 d-flex flex-column flex-md-row justify-content-between">
                <div id="Desc1conta">
                    <p><?php echo $data -> product_description ;?></p>
                    <p class="mt-2">Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus plac erat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condim entum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>
                </div>
                <div id="DescSeparator"></div>
                <div id="Desc2conta">
                    <h5 class="fw-bolder mb-4">Technical characteristics :</h5>
                    <ul>
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                    </ul>
                </div>
            </article>
        </section>
    </main>
    <?php  require_once APPROOT."/views/inc/footer.php" ; ?>
      <script src="<?php echo URLROOT; ?>/js/productsSheet.js"></script>
</body>
</html>