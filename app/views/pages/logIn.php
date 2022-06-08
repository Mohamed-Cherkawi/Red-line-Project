<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/LoginSignup.css"/>
    <title>Log In</title>
</head>
<body>
    <body class=" d-flex align-items-center vh-100">
        <main class="d-flex justify-content-center container-fluid">
            <div class="imageContainerLog d-none d-xxl-block"></div>
            <div class="p-4 firstDiv firstDivLog">
                <a href="index.php"><img src="imgs/logo.png" alt="Logo" width="140"></a>
                <div class="d-flex flex-column mt-3">
                    <h3>Log to your account</h3>
                    <span class="mt-3">Email</span>
                    <input type="email" class="mb-3">
                    <span>Password</span>
                    <input type="password" class="mb-3">
                    <div class="d-flex align-items-center mt-4">
                        <input type="checkbox" name="" id="RememberMe">
                        <label class="ms-3 fw-bold" id="Remember" for="RememberMe">Remember me</label>
                    </div>
                    <button class="mt-4">Log in</button>
                    <div class="d-flex flex-column align-items-center mt-5">
                        <span>Don't have an account ?</span>
                        <div id="separator1" class="mt-4"></div>
                        <a href="signUp.php" class="text-dark mt-4 fw-bolder">Sign up here</a>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</body>
</html>