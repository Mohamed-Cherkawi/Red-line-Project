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
    <title>Log In</title>
</head>
<body>
    <body class=" d-flex align-items-center vh-100">
        <main class="d-flex justify-content-center container-fluid">
            <div class="imageContainerLog d-none d-xxl-block"></div>
            <div class="p-4 firstDiv firstDivLog">
                <a href="<?php echo URLROOT; ?>/pages/index"><img src="<?php echo URLROOT; ?>/img/logo.png" alt="Logo" width="140"></a>
                <form action="<?php echo URLROOT ?>/Users/login/<?php echo $data['page'] ?>/<?php echo $data['secondParam'] ; ?>" method="POST" class="d-flex flex-column mt-3">
                    <h3>Log to your account</h3>
                    <div class="alert text-center <?php if(isset($data['email_err']) || isset($data['password_err']) || isset($data['query_error'])) { echo "alert-danger" ;}?>" role="alert"><?php if(isset($data['email_err'])) { echo $data['email_err'] ;} if(isset($data['password_err'])) { echo $data['password_err'] ;} if(isset($data['query_error'])) { echo $data['query_error'] ;}?></div>
                    <label for="email" class="mt-3">Email<span class="ms-5 errorMessagesCont" id="emailError"></span></label>
                    <input type="email" name="email" id="email" class="mb-3" onkeyup="validateEmail()">
                    <div class="d-flex flex-column position-relative" id="CopasswordContaSignUp">
                    <label for="password">Password<span class="ms-5 errorMessagesCont" id="passwordError"></span></label>
                    <input type="password" name="password" id="password" class="mb-3" onkeyup="validatePassword()">
                    <i class="bi bi-eye-slash passw-mask-eye" onclick="toogleEyePassword()"></i>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <input type="checkbox" name="RememberUser" id="RememberMe">
                        <label class="ms-3 fw-bold" id="Remember" for="RememberMe">Remember me</label>
                    </div>
                    <span class="text-center errorMessagesCont" id="submitError"></span>
                    <button type="submit" name="logIn" class="mt-4" onclick="return validateForm()">Log in</button>
                    <div class="d-flex flex-column align-items-center mt-5">
                        <span>Don't have an account ?</span>
                        <div id="separator1" class="mt-4"></div>
                        <a href="<?php echo URLROOT; ?>/pages/signUp" class="text-dark mt-4 fw-bolder">Sign up here</a>
                    </div>
                </form>
            </div>
        </main>
    </body>
    <script src="<?php echo URLROOT; ?>/js/logIn.js"></script>
</body>
</html>