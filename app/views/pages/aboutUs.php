<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/aboutUs.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footer.css"/> 
    <title>About Us</title>
</head>
<body>
<?php  require_once APPROOT."/views/inc/header.php" ; ?>

    <main class="container mt-5 d-flex flex-column mb-5">
        <h4 class="mt-5 mb-5 text-center">Contact et informations</h4>
        <div class="d-flex justify-content-evenly mt-5">
            <div class="d-flex flex-column align-items-center">
            <img src="https://img.icons8.com/fluency/000000/marker.png" width="30" height="45"/>
                <span class="d-block">221-B, Bakerstreet,</span>
                <span>Scotland Yard, UK</span>
            </div>
            <div class="d-flex flex-column align-items-center">
            <img src="https://img.icons8.com/ios-filled/50/FD7E14/phone.png" width="30" height="45"/>
                <span class="d-block">+44 01569 2358X</span>
                <span>+44 04258 3211</span>
            </div>
            <div class="d-flex flex-column align-items-center">
            <img src="https://img.icons8.com/ios-filled/50/FD7E14/new-post.png" width="30" height="45"/>
                <span class="d-block">info@texo.com</span>
                <span>admin@texo.com</span>
            </div>
        </div>
        <div class="mt-5 text-center overflow-scroll iframeC">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108703.12126551873!2d-8.078064724546218!3d31.634602238991604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!5e0!3m2!1sen!2sma!4v1654731304386!5m2!1sen!2sma" width="1200" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="mt-5 mb-5">
            <div class="text-center">
                <h3>Get In Touch With Us</h3>
                <p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia <br> voluptas sit aspernatur aut </p>
            </div>
            <div class="mt-5">
                <form action="" method="POST">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
                    <input class="contactInputs w-25" type="text" placeholder="Enter your name"><input class="contactInputs w-25 my-3 my-md-0" type="email" placeholder="Your Email"><input class="contactInputs w-25" type="text" placeholder="Subject">
                </div>
                <textarea id="contactTextera" class="w-100 mt-3" placeholder="Your message here"></textarea>
                <button>Send</button>
                </form>
            </div>
        </div>
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