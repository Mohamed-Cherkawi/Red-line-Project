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
        <h4 class="text-center">My basket</h4>
        <section class="overflow-scroll" id="panierFsection">
        <div class="d-flex PanierContentC mt-5 mb-3 pb-3">
            <div class="w-50"><span>PRODUCT NAME</span></div>
            <div class="d-flex justify-content-around w-50"><span>PRICE</span><span>QUANTITY</span><span>TOTAL</span></div>
        </div>
        <?php 
        $quantity = 0 ;
        foreach($data as $value) : 
        ?>
        <div class="d-flex justify-content-between align-items-center PanierContentC mb-3 pb-3">
            <img src="<?php echo APPROOT ?>/productsFolder/<?php echo $value -> Product_img ; ?>" alt="imageX" height="150">
            <span><?php echo $value -> Product_name ; ?></span>
            <span><?php echo $value -> Product_price ; ?></span>
            <div id="stepperC" class="d-flex align-items-center">
                <span class="plusMin">-</span><span class="mx-4"><?php echo $value -> Product_quantity ; ?></span><span class="plusMin">+</span>
            </div>
            <span class="active"><?php echo $quantity.= $value -> Product_quantity ; ?></span>
        </div>
        <?php endforeach ; ?>

    </section>
    <div class="text-end mt-4"><button id="contShoopingButt">CONTINUE SHOPPING</button></div>
    <section class="d-flex flex-column align-items-end mt-4 mb-5 secondSectPanier">
        <div class="w-50">
        <div class="mb-4">
            <h4 class="fw-bolder pb-2 PanierContentC w-100">Cart total</h4>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2 my-3"><span>GRAND TOTAL</span><span class="fw-bold">$48.00</span></div>
        <button class="w-100" id="ProceedButt">PROCEED TO CHECKOUT</button>
        </div>
    </section>
    </main>
    <?php  require_once APPROOT."/views/inc/footer.php" ; ?>
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