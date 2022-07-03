<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/basket.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css"/>
    <title>My Basket</title>
</head>
<body>
<?php  require_once APPROOT."/views/inc/header.php" ; ?>

    <main class="container mt-5">
        <h4 class="text-center fw-bolder">My basket</h4>
        <section class="overflow-scroll" id="panierFsection">
        <div class="d-flex justify-content-between PanierContentC mt-5 mb-3 pb-3">
            <div><span>PRODUCT NAME</span></div>
            <div class="invisible">ddhddkh</div>
            <div><span>PRICE</span></div>
            <div><span>QUANTITY</span></div>
        </div>
        <?php 
        $quantity = 0 ;
        $Total = 0 ;
        foreach($data as $value) : 
            $quantity = $value -> Product_quantity ;
            if($value -> product_offer_price == "none") {
                $productPrice = floatval($value -> product_original_price);
            } else {
                $productPrice = floatval($value -> product_offer_price);
            }
            $Total += ($quantity * $productPrice);
        ?>
        <div class="d-flex justify-content-between align-items-center PanierContentC mb-3 pb-3">
            <img src="<?php echo URLROOT ; ?>/uploads/productsFolder/<?php echo $value -> product_img_name ; ?>" alt="imageX" width="150" height="150">
            <span><?php echo $value -> product_name ; ?></span>
            <span class="productPrice"><?php 
            if($value -> product_offer_price == "none") {
                echo $value -> product_original_price ; 
            } else {
                echo $value -> product_offer_price ; 
            }
            ?></span>
            <div id="stepperC" class="d-flex align-items-center">
                <span class="mx-4"><?php echo $value -> Product_quantity ; ?></span>
            </div>
        </div>
        <?php endforeach ; ?>

    </section>
    <div class="text-end mt-4"><a href="<?php echo URLROOT ; ?>/pages/products/All"><button id="contShoopingButt">CONTINUE SHOPPING</button></a></div>
    <section class="d-flex flex-column align-items-end mt-4 mb-5 secondSectPanier">
        <div class="w-50" id="totalCardC">
        <div class="mb-4">
            <h4 class="fw-bolder pb-2 PanierContentC w-100">Cart total</h4>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2 my-3"><span>GRAND TOTAL</span><span class="fw-bold">$<?php echo " " . $Total ; ?></span></div>
        <button class="w-100" id="ProceedButt">PROCEED TO CHECKOUT</button>
        </div>
    </section>
    </main>
    <?php  require_once APPROOT."/views/inc/footer.php" ; ?>
    <script src="<?php echo URLROOT ; ?>/js/basket.js"></script>
</body>
</html>