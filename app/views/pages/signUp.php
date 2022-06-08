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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/LoginSignup.css"/>
    <title>Sign Up</title>
</head>
<body class=" d-flex align-items-center vh-100">
    <main class="d-flex justify-content-center container-fluid">
        <div class="p-4 firstDiv">
            <a href="index.php"><img src="<?php echo URLROOT.'/img/logo.png'?>" alt="Logo" width="140"></a>
            <form action="<?php echo URLROOT?>/pages/signUp" method="POST">
                <div class="d-flex flex-column mt-3">
                <h3>Create Account</h3>
                
                <label for="email">Email</label>
                <input type="email" id="email" class="mb-3" name="email">
                <label for="Password">Password</label>
                <input type="password" id="Password" class="mb-3" name="password">    
                <div class="d-flex flex-column position-relative" id="CopasswordContaSignUp">
                <label for="cPassword">ConfirmPassword</label>
                <input type="password" id="cPassword">
                <i class="bi bi-eye-slash passw-mask-eye" onclick="toogleEyePassword()"></i>
                </div>
                <button type="submit" class="mt-4" name="signUp">Sign up</button>
                
            </div>
            </form>
            <div class="d-flex mt-3" id="seconContainer">
                    <div class="d-flex flex-column justify-content-evenly align-items-center h-100 w-50">
                        <span>Already have an account ?</span>
                        <div id="separator1"></div>
                        <a href="" class="text-dark fw-bolder">Log in here</a>
                    </div>
                    <div id="separator2">.</div>
                    <div class="d-flex flex-column justify-content-around align-items-center w-50">
                        <div class="facebookContainer iconsContainer d-flex align-items-center">
                            <div class="w-25">
                                <img src="<?php echo URLROOT.'/img/facebook.png'?>" class="mediaIcons FacebookIco" alt="Facebook icon">
                            </div>
                            <span class="ms-1 ms-md-3 ms-xxl-1">Login With Facebook</span>
                        </div>
                        <div class="googleContainer iconsContainer d-flex align-items-center">
                            <div class="w-25">
                                <img src="<?php echo URLROOT.'/img/google.png'?>" class="mediaIcons GoogleIco" alt="google icon">
                            </div>
                            <span class="ms-2 ms-md-4 ms-xxl-2">Login With Google</span>
                        </div>
                    </div>
            </div>        
        </div>
        <div class="imageContainerSign d-none d-xxl-block"></div>
    </main>
    <script src="<?php echo URLROOT?>/js/signUp.js"></script>
</body>
</html>