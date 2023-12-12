<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- CSS lokal -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="style1.css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->
</head>

<body>
    <!-- ****************************************************
      MAIN CONTENT
      ***************************************************** -->
    <form class="form-login" method="post">
        <div class="container">
            <section class="login">
                <div class="login-left">
                    <h2>KASIRKU</h2>
                    <img src="admin/template/img/login.png" alt="Logo" class="centered-image">
                </div>
                <div class="login-right">
                    <img src="admin/template/img/logo.jpg" alt="Circle Logo" class="centered-image">
                    <div class="login-menu">
                        <h3>WELCOME</h3>
                    </div>

                    <div class="form-floating" data-validate="Masukan username">
                        <input class="form-control" type="text" id="floatingInput" name="user" placeholder="">
                        <label for="floatingInput">Username</label>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="form-floating" data-validate="Masukan password">
                        <input class="form-control" type="password" id="floatingPassword" name="pass" placeholder="">
                        <label for="floatingPassword">Password</label>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-block" name="proses" type="submit">Login</button>
                    <div class="text-nowrap" style="width: 8rem;">
                        <strong>
                            &nbsp;&nbsp;&nbsp;
                        </strong>
                    </div>

                    <span class="login100-form-title p-b-37">
                        <p class="login-box-msg"> Point of Sales<br />Copyright © 2023</p>
                    </span>

                </div>
            </section>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>