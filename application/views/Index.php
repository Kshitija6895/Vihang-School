<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PAGE_TITLE; ?> | Login</title>
    <!-- [ Css ] start -->
    <?php include "Common/CSS.php"; ?>
    <!-- [ Css ] End -->
</head>

<body>
    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
            <div class="card borderless" style="height:500px;weight:500px;padding:10%">
                <div class="row align-items-center ">
                    <div class="col-md-12">

                        <!-- [ Alert-Message ] start -->
                        <?php include "common/Alert.php"; ?>
                        <!-- [ Alert-Message ] End -->

                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <?= form_open(); ?>
                            <div class="form-group mb-3">
                                <input type="text" name="username" class="form-control" id="Email"
                                    placeholder="Email address">
                                <?= form_error('username'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" class="form-control" id="Password"
                                    placeholder="Password">
                                <?= form_error('password'); ?>
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Save credentials.</label>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
                            </form>
                            <hr>
                            <p class="mb-2 text-muted">Forgot password? <a href="" class="f-w-400">Reset</a></p>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="" class="f-w-400">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- [ auth-signin ] end -->

</body>
<!-- [ Js ] start -->
<?php include "Common/JS.php"; ?>
<!-- [ Js ] End -->

</html>