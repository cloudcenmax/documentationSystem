<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="content-wrapper gradient-5">
        <section class="">
            <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="display-1 mb-3 text-white">Documentation System</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container pb-14 pb-md-16">
                <div class="row">
                    <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
                        <div class="card">
                            <div class="card-body p-11 text-center">
                                <h2 class="mb-3 text-start">Welcome Back</h2>
                                <p class="lead mb-6 text-start">Fill your username and password to sign in.</p>
                                <?php if (isset($_GET['failed'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Username or password is incorrect!
                                </div>
                                <?php endif; ?>
                                <form class="text-start mb-3" action="login-process.php" method="POST">
                                    <div class="form-floating mb-4">
                                        <input type="text" name="username" class="form-control" placeholder="Username"
                                            id="loginEmail">
                                        <label for="loginEmail">Username</label>
                                    </div>
                                    <div class="form-floating password-field mb-4">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" id="loginPassword">
                                        <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                        <label for="loginPassword">Password</label>
                                    </div>
                                    <input type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2"
                                        value="Sign In">
                                </form>
                                <!--/.social -->
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
    </div>
    <!-- /.content-wrapper -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/theme.js"></script>
</body>

</html>