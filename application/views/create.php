<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container form .error-msg {
            margin: 10px 0;
            /* display: block; */
            /* background: crimson; */
            color: red;
            /* border-radius: 5px; */
            font-size: 15px;
            padding: 10px;
        }
    </style>

    <title>Registration Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">HELLO TECHJOCKEY</a>
        </div>
    </nav>

    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                $success = $this->session->userdata('success');
                if ($success != "") {
                ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php
                }
                ?>
                <?php
                $failure = $this->session->userdata('failure');
                if ($failure != "") {
                ?>
                    <div class="alert alert-failure"><?php echo $failure; ?></div>
                <?php
                }
                ?>

            </div>

        </div>

        <h2 align="center">Register Now</h2>
        <hr>
        <form method="post" name="createUser" action="<?php echo base_url() . 'user/create'; ?>" class="row">
            <div class="col-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control" placeholder="Enter Your Name">
                <?= form_error('name', '<span class="error-msg">', '</span>'); ?>
            </div>
            <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Enter Your Email">
                <?= form_error('email', '<span class="error-msg">', '</span>'); ?>
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control" placeholder="Password">
                <?= form_error('password', '<span class="error-msg">', '</span>'); ?>
            </div>
            <div class="col-6">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" value="<?php echo set_value('cpassword') ?>" class="form-control" placeholder="Confirm Password">
                <?= form_error('cpassword', '<span class="error-msg">', '</span>'); ?>
            </div>
            <div class="col-6">
                <label class="form-label">City</label>
                <input type="text" name="city" value="<?php echo set_value('city') ?>" class="form-control" placeholder="City">
                <?= form_error('city', '<span class="error-msg">', '</span>'); ?>
            </div>
            <div class="col-6">
                <label class="form-label">User Type</label>
                <select type="usertype" name="usertype" class="form-select">
                    <option selected>USER</option>
                    <option>ADMIN</option>
                </select>
            </div>
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
                <a href="<?php echo base_url() . 'user/index' ?>" class="btn btn-secondary">Cancel</a>


            <!-- </div>
            <div class="col-2" style="position: absolute; bottom: 0; right: 0;">
                <input type="text" class="form-control" value="<?php echo mdate('%Y-%m-%d %H:%i:%s', now()); ?>" disabled>
            </div> -->

        </form>
    </div>

</body>

</html>